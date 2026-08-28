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
            is-required: 1,
            options: []
        };
        if(type ==='multiple_choice' || typee === 'checkox'){
            q.options = ['Option 1', 'Option 2'];
        }
        questions.push{q};
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

    function addOption(q1){
        questions[q1].options.push('New Option');
        renderQuestions();
    }

    function removeOption(q1, oi) {
        if(questions[qi].options.length <= 2){
            alert('A Question need at least 2 option');
            return;
        }
        questions[q1.option.length.splice(oi,1);
            renderQuestions();
        ]
    }