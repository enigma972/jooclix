$('.mouse').focus(function(){
    // todo: Cette ligne doit êyre corrigé
    // $('.mouse').removeClass('success-mouse').removeAttr('id');
    $('.mouse').removeClass('success-mouse');
    $(this).addClass('success-mouse').attr('id', 'success-mouse');
});


$('.key').click(function(){

      if($('.mouse').hasClass('success-mouse')){
        document.getElementById('success-mouse').focus();
          var text = $(this).text();
          (text === 'tab')? text = '     ':'';
          (text === 'Space')? text=' ':'';
          if(text === 'delete'){
              var deletes = $('.success-mouse').val();
              if(deletes !== ''){
                  var champ = $('.success-mouse');
                    champ.val('');
                    for(var i = 0; i < deletes.length-1; i++){
                        champ.val(champ.val() + deletes.charAt(i));
                    }
              }
              text = '';
          }
          $('.success-mouse').val($('.success-mouse').val() + text);
      }
});


$('.caps-locks').click(function(){
    var tab = ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D', 'F', 'G', 'N', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M'];
    var tabs = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];
    var let = $('.letter');
    var letter = $('.letter').length;

    if ($(this).hasClass('Maj')){
        for(var i = 0; i < letter; i++){
            let.eq(i).empty().text(tabs[i]);
        }
        $(this).removeClass('Maj').addClass('Min');
    }else if($(this).hasClass('Min')) {
        for(var i = 0; i < letter; i++){
            let.eq(i).empty().text(tab[i]);
        }
        $(this).removeClass('Min').addClass('Maj');
    }
});

$('.shift').click(function () {
    var Cars = ['~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '{', '}', '|', ':', '"', '<', '>', '?'];
    var CarsMin = ['`', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '-', '=', '[', ']', '\\', ';', ',', '.', '\'','/' ];
    var tab = ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D', 'F', 'G', 'N', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M'];
    var tabs = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm'];

    var carLetter = $('.car');
    var CarTotal = carLetter.length;
    var letter = $('.letter');


    if($('.shift').hasClass('shifs-val')){
        for (var i = 0; i < CarTotal; i++){
            carLetter.eq(i).empty().text(Cars[i]);
        }
        if($('.caps-locks').hasClass('Maj')){
            for(var i = 0; i < letter.length; i++){
                letter.eq(i).empty().text(tabs[i]);
            }
            $('.caps-locks').removeClass('Maj').addClass('Min');
        }else if($('.caps-locks').hasClass('Min')){
            for(var i = 0; i < letter.length; i++){
                letter.eq(i).empty().text(tab[i]);
            }
            $('.caps-locks').removeClass('Min').addClass('Maj');
        }
        $('.shift').removeClass('shifs-val');
        $(this).addClass('shifs-close');


    }else if($('.shift').hasClass('shifs-close')){
        for (var i = 0; i < CarTotal; i++){
            carLetter.eq(i).empty().text(CarsMin[i]);
        }

        if($('.caps-locks').hasClass('Maj')){
            for(var i = 0; i < letter.length; i++){
                letter.eq(i).empty().text(tabs[i]);
            }
            $('.caps-locks').removeClass('Maj').addClass('Min');
        }else if($('.caps-locks').hasClass('Min')){
            for(var i = 0; i < letter.length; i++){
                letter.eq(i).empty().text(tab[i]);
            }
            $('.caps-locks').removeClass('Min').addClass('Maj');
        }
        $('.shift').removeClass('shifs-close');
        $(this).addClass('shifs-val');
    }
});