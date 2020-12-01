<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Register</p>';
    $titre = "Register - Rolling Stones Forum";
?>

<?php 

    include "includes/connect.php";

    if(isset($_POST['inputPassword']) AND !empty($_POST['inputPassword']) AND isset($_POST['inputPassword2']) AND !empty($_POST['inputPassword2'])) {
        $password1 = hash('sha256', $_POST['inputPassword']);
        $password2 = hash('sha256', $_POST['inputPassword2']);

        if($password1 != $password2) {
            include "includes/header.php";
            echo "<p> Passwords don't match !</p>";
            include "includes/footer.php";
            exit();    
        }
    }

    $values = array(":name"=>$_POST["inputUsername"], ":email"=>$_POST["inputEmail"], ":avatar"=>$_POST["inputAvatar"], ":signature"=>$_POST["inputUserSignature"], ":password"=>$password1);

    $req = $db->prepare("INSERT INTO users(user_name, user_email, user_avatar, user_signature, user_pass) VALUES(:name, :email, :avatar, :signature, :password)");
    
    $req->execute($values);

    include "includes/header.php";
?>



    <h2>Subscription successful</h2>


    <button type="submit" class="btn btn-primary"><a href="index.php"> Continue </a><i class="fa fa-sign-in" aria-hidden="true"></i></button>

<?php
    include "includes/footer.php";
?>


