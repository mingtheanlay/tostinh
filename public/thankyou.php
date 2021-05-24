<!DOCTYPE html>
<html lang="en">
<?php require_once("../resources/config.php"); ?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="img/nav-brand-tran.png" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/thankyou.css">
    <title>Thank You</title>
</head>

<body>
    <div class="jumbotron text-center  vertical-center">
        <div class="container">
            <h1 class="display-1">Thank You!</h1>
            <p class="lead">
                <strong class="text-primary">You have successfully purchased</strong>
            </p>
            <hr />
            <p class="text-success">You have charged <strong>
                    <?php echo "&#36;" . ($_SESSION['price_total']) ?></strong>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-md" href="http://localhost:8888/tostinh/public/" role="button">Continue to
                    homepage</a>
            </p>
        </div>

    </div>
</body>

</html>