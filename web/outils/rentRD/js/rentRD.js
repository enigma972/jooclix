$('.check-parent').click(function(){
    var tr = $('table tbody td input'),
        i = 0,
        tt = tr.length;
    if($(this).hasClass("success-rd")){
        $(this).removeClass('success-rd');
        tr.click();
    }else{
        $(this).addClass('success-rd');
        tr.click();
    }
});


$('.rentRD-item1-form input').checkboxpicker({
    html: true,
    offLabel: '<span class="glyphicon glyphicon-remove">',
    onLabel: '<span class="glyphicon glyphicon-ok">'
});