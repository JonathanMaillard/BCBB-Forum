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

    $password = hash('sha256', $_POST['inputPassword']);

    $values = array(":name"=>$_POST["inputUsername"], ":email"=>$_POST["inputEmail"], ":avatar"=>$_POST["inputAvatar"], ":signature"=>$_POST["inputUserSignature"], ":password"=>$password);

    $req = $db->prepare("INSERT INTO users(user_name, user_email, user_avatar, user_signature, user_pass) VALUES(:name, :email, :avatar, :signature, :password)");
    
    $req->execute($values);


    include "includes/header.php";
?>



    <h2>Subscription successful</h2>




<?php
    include "includes/footer.php";
?>


