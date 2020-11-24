/*
 * Gestion de l'activation de compte
 */

function activateAccount(form) {
    // verification de données

    // Envoi de données

    // Reception de la reponse

    var donnees = $(form).serialize();

    $.post(
        '/activateaccount',
        donnees,
        function (response) {
            alert(response);
        },
        'text'
    );
}

function resendCode(email){
    // Vérification de données
    if (true) {
        var email = $(email).attr('name') + '=' + $(email).val() + '&resend=' + 'true';

        $.post(
            '/activateaccount',
            email,
            function(response){
                alert(response);
            },
            'text'
        );
    }
}

