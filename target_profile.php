<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $titre = "Profile - Rolling Stones Forum";
?>

<?php

include "includes/connect.php";
include "includes/header.php";
 
if(isset($_SESSION['id'])) {

   $req = $db->prepare("SELECT * FROM users WHERE user_id = ". $_SESSION['id'] ."");
   $req->execute();
   $user = $req->fetch();


   if(isset($_POST['inputUsername']) AND !empty($_POST['inputUsername']) AND $_POST['inputUsername'] != $user['user_name']) {

        $newInputUsername = htmlspecialchars($_POST['inputUsername']);
        $insertUsername = $db->prepare("UPDATE users SET user_name = ? WHERE user_id = ?");
        $insertUsername->execute(array($newInputUsername, $_SESSION['id']));
        $_SESSION['pseudo'] = $newInputUsername;
    }

    if(isset($_POST['inputUserSignature']) AND !empty($_POST['inputUserSignature']) AND $_POST['inputUserSignature'] != $user['user_signature']) {
        $newInputUserSignature = htmlspecialchars($_POST['inputUserSignature']);
        $insertSignature = $db->prepare("UPDATE users SET user_signature = ? WHERE user_id = ?");
        $insertSignature->execute(array($newInputUserSignature, $_SESSION['id']));
    }

    if(isset($_POST['inputAvatar']) AND !empty($_POST['inputAvatar']) AND $_POST['inputAvatar'] != $user['user_avatar']) {
        $newInputAvatar = htmlspecialchars($_POST['inputAvatar']);
        $insertInputAvatar = $db->prepare("UPDATE users SET user_avatar = ? WHERE user_id = ?");
        $insertInputAvatar->execute(array($newInputAvatar, $_SESSION['id']));
    } 

    if(isset($_POST['inputPassword']) AND !empty($_POST['inputPassword']) AND isset($_POST['inputPassword2']) AND !empty($_POST['inputPassword2'])) {
        $password1 = hash('sha256', $_POST['inputPassword']);
        $password2 = hash('sha256', $_POST['inputPassword2']);

        if($password1 == $password2) {
            $insertmdp = $db->prepare("UPDATE users SET user_pass = ? WHERE user_id = ?");
            $insertmdp->execute(array($password1, $_SESSION['id']));
            
        } else {
            $msg = "Vos deux mdp ne correspondent pas !";
        }
    }
 }
?>


<?php 
    include "includes/footer.php";
?>