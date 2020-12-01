<?php
    session_start();

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Profile</p>';
    $titre = "Profile - Rolling Stones Forum";
    $css = 'form';


    include "includes/connect.php";   
    include "includes/header.php";

    if(!isset($_SESSION['id'])) {

        echo "<h2> You must be logged to access this page... </h2>";
        include "includes/footer.php";
        exit();
    }



?>

<h2 class="title">Profile</h2>

<form class="formulary" action="target_profile.php" method="POST" enctype="multipart/form-data">

    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control form-bindput" id="inputUsername" name="inputUsername" placeholder="User name">
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control form-bindput" id="inputUserSignature" name="inputUserSignature" placeholder="Signature">
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
            <input type="file" class="form-control form-bindput" id="avatar" name="avatar">
        </div>
    </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Submit </button>
       
</form>


<?php 
    include "includes/footer.php";
?>
