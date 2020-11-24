$('.rr-btn').click(function(){
    var f = $('.rr-btn');
    if(f.hasClass('rr-color')){
        f.removeClass('rr-color');
    }
    var tag = $('.rr-article-title');
    $(this).addClass('rr-color');
    var d = tag.text();
    tag.fadeOut();
    var p = $(this).attr('price');
    tag.empty().text(p).fadeIn();
});