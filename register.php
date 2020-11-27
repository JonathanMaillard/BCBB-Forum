<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Register</p>';
    $titre = "Inscription - Rolling Stones Forum";
    $css = 'form';

    include "includes/connect.php";
    include "includes/header.php";
?>


<h2 class="title">Subscription</h1>

<form class="formulary" action="target_register.php" method="POST">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="inputLabel" for="inputUsername">Username</label>
            <input type="text" class="form-control form-bindput" id="inputUsername" name="inputUsername" placeholder="Enter your name">
        </div>
        <div class="form-group col-md-6">
            <label class="inputLabel" for="inputEmail">E-mail</label>
            <input type="email" class="form-control form-bindput" id="inputEmail" name="inputEmail" placeholder="Enter your e-mail">
        </div>
    </div>  

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="inputLabel" for="inputAvatar">Avatar</label>
            <input type="text" class="form-control form-bindput" id="inputAvatar" name="inputAvatar" placeholder="Enter your Avatar">
        </div>
        <div class="form-group col-md-6">
            <label class="inputLabel" for="inputUserSignature">Signature</label>
            <input type="text" class="form-control form-bindput" id="inputUserSignature" name="inputUserSignature" placeholder="Enter your Signature">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="inputLabel" for="inputPassword">Password</label>
            <input type="password" class="form-control form-bindput" id="inputPassword" name="inputPassword" placeholder="Enter your Password">
        </div>
        <div class="form-group col-md-6">
            <label class="inputLabel" for="inputPassword2">Password*</label>
            <input type="password" class="form-control form-bindput" id="inputPassword2" name="inputPassword2" placeholder="Re-enter your Password">
        </div>
    </div>

        <button type="submit" class="btn btn-primary"> Submit <i class="fa fa-sign-in" aria-hidden="true"></i></button>
        
</form>


<?php
    include "includes/footer.php";
?>