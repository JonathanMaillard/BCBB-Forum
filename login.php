<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Login</p>';
    $titre = "Login - Rolling Stones Forum";
    $css = "form";

    include "includes/connect.php";
    include "includes/header.php";
?>

<h2 class="title">Login</h2>

<form class="formulary" action="target_login.php" method="POST"> 

    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control form-bindput" id="inputUsername" name="inputUsername" placeholder="Enter your username">
        </div>
        <div class="form-group col-md-6">            
            <input type="password" class="form-control form-bindput" id="inputPassword" name="inputPassword" placeholder="Enter your password">
        </div>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Login </button>
    
</form>

<?php 
    include "includes/footer.php";
?>

