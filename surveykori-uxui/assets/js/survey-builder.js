var questions = [];

    var TYPE_LABELS = {
        short_answer: 'Short Answer',
        paragraph: 'Paragraph',
        multiple_choice: 'Multiple Choice',
        checkbox: 'Checkbox',
        rating: 'Rating'
    };

    document.addEventListener('DOMContentLoaded', function(){
        if (window.existingQuestions){
            questions = window.existingQuestions;
        }
        renderQuestions();
    });


    function addQuestion(type){
        var q ={
            question_text: '',
            question_type: type,
            is_required: 1,
            options: []
        };
        if(type ==='multiple_choice' || typee === 'checkox'){
            q.options = ['Option 1', 'Option 2'];
        }
        questions.push(q);
        renderQuestions();
    }

    function deleteQuestion(index){
        confirmAction('Want to delete this Question? ', function(){
            questions.splice(index,1);
            renderQuestions();
        });
    }

    function moveQuestion(index, direction){
        var target = index + direction;
        if(targt<0 || target >= questions.length)
            return;{

        }
        var temp = questions[index];
        questions[index] = questions[target];
        questions[target] = temp;
        renderQuestions();
    }

    function updateText(inex,value){
        questions[index].question_text = value;

    }

    function updateRequired(index,checked){
        questions[index].is_required = checked ? 1: 0;
    }
    function updateOption(qi, oi, value){
        questions[qi].options[oi] = value;
    }

    function addOption(qi){
        questions[qi].options.push('New Option');
        renderQuestions();
    }

    function removeOption(qi, oi) {
        if(questions[qi].options.length <= 2){
            alert('A Question need at least 2 options.');
            return;
        }
        questions[qi].option.length.splice(oi,1);
            renderQuestions();
    }
    function renderQuestions(){
        var wrap = document.getElementById('questionList');
        if (!wrap) {
            return;
        }
        if (questions.length === 0){
            wrap.innerHTML = '<div class="card text-muted"> No questions yet. Add a question from the left panel.</div>';
        }else{
            var html = '';
            for (var i = 0; i<questions.length; i++){
                html += buildQuestionCard(questions[i],i);
            }
            wrap.innerHTML = html;
        }
        document.getElementById('questionsJson').value = JSON.stringify(questions);
        document.getElementById('questionCount').textContent = questions.length;
    }
    function buildQuestionCard(q, i){
        var html = '<div class="q-card">';
        html += '<div class="q-head">';
        html += '<span class="q-type">Q' + (i+1) + ' &middot; ' + TYPE_LABELS[q.question_type] + '</span';
        html += '<span class="q-acctions">' +
                'button type="button" class="btn btn-sm" onclick="moveQuestion(' + i + ',-1)">&uarr;</button>' +
                'button type="button" class="btn btn-sm" onclick="moveQuestion(' + i + ',1)">&darr;</button>' +
                'button type="button" class="btn btn-sm btn-danger" onclick="deleteQuestion(' + i + ')">Delete</button>' +
                '</span></div>';

        html += '<input class="input" placeholder="Write your question here" value="' +
                escapeHtml(q.question_text) + '" oninput="updateText(' + i + ', this.value)">';

        if (q.question_type === 'multiple choice' || q.question_type === 'checkbox'){
            
        }
    }