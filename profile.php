<?php
    session_start();

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Profile</p>';
    $titre = "Profile - Rolling Stones Forum";
    $css = 'form';


    include "includes/connect.php";   
    include "includes/header.php";

    if(!isset($_SESSION['id'])) {

        echo "<h2> You must be logged to access this page... GET OUT!!!</h2>";
        include "includes/footer.php";
        exit();
    }



?>

<h2 class="title">Profile</h2>

<form class="form" action="target_profile.php" method="POST">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputUsername">Username</label>
            <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Enter your name">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAvatar">Avatar</label>
            <input type="text" class="form-control" id="inputAvatar" name="inputAvatar" placeholder="Enter your Avatar">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputUserSignature">Signature</label>
            <input type="text" class="form-control" id="inputUserSignature" name="inputUserSignature" placeholder="Enter your Signature">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Enter your Password">
        </div>
        
       <div class="form-group col-md-6">
            <label for="inputPassword2">Password*</label>
            <input type="password" class="form-control" id="inputPassword2" name="inputPassword2" placeholder="Re-enter your Password">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
        
</form>


<?php 
    include "includes/footer.php";
?>
