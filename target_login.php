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
            // line for update the datetime of user_last_login
            $db->exec('UPDATE users SET user_last_login = now() WHERE user_id ="'. $_SESSION['id'] .'"');
        }
        else {
            $message = "You have entered an incorrect password";
        }

}

    

include "includes/header.php";

?>

<h2 class="title">Log in</h2>
<p class="resume"><?php echo $message ?></p>

<button type="submit" class="btn btn-primary"><a href="login.php"> Return </a><i class="fa fa-sign-in" aria-hidden="true"></i></button>

<?php
    include "includes/footer.php";
?>

