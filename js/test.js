var minNumber = 100;
var maxNumber = 0;

var questionBank = [];
var correctQuestions = [];

var timer = null;

var num0 = 0;
var num1 = 0;

function startGame() {
    setTimeout(function() {
        stopGame();
    }, 10000);
}

function stopGame() {
    if (timer != null) clearTimeout(timer);
    /*
        Add code to stop game
    */
    submitGame();
    //window.location.reload();
}

function randomNumberFromRange(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function submitGame() {
    if(correctQuestions.length > 0) {
        var games = JSON.stringify(correctQuestions);
        console.log(games);
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

    subtract: function() {
        var answer = this.numberFirst - this.numberSecond;
        return answer;
    },

    mult: function() {
        var answer = this.numberFirst * this.numberSecond;
        return answer;
    },

    divide: function() {
        var answer = this.numberFirst / this.numberSecond;
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

questionBank.forEach(function(Question) {
    console.log(Question.add());
});

// jquery
$("#object1").text(num0);
$("#object2").text(num1);
$(function() {
    $('#spanId').text();
    // getting input data on click
    $("#addTask").click(function() {
        var inputData = $("#getData").val();
        for (let i = 0; i < questionBank.length; i++) {
            if (inputData == "") {
                alert("No answer");
            } else if (parseInt(inputData) === questionBank[i].add()) {
                question = genRandomQuestion(randomNumberFromRange(minNumber, maxNumber), randomNumberFromRange(minNumber, maxNumber));
                questionBank = [];
                questionBank.push(question);
                correctQuestions.push({'question': question});
                console.log(question);
                $("#object1").text(num0);
                $("#object2").text(num1);
                $("#getData").val("");
                $("#getData").focus().select();
                $("#boxContainer").css("padding-top", "20%");
            } else if (parseInt(inputData) != questionBank[i].add()) {
                $("#getData").val("");
            }
        }
    });
    $("#getData").focus(function() {
        $("#boxContainer").css("padding-top", "20%");
    });
});