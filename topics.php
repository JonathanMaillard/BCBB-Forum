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
    <div class="container-fluid m-2 p-0">
        <p class="title"><?php echo $cat_name;?> Icon Demos</p>
        <p class="rules">Forum rules</p>
        <?php
            if(isset($_SESSION['id'])) { ?>
                <a href="create_topic.php?cat_id=<?php echo $category_id;?>" class="new text-decoration-none">New Topic  <i class="fa fa-pencil" aria-hidden="true"></i></a>
           <?php } 
           else { ?>
            <a href="not_connected.php" class="new">New Topic  <i class="fa fa-pencil" aria-hidden="true"></i></a>
           <?php }
        ?>
           
    </div>


    <div class="container-fluid bg-light rounded-lg m-2">
        <div class="banner-aside row d-flex align-items-center">
            <div class="card-header__element col-6">
                <p class="h6 mb-1 ">Annoncements</p>
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
        <div class="card border-0 my-3">
            <div class="card-body">
                <div class=" d-flex align-items-center row">
                    <div class="col-6 text-secondary">
                        Welcome to The Rolling Stones Forum ! Oww Yeahhh!
                    </div>
                    <div class="col-2 text-center text-secondary">47</div>
                    <div class="col-2 text-center text-secondary">189</div> 
                    <div class="col-2">
                        <div class="row">                       
                            <div class="font-italic pr-1">by</div>
                            <strong class="text-info"> 
                                Camélia
                            </strong>                    
                        </div>
                        <div class="row text-secondary">
                            <small>
                                Sun Nov 30, 18:45
                            </small>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>


    
    <div class="container-fluid bg-light rounded-lg m-2">
        <div class="banner-aside row d-flex align-items-center">
            <div class="card-header__element col-6">
                <p class="h6 mb-1 ">Topics</p>
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
        <?php
        
        $query=$db->prepare('SELECT topic_id, topic_subject, topic_date, topic_cat, topic_by, topic_views
        FROM topics t
        WHERE topic_cat = ' . $category_id);

        $query->execute(); 

        while($data = $query->fetch()) { ?>
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class=" d-flex align-items-center row">
                        <div class="col-6">
                            <a class=" text-decoration-none text-secondary" href="comment.php?topic_id=<?php echo $data['topic_id'];?>">
                                <?= $data['topic_subject'];?>
                            </a>
                        </div>
                        <div class="col-2 text-center text-secondary">
                            <?php
                                $req_posts_num = $db->prepare("SELECT post_id FROM posts WHERE post_topic = :topic_id");                                                        
                                $req_posts_num->execute(array('topic_id' => $data['topic_id']));
                                $posts_cnt = $req_posts_num->rowCount();
                                echo $posts_cnt;
                                $req_posts_num->closeCursor();
                            ?>
                        </div>
                        <div class="col-2 text-center text-secondary">
                            <?php 
                                echo $data['topic_views'];
                            ?>
                        </div> 
                        <div class="col-2">
                            <div class="row">                       
                                <div class="font-italic pr-1">by</div>
                                <?php $req_user = $db->query("SELECT user_id, user_name FROM users WHERE user_id =" .  $data['topic_by']); 
                                while($user = $req_user->fetch()) { ?>
                                <strong class="text-info"> 
                                    <?php
                                        echo $user['user_name'];
                                        }
                                        $req_user->closeCursor();
                                    ?>
                                </strong>                    
                            </div>
                            <div class="row text-secondary">
                                <small>
                                    <?php
                                        $topicDate = new DateTime($data['topic_date']);
                                        echo $topicDate->format('D M d, H:i');
                                    ?>
                                </small>
                            </div>
                        </div> 
                    </div>
                    
                </div>
            </div>
        <?php }
        
        if ($category_id == 5) { 
            
            $query=$db->prepare('SELECT topic_id, topic_subject, topic_date, topic_cat, topic_by, topic_views
            FROM topics WHERE topic_cat != 6
            ORDER BY topic_date DESC
            LIMIT 5');

            $query->execute(); 

            while($data = $query->fetch()) { ?>
            <div class="card border-0 my-3">
                <div class="card-body">
                    <div class=" d-flex align-items-center row">
                        <div class="col-6">
                            <a class=" text-decoration-none text-secondary" href="comment.php?topic_id=<?php echo $data['topic_id'];?>">
                                <?= $data['topic_subject'];?>
                            </a>
                        </div>
                        <div class="col-2 text-center text-secondary">
                            <?php
                                $req_posts_num = $db->prepare("SELECT post_id FROM posts WHERE post_topic = :topic_id");                                                        
                                $req_posts_num->execute(array('topic_id' => $data['topic_id']));
                                $posts_cnt = $req_posts_num->rowCount();
                                echo $posts_cnt;
                                $req_posts_num->closeCursor();
                            ?>
                        </div>
                        <div class="col-2 text-center text-secondary">
                            <?php 
                                echo $data['topic_views'];
                            ?>
                        </div> 
                        <div class="col-2">
                            <div class="row">                       
                                <div class="font-italic pr-1">by</div>
                                <?php $req_user = $db->query("SELECT user_id, user_name FROM users WHERE user_id =" .  $data['topic_by']); 
                                while($user = $req_user->fetch()) { ?>
                                <strong class="text-info"> 
                                    <?php
                                        echo $user['user_name'];
                                        }
                                        $req_user->closeCursor();
                                    ?>
                                </strong>                    
                            </div>
                            <div class="row text-secondary">
                                <small>
                                    <?php
                                        $topicDate = new DateTime($data['topic_date']);
                                        echo $topicDate->format('D M d, H:i');
                                    ?>
                                </small>
                            </div>
                        </div> 
                    </div>
                    
                </div>
            </div>

        <?php } 
        } ?>
        
    </div>

    <div class=" d-inline m-2 p-0">  
        <a href="create_topic.php?cat_id=<?php echo $category_id;?>" class="new text-decoration-none">New Topic <i class="fa fa-pencil" aria-hidden="true"></i></a>
    </div>
    
<?php
    include "includes/footer.php";
?>