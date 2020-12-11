<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Log in</p>';
    $titre = "Log in - Rolling Stones Forum";
    $css = 'form';
?>

<?php

include "includes/connect.php";

include "includes/header.php";

?>



<p>You have to be connected to add a new topic.</p>

<a href="login.php" type="submit" class="btn btn-primary"> Log in <i class="fa fa-sign-in" aria-hidden="true"></i></a>

<?php
    include "includes/footer.php";
?>