<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $titre; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <?php echo (!empty($css))?'<link rel="stylesheet" href="css/'.$css.'.css">':'';?>
</head>
<body>
    
    <header class="container-fluid">

        <div class="container head">

            <div class="container main-title d-flex align-items-center justify-content-center">
                <h1 class="text-center">ROLLING STONES FORUM</h1>
            <div> 
            

            <?php
                if(!isset($_SESSION['pseudo'])){
                    echo 
                        '<div class="registerLogin">
                            <p><a href="register.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Register</a> <a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></p>
                        </div>';
                }
                else{

                    $pseudo = $_SESSION['pseudo'];
                    $id = $_SESSION['id'];
                    
                    echo
                    '<div class="registerLogin">
                        <p>Welcome, <a href="profile.php?id='.$id.'">'.$pseudo.'</a><br><a href="disconnect.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></p>
                    </div>';
                }   
            ?>


        </div>

        
    </header>

    <section class="background container-fluid d-flex justify-content-center">
        
        <main class="container">
            <div class="row">
                 <div class="content col-md-9">
        
                    <div class="main__arianne">
                        <p class ="text-center text-md-left"><?php echo $arianne; ?></p>
                    </div>
            