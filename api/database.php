<?php 

	require_once 'encryption.php';

	class DB {

		protected $db;
		public $data;

		public function __construct(Connection $db) {
			$this->db = $db;
		}

		public function getResponse() {
			return $this->data;
		}

		public function updateScore($username, $game = array()) {
			if($username != "" && !empty($game)) {
				$old = $this->db->exe("SELECT * FROM users WHERE username=?", [$username])->fetch();
				$overall = intval($old['overall_score']) + count($game);
				if($this->db->exe("UPDATE users SET overall_score=? WHERE username=?", [$overall, $username])) {
					if($this->db->exe("UPDATE users SET games_score=? WHERE username=?", [sizeof($game), $username])) {
						$this->data = array('success'=>'scores_updated');
					} else {
						$this->data = array('error'=>'could_not_update_s2');
					}
				} else {
					$this->data = array('error'=>'could_not_update_s1');
				}
			} else {
				$this->data = array('error'=>'username_game_empty');
			}
		}

		public function login($account = array()) {
			if(!empty($account['username']) && !empty($account['password'])) {
				$enc = new EncryptionHelper($account['password']);
				$enc->protect();
				$password = $enc->getResponse()['Hashed'];
				$username = $account['username'];
				$result = $this->db->exe("SELECT * FROM users WHERE username=?", [$username])->fetch();
				$enc->verify($account['password'], $result['password']);
				if($enc->getResponse()['Status'] == "matching") {
					$this->data = array('success'=>'login_success');
					$_SESSION['account'] = json_encode(array('user'=>$result['username'], 'overall_score'=>$result['overall_score'], 'games_score'=>$result['games_score']));
				} else {
					$this->data = array('error'=>'credentials_invalid['.$result['password'].']');
				}
			} else {
				$this->data = array('error'=>'credentials_empty');
			}
		}

		public function register($account = array()) {
			if(!empty($account['username']) && !empty($account['password'])) {
				$exists = $this->db->exe("SELECT * FROM users WHERE username=?", [$account['username']])->fetch();
				if($exists['username'] == "" && $exists['username'] != $account['username']) {
					$enc = new EncryptionHelper($account['password']);
					$enc->protect();
					$password = $enc->getResponse()['Hashed'];
					$username = $account['username'];
					if($this->db->exe("INSERT INTO users (id, username, password, overall_score, games_score) VALUES (?, ?, ?, ?, ?)", ['', $username, $password, '0', '0'])) {
						$this->data = array('success'=>'registeration_success');
					} else {
						$this->data = array('error'=>'registeration_fail');
					}
				} else {
					$this->data = array('error'=>'user_exists');
				}
			} else {
				$this->data = array('error'=>'credentials_empty');
			}
		}

		private function isJSON($string) {
 			json_decode($string);
 			return (json_last_error() == JSON_ERROR_NONE);
		}
	}