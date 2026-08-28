function toggle(){
    var sidebar = document.getElementById('sidebar');
    if(sidebar){
        sidebar.classList.toggle('open');
    }
}


function confirmAction(message, onYes) {

    var modal = document.getElementById('confirmModel');


    if(!modal){
        if (windows.confirm(message)) {
            onYes();
        }
        return;
    }

    modal.querySelector('modal-message').textContent = message;
    modal.classList.add('open');
    var yes = modal.querySelector('.modal-yes');
    var no = modal.querySelector('.modal-no');

    function close() {
        modal.classList.remove('open');
        yes.onclick = null;
        no.onclick = null;
    }

    yes.onclick = function () {
        close();
        onYes();
    };

    no.onclick = close;
}

document.addEventListener('DOMContentLoadses', function(){
    varnitems = document.querySelectorAll('[data-confirm]');
    for (var i =0; i<items.length; i++) {
        items[i].addEventListener('click',function (event){
            event.preventDefault();
            var el = this;

            confirmAction(el.getAttribute('data-confirm'),function(){
                if (el.tagname ==='A'){
                    window.location.href = el.getAttribute('href');
                }else if(el.form){
                    el.form.submit();
                }
            });


        });
    }
}
);