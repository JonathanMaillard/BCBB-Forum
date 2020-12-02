<?php
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "includes/connect.php";

    //Get ID of the selected categories ont the board
    $category_id = $_GET["id"];

    //Get the category name in the DB
    $query=$db->prepare('SELECT cat_name 
    FROM categories
    WHERE cat_id ='.$category_id);

    $query->execute();
    
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $cat_name = $result["cat_name"];

    //Modify these varialbe according to your page
    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > ' . $cat_name . ' </p>';
    $titre = $cat_name . " - Rolling Stones Forum";
    $css = "topics";


    
    include "includes/header.php";

?>

    <p class="title"><?php echo $cat_name;?> Icon Demos</p>

    <p class="rules">Forum rules</p>

    <div class="search">
    <button type="submit" class="new">New Topic  <i class="fa fa-pencil" aria-hidden="true"></i></button>
        <div class="main-search topic-search">
            <input type="text" class="searchTerm" placeholder="Search this forum...">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
                </button>
                <button type="submit" class="searchOption">
                    <i class="fa fa-cog"></i>
            </button>
        </div>
    </div>
    <div class="container-fluid bg-light rounded-lg m-2">
        <div class="banner flex row align-items-center">
            <div class="content-header__element col-8" style="border: solid red 3">
                <p class="banner__title">
                    Announcements
                </p>
            </div>
            <div class="content-header__element col-1">
            <i class="fa fa-comments-o" aria-hidden="true"></i>
            </div>
            <div class="content-header__element col-1">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </div>
            <div class="content-header__element col-2">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
            </div>
        </div>
        <div id="banner__list" class="box__content">
            <div class="content border-0 m-1">
                <div class="banner__list-item box__content w-100 flex align-items-center">
                    <div class="col-8">
                        Welcome to The Rolling Stones Forum ! Oww Yeahhh!
                    </div>
                    <div class="banner__details col-1">
                        18
                    </div>
                    <div class="banner__details col-1">
                        357
                    </div>
                    <div class="banner__details col-2">
                        <div class="flex">
                            <div class="font-weight-light">
                                by 
                            </div>
                                <strong>Camélia</strong>
                        </div>
                        <div class="font-weight-light">
                            Sun Nov 30, 18:45
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light rounded-lg m-2">
        <div class="banner flex row align-items-center">
            <div class="content-header__element col-8">
                <p class="banner__title">
                    Topics
                </p>
            </div>
            <div class="content-header__element col-1">
            <i class="fa fa-comments-o" aria-hidden="true"></i>
            </div>
            <div class="content-header__element col-1">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </div>
            <div class="content-header__element col-2">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
            </div>
        </div>
        <div id="banner__list" class="box__content">
            <div class="content border-0 m-1">
                <div class="banner__list-item box__content w-100 flex align-items-center">
                    <div class="col-8">
                        Why is it called "Oww yeahhh!" ? 
                    </div>
                    <div class="banner__details col-1">
                        47
                    </div>
                    <div class="banner__details col-1">
                        965
                    </div>
                    <div class="banner__details col-2">
                        <div class="flex">
                            <div class="font-weight-light">
                                by 
                            </div>
                                <strong>Jonathan</strong>
                        </div>
                        <div class="font-weight-light">
                            Mon Mar 17, 14:18
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="banner__list" class="box__content">
            <div class="content border-0 m-1">
                <div class="banner__list-item box__content w-100 flex align-items-center">
                    <div class="col-8">
                        Satisfaction
                    </div>
                    <div class="banner__details col-1">
                        95
                    </div>
                    <div class="banner__details col-1">
                        483
                    </div>
                    <div class="banner__details col-2">
                        <div class="flex">
                            <div class="font-weight-light">
                                by 
                            </div>
                                <strong>Ingrid</strong>t
                        </div>
                        <div class="font-weight-light">
                            Mon Mar 17, 14:18
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="banner__list" class="box__content">
            <div class="content border-0 m-1">
                <div class="banner__list-item box__content w-100 flex align-items-center">
                    <div class="col-8">
                        You can't always get what you want
                    </div>
                    <div class="banner__details col-1">
                        648
                    </div>
                    <div class="banner__details col-1">
                        1293
                    </div>
                    <div class="banner__details col-2">
                        <div class="flex">
                            <div class="font-weight-light">
                                by 
                            </div>
                                <strong>Gaëtan</strong>
                        </div>
                        <div class="font-weight-light">
                            Mon Mar 17, 14:18
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="create_topic.php?cat_id=<?php echo $category_id;?>" class="new">New Topic  <i class="fa fa-pencil" aria-hidden="true"></i></a>
    <br>
<?php
    include "includes/footer.php";
?>