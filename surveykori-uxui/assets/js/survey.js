var currentQuestion = 0;
var questionCards = [];

document.addEventListener('DOMContentLoaded', function() {
    questionCards = document.querySelectorAll('.take-question');
    if (questionCards.length > 0) {
        showQuestion(0);
    }
});

function showQuestion(index){
    for (var i = 0; i < questionCards.length; i++){
        questionCards[i].style.display = (i == index) ? 'block' : 'none';
    }
    currentQuestion = index;

    document.getElementById('progressText').textContent =
    'Question ' + (index + 1) + ' of ' + questionCards.length;
    document.getElementById('progressBar').style.width = 
    (((index + 1) / questionCards.length) * 100) + '%';

    document.getElementById('prevBtn').style.display = (index === 0) ? 'none' : 'inline-block';
    var last = (index === questionCards.length -1);
    document.getElementById('nextBtn').style.display = last ? 'none' : "inline-block";
    document.getElementById('submitBtn').style.display = last ?  "inline-block" : 'none';

}

function nextQuestion() {
    if (!validateQuestion(currentQuestion)) { return; }
    if (currentQuestion < questionCards.length - 1) { 
        showQuestion(currentQuestion + 1);
     }
}