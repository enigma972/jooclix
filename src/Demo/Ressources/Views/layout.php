<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;utf-8"/>
    <link rel="icon" href="/favicon.ico"/>
    <title>Lussi<?= isset($title) ? ' | ' . $title : ''; ?></title>
    <style type="text/css">
        body {
            padding-top: 50px !important;
            background-color: #EFEFF0 !important;
        }

        .corps {
            margin-top: 15px;
            background-color: white;
            border-radius: 15px;
        }

        pre {
            background-color: #0C1021 !important;
            color: #F8F8F8 !important;
        }

        .func {
            color: #FF640B;
        }

        .var {
            color: #f8f8f8;
        }

        .m_cle {
            color: #D8FA33;
        }

        .str {
            color: #61CE33;
        }
    </style>
    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="/libs/font-awesome/css/font-awesome.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="lussi" style="display: inline;"><img id="logo" src="/lussi.png"/></h1>
                </div>
                <div class="col-md-6">
                    <a class="pull-right" id="back" href="/app.php/demo">Retour à l'acceuil</a>
                </div>
            </div>

        </div>

        <!--Begin of view -->
        <?= $page; ?>
        <!--End of view -->
    </div>
</div>
<script type="text/javascript" src="/libs/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/libs/bootstrap/js/bootstrap.js"></script>
<script>
    var back = document.getElementById('back');

    if ('/app.php/demo' === window.location.pathname || '/demo' === window.location.pathname) {
        back.style.display = 'none';
    } else {
        back.style.display = 'display';
    }
</script>
</body>
</html>