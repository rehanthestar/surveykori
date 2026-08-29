document.addEventListener('DOMContentLoaded', function (){
    var bars = document.querySelectorAll('.chart-bar > span');
    for (var i=0; i<bars.length; i++){
        var bar = bars[i];
        var target = bar.getAttribute('data-percent');
        bar.style.width='0%'
        (function (element, percent) {
            setTimeout(function (){
                element.style.transition='width .4s ease';
                element.style.width = percent + '%';
            },60)
        })(bar, target);
    }
});