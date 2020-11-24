/**
 * Created by Chris Kuika on 16/04/2018.
 */

function connexion (form) {
    $(function () {
        var donnees = $(form).serialize();

        $.post(
            '/connexion.php',
            donnees,
            function (reponse) {
                if (reponse == 'Vous étès connecté'){
                    window.location = '/account/dashboard'
                }else{
                    alert(reponse);
                }
            },
            'text'
        );
    });
}