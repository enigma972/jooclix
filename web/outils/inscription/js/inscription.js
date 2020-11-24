/**
 * Created by Jooclix on 29/03/2018.
 */


/*debut popover champ
 ==============
 */
$("#popover-1").focus(function () {
    $(this).popover();
});

$("#popover-2").focus(function () {
    $(this).popover({placement: 'left'});
});


/**
 * Cette fonction gère l'inscription
 *
 * @param form string La classe (class) ou l'id (id) du formulaire qui a les données pour l'inscription
 */
function inscription(form) {
    $(function () {
        var donnees = $(form).serialize();
        // alert(decodeURIComponent(donnees));

        $.post(
            '/inscription.php',
            donnees,
            function (reponse) {
                if (reponse == 1) {
                    alert('Case non cochée');
                } else if (reponse == 2) {
                    alert('Captcha incorrect');
                } else if (reponse == 3) {
                    alert('pseudo invalide');
                } else if (reponse == 4) {
                    alert('pseudo déjà utilisé');
                } else if (reponse == 5) {
                    alert('password trop court');
                } else if (reponse == 6) {
                    alert('E-mail incorrect');
                } else if (reponse == 7) {
                    alert('pays incorrect');
                } else if (reponse == 8) {
                    alert('L\'utilisateur existe déjà');
                }
                else if (reponse == 9) {
                    alert('Un problème interne au serveur');
                }
                else if (reponse == 10) {
                    window.location = '/connexion.php';
                } else {
                    alert(reponse);
                }
            },
            'text'
        );
    });
}