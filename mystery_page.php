<?php
    session_start();

    $arianne = '<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Mystery';
    $titre = "Home - Rolling Stones Forum";
    $css = 'style';
    
    include 'includes/connect.php' ;
    include 'includes/header.php';
    require_once "includes/functions/functions.php";


    $cat = getCategories($_GET['id'])->fetch();
    
?>

<?php 
    if ($_SERVER['REQUEST_URI'] == "/BCBB-Forum/mystery_page.php?id=6rollingpsw") {
        header("Location: topics.php?id=". $cat['cat_id']);    
    }else{ ?>
        <div class="container text-center">
                <img class="img-fluid my-5" src="./images/mystery.png" alt="acces_denied">
            <div class="text-center display-4">
                Get your password by participating and being active on the forum.    
            </div>
        </div>
    <?php }

?>

<?php include 'includes/footer.php';?>
