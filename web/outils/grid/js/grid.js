function gridUrl(o){
    window.open('http://www.google.com?id=' + o);
}



function gridOver(i,a){
    $('#grid-resultat').empty().prepend(i +'/' + a);
    $('.list-grid td').mouseout(function(){
        $('#grid-resultat').empty().text('Click anywhere on the picture');
    });
}