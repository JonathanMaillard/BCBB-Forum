<?php
    session_start();

    $arianne = '<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a> > Results';
    $titre = "Results - Rolling Stones Forum";
    $css = 'style';
    
    include 'includes/connect.php' ;
    include 'includes/header.php';
    include 'includes/req_search.php';
    
?>

<div class="row container-fluid">
    <div class="col">
        <h2>Search results for <em><?php echo $search;?></em> </h2>
    </div>
</div>

<div class="container-fluid bg-light rounded-lg m-2 pb-1">
    <div class="banner-aside row d-flex align-items-center">
        <div class="card-header__element col-6">
            <p class="h6 mb-1 ">Topics Results</p>
        </div>
        <div class="content-header__element col-2 text-center">
            <i class="fa fa-comments-o" aria-hidden="true"></i>
        </div>
        <div class="content-header__element col-2 text-center">
            <i class="fa fa-eye" aria-hidden="true"></i>
        </div>
        <div class="content-header__element col-2 text-center">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
        </div>
    </div>
    <?php include 'includes/topics_results.php';?>    
</div>

<div class="container-fluid bg-light rounded-lg m-2 pb-1">
    <div class="banner-aside row d-flex align-items-center">
        <div class="card-header__element col-6">
            <p class="h6 mb-1 ">Posts Results</p>
        </div>
        <div class="content-header__element col-2 text-center">
            <!-- <i class="fa fa-comments-o" aria-hidden="true"></i> -->
        </div>
        <div class="content-header__element col-2 text-center">
            <!-- <i class="fa fa-eye" aria-hidden="true"></i> -->
        </div>
        <div class="content-header__element col-2 text-center">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
        </div>
    </div>
    <?php include 'includes/posts_results.php';?>
</div>

<?php include 'includes/footer.php';?>



