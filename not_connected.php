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

echo 'You should be connected to add a new topic';

include "includes/header.php";

?>

<h2 class="title">Log in</h2>
<p class="resume"><?php echo $message ?></p>

<button type="submit" class="btn btn-primary"> Continue <i class="fa fa-sign-in" aria-hidden="true"></i></button>

<?php
    include "includes/footer.php";
?>