$('.btn-deconnection').click(function(e){
    e.preventDefault();
   $('.back-modal').fadeIn();
   $('.deconnection').css({
        top : '40%',
        opacity : 1,
        display : 'block'
   });

});

function CloseDeconnect(){
    $('.back-modal').fadeOut();
    $('.deconnection').slideToggle();
}

function deconnect() {
    window.location = '/logout';
}
