document.addEventListener('DOMContentLoaded', function (){
    var bars = document.querySelectorAll('.chart-bar > span');
    for (var i=0; i<bars.length; i++){
        var bar = bars[i];
        var target = bar.getAttribute('data-percent');
        bar.style.width='0%'
        
    }
})