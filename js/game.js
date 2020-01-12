var api = "https://nicksdesk.com/mathgame/api/index.php";

var gameTime = 10; //Time in seconds
var minNumber = 100;
var maxNumber = 0;

var timer = null;

var metaViewport = document.querySelector('meta[name=viewport]');
metaViewport.setAttribute('width', '380');

var questionBank = [];
var correctQuestions = [];

var num0 = 0;
var num1 = 0;

function randomNumberFromRange(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function getCookie(name) {
    var cookiename = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(cookiename) === 0) return c.substring(cookiename.length, c.length);
    }
    return null;
}

function startGame() {
    timer = setTimeout(function() {
        stopGame();
    }, gameTime * 1000);
}

function stopGame() {
    if (timer !== null) clearTimeout(timer);

    $('#getData').attr('disabled', true);
    $('#addTask').attr('disabled', true);

    sendScore(correctQuestions);

    $('#addTask').text("New Game");
    $('#addTask').on('click', function() {
        window.location.href="https://nicksdesk.com/mathgame/index.php";
    });
    $('#addTask').attr('disabled', false);
}

function sendScore(game) {
    if(game instanceof Array && game !== "" && game !== null) {
        $.post(api, {content: game, game: true}).done(function(data) {
            if(data !== "") {
                let response = JSON.parse(data);
                switch(response.error) {
                    case "username_game_empty":
                        $('#getData').attr('placeholder', 'To submit your score, please login!');
                    break;
                    default:
                        console.log(response);
                    break;
                }
            }
        });
    }
}

var Question = {

    init: function(value1, value2) {
        this.numberFirst = value1;
        this.numberSecond = value2;
    },

    add: function() {
        var answer = this.numberFirst + this.numberSecond;
        return answer;
    },

    sub: function() {
        var greaterNum = Math.max(this.numberFirst, this.numberSecond);
        var smallerNum = Math.min(this.numberFirst, this.numberSecond);
        var answer = greaterNum - smallerNum;
        return answer;
    },

    mul: function() {
        var answer = this.numberFirst * this.numberSecond;
        return answer;
    },

    div: function() {
        var greaterNum = Math.max(this.numberFirst, this.numberSecond);
        var smallerNum = Math.min(this.numberFirst, this.numberSecond);
        var answer = ~~(greaterNum / smallerNum);
        console.log(answer);
        return answer;
    }
};

function genRandomQuestion(rand0, rand1) {
    var question = Object.create(Question);
    question.init(rand0, rand1);
    questionBank.push(question);
    num0 = rand0;
    num1 = rand1;
    return question;
}

var rand0 = randomNumberFromRange(minNumber, maxNumber);
var rand1 = randomNumberFromRange(minNumber, maxNumber);
var question = genRandomQuestion(rand0, rand1);

var type = getCookie("gameType");
if (type == "add") $('#mathSign').text(" + ");
if (type == "sub") $('#mathSign').text(" - ");
if (type == "div") $('#mathSign').text(" / ");
if (type == "mul") $('#mathSign').text(" * ");
if (type == "" || type == null) $('#mathSign').text(" + ");

$("#object1").text(Math.max(num0, num1));
$("#object2").text(Math.min(num0, num1));
//console.log("Max Num: " + Math.max(num0, num1) + " | Min Num: " + Math.min(num0, num1));
$(function() {
    $('#spanId').text();
    $("#addTask").click(function() {
        var inputData = $("#getData").val();
        for (let i = 0; i < questionBank.length; i++) {
            switch (type) {
                case "add":
                    if (inputData == "") {
                        console.log("No answer give!");
                        $("#shakeContainer").effect("shake");
                    } else if (parseInt(inputData) === questionBank[i].add()) {
                        question = genRandomQuestion(randomNumberFromRange(minNumber, maxNumber), randomNumberFromRange(minNumber, maxNumber));
                        questionBank = [];
                        questionBank.push(question);
                        correctQuestions.push({
                            'question': question
                        });
                        //console.log(question);
                        $("#object1").text(Math.max(num0, num1));
                        $("#object2").text(Math.min(num0, num1));
                        $("#getData").val("");
                        $("#getData").focus().select();
                        $("#boxContainer").css("padding-top", "20%");
                    } else if (parseInt(inputData) != questionBank[i].add()) {
                        $("#shakeContainer").effect("shake");
                        $("#getData").val("");
                        $("#getData").focus().select();
                    }
                    break;
                case "sub":
                    if (inputData == "") {
                        console.log("No answer give!");
                        $("#shakeContainer").effect("shake");
                    } else if (parseInt(inputData) === questionBank[i].sub()) {
                        question = genRandomQuestion(randomNumberFromRange(minNumber, maxNumber), randomNumberFromRange(minNumber, maxNumber));
                        questionBank = [];
                        questionBank.push(question);
                        correctQuestions.push({
                            'question': question
                        });
                        console.log(question);
                        $("#object1").text(Math.max(num0, num1));
                        $("#object2").text(Math.min(num0, num1));
                        $("#getData").val("");
                        $("#getData").focus().select();
                        $("#boxContainer").css("padding-top", "20%");
                    } else if (parseInt(inputData) != questionBank[i].sub()) {
                        $("#shakeContainer").effect("shake");
                        $("#getData").val("");
                        $("#getData").focus().select();
                    }
                    break;
                case "div":
                    if (inputData == "") {
                        console.log("No answer give!");
                        $("#shakeContainer").effect("shake");
                    } else if (parseInt(inputData) === questionBank[i].div()) {
                        question = genRandomQuestion(randomNumberFromRange(minNumber, maxNumber), randomNumberFromRange(minNumber, maxNumber));
                        questionBank = [];
                        questionBank.push(question);
                        correctQuestions.push({
                            'question': question
                        });
                        console.log(question);
                        $("#object1").text(Math.max(num0, num1));
                        $("#object2").text(Math.min(num0, num1));
                        $("#getData").val("");
                        $("#getData").focus().select();
                        $("#boxContainer").css("padding-top", "20%");
                    } else if (parseInt(inputData) != questionBank[i].div()) {
                        $("#shakeContainer").effect("shake");
                        $("#getData").val("");
                        $("#getData").focus().select();
                    }
                    break;
                case "mul":
                    if (inputData == "") {
                        console.log("No answer give!");
                        $("#shakeContainer").effect("shake");
                    } else if (parseInt(inputData) === questionBank[i].mul()) {
                        question = genRandomQuestion(randomNumberFromRange(minNumber, maxNumber), randomNumberFromRange(minNumber, maxNumber));
                        questionBank = [];
                        questionBank.push(question);
                        correctQuestions.push({
                            'question': question
                        });
                        console.log(question);
                        $("#object1").text(Math.max(num0, num1));
                        $("#object2").text(Math.min(num0, num1));
                        $("#getData").val("");
                        $("#getData").focus().select();
                        $("#boxContainer").css("padding-top", "20%");
                    } else if (parseInt(inputData) != questionBank[i].mul()) {
                        $("#shakeContainer").effect("shake");
                        $("#getData").val("");
                        $("#getData").focus().select();
                    }
                    break;
                default:
                    if (inputData == "") {
                        console.log("No answer give!");
                        $("#shakeContainer").effect("shake");
                    } else if (parseInt(inputData) === questionBank[i].add()) {
                        question = genRandomQuestion(randomNumberFromRange(minNumber, maxNumber), randomNumberFromRange(minNumber, maxNumber));
                        questionBank = [];
                        questionBank.push(question);
                        correctQuestions.push({
                            'question': question
                        });
                        console.log(question);
                        $("#object1").text(Math.max(num0, num1));
                        $("#object2").text(Math.min(num0, num1));
                        $("#getData").val("");
                        $("#getData").focus().select();
                        $("#boxContainer").css("padding-top", "20%");
                    } else if (parseInt(inputData) != questionBank[i].add()) {
                        $("#shakeContainer").effect("shake");
                        $("#getData").val("");
                        $("#getData").focus().select();
                    }
                    break;
            }
        }
    });
    $("#getData").focus(function() {
        $("#boxContainer").css("padding-top", "5%");
    });
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
        var ww = ($(window).width() < window.screen.width) ? $(window).width() : window.screen.width; //get proper width
        var mw = 460; // min width of site
        var ratio = ww / mw; //calculate ratio
        if (ww < mw) { //smaller than minimum size
            $('#Viewport').attr('content', 'initial-scale=' + ratio + ', maximum-scale=' + ratio + ', minimum-scale=' + ratio + ', user-scalable=yes, width=' + ww);
        } else { //regular size
            $('#Viewport').attr('content', 'initial-scale=1.0, maximum-scale=2, minimum-scale=1.0, user-scalable=no, width=' + ww);
        }
    }
});