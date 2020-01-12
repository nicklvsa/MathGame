<?php

session_start();

require_once 'connection.php';
require_once 'database.php';

if (isset($_POST)) {
    print_r(parse($_POST));
}

function parse($vars = array()) {

	$connection = new Connection("mysql:host=localhost;dbname=DATABASE_NAME;charset=utf8", "DATABASE_USERNAME", "DATABASE_PASSWORD");
	$db = new DB($connection);

    if (!empty($vars['login']) && empty($vars['register']) && $vars['login'] == true) {   
        $db->login(array(
            "username" => $vars['username'],
            "password" => $vars['password']  
        ));  
        $response = $db->getResponse();
        return json_encode($response);
    } else if (!empty($vars['register']) && empty($vars['login']) && $vars['register'] == true) {
        $db->register(array(
            "username" => $vars['username'],
            "password" => $vars['password']
        ));
        $response = $db->getResponse();
        return json_encode($response);
    } else if(!empty($vars['content']) && empty($vars['login']) && empty($vars['register']) && $vars['game'] == true) {
        $db->updateScore(json_decode($_SESSION['account'])->user, $vars['content']);
        $response = $db->getResponse();
        return json_encode($response);
    } else {
        return json_encode(array(
            'error' => 'invalid_input'
        ));
    }   
}

?>