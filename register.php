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


<h2 class="title">Subscription</h2>


<form class="formulary" action="target_register.php" method="POST" enctype="multipart/form-data">

    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control form-bindput" id="inputUsername" name="inputUsername" placeholder="User name" >
        </div>
        <div class="form-group col-md-6">
            <input type="email" class="form-control form-bindput" id="inputEmail" name="inputEmail" placeholder="@ E-mail">
        </div>
    </div>  

    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="password" class="form-control form-bindput" id="inputPassword" name="inputPassword" placeholder="Password">
        </div>
        <div class="form-group col-md-6">
            <input type="password" class="form-control form-bindput" id="inputPassword2" name="inputPassword2" placeholder="Password (again)">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control form-bindput" id="inputUserSignature" name="inputUserSignature" placeholder="Signature">
        </div>
    </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Submit </button>
        
</form>


<?php
    include "includes/footer.php";
?>