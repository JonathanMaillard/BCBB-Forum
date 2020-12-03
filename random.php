<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Random</p>';
    $titre = "Inscription - Rolling Stones Forum";
    $css = 'form';

    include "includes/connect.php";
    include "includes/header.php";
?>




<?php
    include "includes/footer.php";
?>