/*
 script lance add-item-wrapper du processeur
 */
$('.add-circle img').click(function(){
    var addItem = $('.add-circle img'),
        addModal = $('.add-modal'),
        img = $(this).attr('src');
    // Instruction
        addItem.removeClass('add-active');
        $(this).addClass('add-active');
        $('.add-modal-img img').attr('src', img);
        addModal.slideToggle();
        $('.back-modal').fadeIn();
});


function addClose() {
    $('.add-modal').slideToggle();
    $('.back-modal').fadeOut();
    $('.add-info').hide().attr('style', '');
}

/*
    addInfo
 */
function addInfo(){
   var value =  $('.add-name input').val();
   if(value == "" ){
       $('.add-info').css({
           left: '5%',
           opacity: 0.9,
           display: 'block'
       });
   }
}