<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Profile</p>';
    $titre = "Profile - Rolling Stones Forum";
    $css = 'form';
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

   /* if(isset($_POST['inputAvatar']) AND !empty($_POST['inputAvatar']) AND $_POST['inputAvatar'] != $user['user_avatar']) {
        $newInputAvatar = htmlspecialchars($_POST['inputAvatar']);
        $insertInputAvatar = $db->prepare("UPDATE users SET user_avatar = ? WHERE user_id = ?");
        $insertInputAvatar->execute(array($newInputAvatar, $_SESSION['id']));
    } */

    if(isset($_POST['inputPassword']) AND !empty($_POST['inputPassword']) AND isset($_POST['inputPassword2']) AND !empty($_POST['inputPassword2'])) {
        $password1 = hash('sha256', $_POST['inputPassword']);
        $password2 = hash('sha256', $_POST['inputPassword2']);

        if($password1 == $password2) {
            $insertmdp = $db->prepare("UPDATE users SET user_pass = ? WHERE user_id = ?");
            $insertmdp->execute(array($password1, $_SESSION['id']));
            
        } else {
            $msg = "Password and password* must be the same !";
        }
    }

    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
        $tailleMax = 2097152; //octets
        $extensionsValides = array('jpg', 'jpeg', 'png');

        if($_FILES['avatar']['size'] <= $tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

            if(in_array($extensionUpload, $extensionsValides)) {
                $chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

                if($resultat) {
                    $updateavatar = $db->prepare('UPDATE users SET user_avatar = :avatar WHERE user_id = :id');
                    $updateavatar->execute(array(
                    'avatar' => $_SESSION['id'].".".$extensionUpload,
                    'id' => $_SESSION['id']
                    ));
                   // header('Location: profile.php?id='.$_SESSION['id']);
                } else {
                    $msg = "Erreur durant l'importation de votre photo de profil";
                }
            } else {
                $msg = "Votre photo de profil doit être au format jpg, jpeg ou png";
            }
        } else {
            $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
        }
    }
}
?>

<h2 class="title">Your profile has been updated</h2>

<p class="resume">Username : <?php echo $_POST["inputUsername"]; ?></p>
<p class="resume">Signature : <?php echo $_POST["inputUserSignature"];?></p>
<p class="resume">Avatar : <img src="<?php echo $_FILES["avatar"];?>" alt="Avatar"/>   


<?php 
    include "includes/footer.php";
?>