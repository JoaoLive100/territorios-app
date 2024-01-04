<?php
    include_once("./includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Titulo Dinâmico -->
        <title><?php echo $title ?></title>
        <!-- JS Dinâmico -->
        <script src="<?php echo $js ?>"></script>
        <!-- CSS Dinâmico -->
        <link rel="stylesheet" href="<?php echo $css ?>" />
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
        <!-- Bootstrap JS -->
        <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <!-- CSS Principal -->
        <!-- <link rel="stylesheet" href="../../css/styles.css" /> -->
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </head>
    <body id="page-top">