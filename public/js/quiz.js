(function(){

    var	app = angular.module('mathQuiz', []);
    app.controller('QuizController', ['$scope', '$http', '$sce', function($scope, $http, $sce){
        $scope.score = 0;
        $scope.activeQuestion = -1;
        $scope.activeQuestionAnswered = 0;
        $scope.percentage = 0;

        $http.get('/quizdata').then(function(quizData){
            $scope.myQuestions = quizData.data;
            $scope.totalQuestions = $scope.myQuestions.length;
        });

        $scope.selectAnswer = function(qIndex, aIndex){
            var questionState = $scope.myQuestions[qIndex].questionState;
            // send answer, questionid and userid to server
            $http.post('/quiz/'+$scope.myQuestions.test_id,{'question':qIndex,'answer':aIndex});
            $scope.myQuestions[qIndex].questionState = 'answered';
        }
        $scope.isSelected = function(qIndex,aIndex){
            return $scope.myQuestions[qIndex].selectedAnswer === aIndex;
        }
        $scope.isCorrect = function(qIndex,aIndex){
            return $scope.myQuestions[qIndex].correctAnswer === aIndex;
        }
        $scope.selectContinue = function(){
            return $scope.activeQuestion += 1;
        }
        $scope.createShareLinks = function(percentage){
            var url='http://www.all-gifted.com';
            var emailLink = '<a class="btn email" href = "#">Email parent</a>';
            var twitterLink = '<a class="btn twitter" target="_blank" href="#">Tweet parent</a>';
            var newMarkup = emailLink + twitterLink;
            return $sce.trustAsHtml(newMarkup);
        }

    }]);

})();