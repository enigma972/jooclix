<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;utf-8"/>
    <title>Lussi<?= isset($title) ? ' | ' . $title : ''; ?></title>
    <link rel="icon" href="/favicon.ico"/>
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
    </style>
    <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="lussi"><img id="logo" src="/lussi.png"/></h1>
        </div>

        <!--Begin of view -->
        <?= $page; ?>
        <!--End of view -->
    </div>
</div>
</body>
</html>