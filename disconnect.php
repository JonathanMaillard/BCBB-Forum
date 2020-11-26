<?php

include "includes/connect.php";


    // Inialize session
    session_start();

    // Delete certain session
    // unset($_SESSION['pseudo']);
    // Delete all session variables
    session_destroy();

    // Jump to login page
    header('Location: index.php');
        
?>

