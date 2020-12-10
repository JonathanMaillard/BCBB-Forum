<?php
    session_start();

    $arianne = '<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Mystery';
    $titre = "Home - Rolling Stones Forum";
    $css = 'style';
    
    include 'includes/connect.php' ;
    include 'includes/header.php';
    
?>

<?php 
    if ( 0 ) { ?>

    <?php    
    }else{ ?>
        <div class="text-center">
            <div class="">
                <img class="img-fluid" src="./images/mystery.png" alt="acces_denied">
            </div>
            <div class="text-center display-4">
                Get your access badge by participating and being active on the forum.    
            </div>
        </div>
    <?php }

?>

<?php include 'includes/footer.php';?>
