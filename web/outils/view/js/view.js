  /*Created by Jooclix on 25/02/2018.
    *====================================== Jooclix code ============================/**
   */




    /*
    buttonClix function clicking pucture
    */
    function buttonClic(x,y,d) {
        if(typeof x == 'number' && typeof y == 'number'){
           var clix = '.clic-' +d, cx = '.cx-' +d, xpx = x +'px', ypx = y + 'px';
            $(cx).addClass('v-xo');
            $(clix).css({
               
                top: xpx,
                left: ypx
            });
        }
    }

    /*
    disabled advertise clicking success !
     */
    function disabled(x,y,p) {
        $(x).remove();
        $(y).addClass('view-disabled');
        $(p).addClass('x-di');
    }

