<?php
    session_start();

    $arianne = '<a href=#><i class="fa fa-home" aria-hidden="true"></i> Home</a>';
    $titre = "Home - Rolling Stones Forum";
    $css = 'style';
    
    include 'includes/connect.php' ;
    include 'includes/header.php';
    
?>

<div>
    <div class="text-center">
        <img class="img-fluid" src="images/acces_denied.png" alt="acces_denied">
    </div>
    <div class="text-center display-4">
        Get your access badge by participating and being active on the forum    
    </div>

</div>




<?php include 'includes/footer.php';?>
