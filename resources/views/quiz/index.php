<!DOCTYPE HTML>
<html ng-app="mathQuiz">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adaptive Math Test</title>
    <link rel="stylesheet" type="text/css" href="css/quiz.css">
</head>
<body>
<div id="mathQuiz" ng-controller="QuizController">
    <h1>All Gifted Adaptive Test<span>Math</span></h1>
    <div class="progress">
        <div class="
				{{($index === activeQuestion) ? 'on':'off'}}
				{{ (myQuestion.answered) ? 'answered': 'unanswered'}}
				{{ (myQuestion.questionState === 'answered') ? 'answered' : 'unanswered'}}
				{{ (myQuestion.correctness === 'correct') ? 'correct' : 'incorrect'}}"
             ng-repeat="myQuestion in myQuestions"></div>
    </div>
    <div class="intro {{ (activeQuestion > -1) ? 'inactive' :'active'}}">
        <h2>Welcome</h2>
        <p>Click begin to start your Math test</p>
        <p class="btn" ng-click="activeQuestion=0">Begin</p>
    </div>
    <div class="question
				{{ $index === activeQuestion ? 'active':'inactive'}} {{ myQuestion.questionState === 'answered' ? 'answered':'unanswered'}}" ng-repeat="myQuestion in myQuestions">
        <p class="txt">
            {{ myQuestion.question }}</br>
            <img src="{{ myQuestion.question_image}}" class="image" alt=""/>
        </p>
        <p class="ans"
           ng-class="{
						image:Answer.image,
						selected: isSelected($parent.$index, $index),
						correct: isCorrect($parent.$index, $index)
					}"
           ng-style="{ 'background-image':'url({{Answer.image}})'}"
           ng-repeat="Answer in myQuestions[$index].answers"
           ng-click="selectAnswer($parent.$index, $index)">{{ Answer.text }}</p>
        <div class="feedback">
            <p ng-show="myQuestion.correctness === 'correct'">You are <strong>correct</strong>!</p>
            <p ng-show="myQuestion.correctness === 'incorrect'">Oops! That is <strong>not correct.</strong></p>
            <p>{{myQuestion.feedback}}</p>
            <div class="btn" ng-click="selectContinue()">Continue</div>
        </div>
    </div>
    <div class="results  {{(totalQuestions === activeQuestion) ? 'active' : 'inactive'}}">
        <h3>Results</h3>
        <p>You scored {{percentage}}% by correctly answering {{score}} of the total {{totalQuestions}} questions.<br/>The break down of your results are as follows:</p>
        <p ng-repeat="Result in myMessages.result">
        Your result for {{Result.track}} is {{Result.max}}.</p>
        <p>Use the links below to challenge your friends.</p>
        <div class="share" ng-bind-html = "createShareLinks(percentage)"></div>
    </div>
</div>
<script type="text/javascript" src="js/angular.min.js"></script>
<script type="text/javascript" src='js/quiz.js'></script>

</body>
</html>