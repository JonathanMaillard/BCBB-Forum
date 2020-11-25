<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Register</p>';
    $titre = "Log in - Rolling Stones Forum";
?>

<?php

include "includes/connect.php";

    if(isset($_POST['inputUsername'])){
        
        $username = $_POST['inputUsername'];
        $password = hash('sha256', $_POST['inputPassword']);

        $query=$db->prepare('SELECT * FROM users WHERE user_name ="'. $username .'" AND user_pass= "'. $password .'"');

        $query->execute();
        
        $result = $query->fetch(PDO::FETCH_ASSOC);
      
       //print_r($result['user_id']);
       //print_r($result['user_name']);

        if(isset($result['user_name'])){
            $message = "You have successfully logged in";
            $_SESSION['pseudo'] = $result['user_name'];
            $_SESSION['id'] = $result['user_id'];
        }
        else {
            $message = "You have entered an incorrect password";
        }

}

    

include "includes/header.php";

?>

<h2><?php echo $message ?></h2>

<?php
    include "includes/footer.php";
?>

