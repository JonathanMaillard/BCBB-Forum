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
    <a href="create_topic.php?cat_id=<?php echo $category_id;?>" class="new">New Topic  <i class="fa fa-pencil" aria-hidden="true"></i></a>
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
        <?php
        
        $query=$db->prepare('SELECT topic_id, topic_subject, topic_date, topic_cat, topic_by 
        FROM topics t
        WHERE topic_cat = ' . $category_id);

        $query->execute(); 

        while($data = $query->fetch()) { ?>
            
                <div id="banner__list" class="box__content">
                    <div class="content border-0 m-1">
                        <div class="banner__list-item box__content w-100 flex align-items-center">
                            <div class="col-8">            
                            <a href="comment.php?topic_id=<?php echo $data['topic_id'];?>">
                                <?php echo $data['topic_subject'];?>
                            </a>  
                            </div>
                            <div class="banner__details col-1">
                                <a>47</a>
                            </div>
                            <div class="banner__details col-1">
                                965
                            </div>
                            <div class="banner__details col-2">
                                <div class="flex">
                                    <div class="font-weight-light">by </div>
                                    <?php $req_user = $db->query("SELECT user_id, user_name FROM users WHERE user_id =" .  $data['topic_by']); 
                                    while($user = $req_user->fetch()) { ?>
                                    <a href="#" >
                                    <strong> 
                                    <?php
                                        echo $user['user_name'];
                                        }
                                        $req_user->closeCursor();
                                    ?>
                                    </strong></a>
                                <div class="font-weight-light">
                                    <?php echo $data['topic_date'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        
        if ($category_id == 5) { 
            
            $query=$db->prepare('SELECT topic_id, topic_subject, topic_date, topic_cat, topic_by 
            FROM topics 
            ORDER BY topic_date DESC
            LIMIT 5');

            $query->execute(); 

            while($data = $query->fetch()) { ?>
        

            <div id="banner__list" class="box__content">
                    <div class="content border-0 m-1">
                        <div class="banner__list-item box__content w-100 flex align-items-center">
                            <div class="col-8">
                            <a href="comment.php?topic_id=<?php echo $data['topic_id'];?>">
                                <?php echo $data['topic_subject'];?>
                            </a>  
                            </div>
                            <div class="banner__details col-1">
                                <a>47</a>
                            </div>
                            <div class="banner__details col-1">
                                965
                            </div>
                            <div class="banner__details col-2">
                                <div class="flex">
                                    <div class="font-weight-light">by </div>
                                    <?php $req_user = $db->query("SELECT user_id, user_name FROM users WHERE user_id =" .  $data['topic_by']); 
                                    while($user = $req_user->fetch()) { ?>
                                    <a href="#" >
                                    <strong> 
                                    <?php
                                        echo $user['user_name'];
                                        }
                                        $req_user->closeCursor();
                                    ?>
                                    </strong></a>
                                <div class="font-weight-light">
                                    <?php echo $data['topic_date'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } 
        } ?>
        
    </div>
    <a href="create_topic.php?cat_id=<?php echo $category_id;?>" class="new">New Topic  <i class="fa fa-pencil" aria-hidden="true"></i></a>
    <br>
<?php
    include "includes/footer.php";
?>