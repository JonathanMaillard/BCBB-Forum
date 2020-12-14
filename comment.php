<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "includes/connect.php";
    require_once "includes/functions/functions.php";


    incrementTopicViews();

    // GET ID of the selected topic
    $topic_id = $_GET["topic_id"];



    // GET the topic name in the DB

    $query=$db->prepare('SELECT topic_subject FROM topics WHERE topic_id = ' . $topic_id);

    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    $topic_name = $result["topic_subject"];

    // Modify these variables according to your page
    $arianne = '<p><a href=index.php><i class="fa fa-home" aria-hidden="true"></i> Home</a> > ' . $topic_name . ' </p>';
    $titre = "Home - Rolling Stones Forum";
    $css = 'style_comment';

    

    include "includes/header.php";

?>  
    <!-- div qui contient partie gauche et droite -->
    <div class="main">
        
    <!-- div qui contient partie de gauche -->
        <div class="mainLeft">   
            
            <?php

            // GET the id of the user who created the topic

            $query=$db->prepare('SELECT topic_by FROM topics WHERE topic_id = ' . $topic_id);
            $query->execute();

            $info = $query->fetch(PDO::FETCH_ASSOC);
            $topicUser = $info["topic_by"];
            $query=$db->prepare('SELECT topic_by FROM topics WHERE topic_id = ' . $topic_id);
            $query->execute();

            $info = $query->fetch(PDO::FETCH_ASSOC);
            $topicUser = $info["topic_by"];

        ?>
            

            <div class="title">
            <H2>Topic Read</H2>

            <?php 
            
                $query=$db->prepare('SELECT topic_by FROM topics WHERE topic_id = ' . $topic_id);
                $query->execute();

                $info = $query->fetch(PDO::FETCH_ASSOC);
                $topicUser = $info["topic_by"];

                
            while ($info = $query->fetch()){
                if(isset($_SESSION['id']) AND $topicUser == $_SESSION['id']) {
                    ?> 
                        <form method="post" action="lock_topic.php?topic_id=<?php echo $topic_id?>">
                            <button>Lock topic</button>
                        </form>
                    <?php
                } ?>

            <div class="title">
            <H2>Topic Read</H2> 
            <?php 
            
            $query=$db->prepare('SELECT topic_by FROM topics WHERE topic_id = ' . $topic_id);
            $query->execute();

            $info = $query->fetch(PDO::FETCH_ASSOC);
            $topicUser = $info["topic_by"];

            if(isset($_SESSION['id']) AND $topicUser == $_SESSION['id']) {
                ?> 
                    <form method="post" action="lock_topic.php?topic_id=<?php echo $topic_id?>">
                        <button>Lock topic</button>
                    </form>
                <?php
            } ?>

         
        <a href="#" class="btn btn-secondary1 btn-md" tabindex="-1" role="button" aria-disabled="true">Forum Rules</a>
        </div>
            
                <?php
                $query=$db->prepare('SELECT topic_locked FROM topics WHERE topic_id = ' . $topic_id);
                $query->execute();

                $info = $query->fetch(PDO::FETCH_ASSOC);
                if($info["topic_locked"]){
                ?>
                <span class="text-muted">[Locked]</span>
                <div class=buttonUp>
                <button disabled>Post Reply <i class="fa fa-reply"></i></button>
                <?php
                    echo 'You can\'t reply to a topic locked';
                }
                else { ?>
                    <div class=buttonUp>
                    <a href="post_message.php?topic_id=<?php echo $topic_id;?>" type="button" class="btn btn-primary">Post Reply <i class="fas fa-reply"></i></a>
                <?php }
                ?>
                <!-- ICI -->

            <div class=buttonUp> 
                <a href="post_message.php?topic_id=<?php echo $topic_id;?>" type="button" class="btn btn-primary">Post Reply <i class="fa fa-reply" aria-hidden="true"></i>
                </a>
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-secondary"><i class="fa fa-wrench" aria-hidden="true"></i>
                </button>
                <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            </div>
                &nbsp
            <div class=buttonUp> 
                <div class="btn-group" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary">Search this topic...</button>
                    <button type="button" class="btn btn-secondary"><i class="fa fa-search" aria-hidden="true"></i>
                </button>
                </div>
                <label id="postPage">1 Post Page 1/1</label>
            </div>
        </div>
       
        <?php
        
        $query=$db->prepare('SELECT post_id, post_content, post_date, post_topic, post_by 
        FROM posts 
        WHERE post_topic = ' . $topic_id);

        $query->execute(); 

        while($data = $query->fetch()) { ?>

        <!--  Partie contenant les détails users + commentaire -->
        <div class="mainLeftComment">
            <div class="comment">
                <div class="commentInside">
                    <div class="detailUser">
                        
                        <?php $req_avatar = $db->query("SELECT user_id, user_avatar FROM users WHERE user_id =". $data['post_by']);
                            while($avatar = $req_avatar->fetch()){ ?>
                            <img id="avatar" src="<?php echo($avatar["user_avatar"]); ?>">
                        <?php } ?>
                            &nbsp
                            
                        <label id="userName">
                            
                            <?php $req_user = $db->query("SELECT user_id, user_name FROM users WHERE user_id =". $data['post_by']);
                                while($user = $req_user->fetch()) { ?>
                                <a href="#"> 
                                    <strong>
                                        <?php 
                                            echo $user['user_name'];
                                }
                                            $req_user->closeCursor();
                                        ?>
                                    </strong>
                                </a>
                        </label>
                        <label id="postNumber">
                            <?php $req_total = $db-> query('SELECT COUNT(post_id) AS numberPosts FROM posts WHERE post_by = '. $data['post_by']);
                                while($total = $req_total->fetch()) { ?>
                                    <a href="#"> 
                                        <strong>
                                            <?php 
                                                echo 'Posts : ' . $total['numberPosts'];
                                    }
                                                $req_total->closeCursor();
                                            ?>
                                        </strong>
                                    </a>
                        </label>
                        <label id="location">Location</label>  
                        </div>
                    
                        <div class="detailMessage">
                            <label class= "date"><?php echo $data['post_date'] ?></label>
                            
                            <div class="commentContent">
                            
                            <?php 

                            $emoji_replace = array(":)", ":-)", ":smile:", ">:(", ">:-(", ":angry:", "<3", ":love:", ":'", ":'(", ":cry:", ":D", ":-D", ":lol:", ";)", ";-)", ":wink:", "8)", "8-)", ":nerd:", ":(", ":-(", ":sad:" );

                            $emoji_new = array('<img src="emojis/emo_smile.png"/>', '<img src="emojis/emo_smile.png">', '<img src="emojis/emo_smile.png">', '<img src="emojis/emo_angry.png">', '<img src="emojis/emo_angry.png">',
                                                '<img src="emojis/emo_angry.png">', '<img src="emojis/emo_love.png">', '<img src="emojis/emo_love.png">', '<img src="emojis/emo_cry.png">',
                                                '<img src="emojis/emo_cry.png">', '<img src="emojis/emo_cry.png">', '<img src="emojis/emo_lol.png">', '<img src="emojis/emo_lol.png">', '<img src="emojis/emo_lol.png">',
                                                '<img src="emojis/emo_wink.png">', '<img src="emojis/emo_wink.png">', '<img src="emojis/emo_wink.png">','<img src="emojis/emo_nerd.png">', '<img src="emojis/emo_nerd.png">',
                                                '<img src="emojis/emo_nerd.png">', '<img src="emojis/emo_sad.png">', '<img src="emojis/emo_sad.png">', '<img src="emojis/emo_sad.png">' );
                            
                            $emojis = str_replace($emoji_replace, $emoji_new, $data['post_content']); 
                            
                            ?>

                            <div id="textarea" cols= "70" rows="10"><?php echo $emojis ?>
                        </div>

                            <label class= "signature">
                                <?php $req_user = $db->query("SELECT user_id, user_signature FROM users WHERE user_id =". $data['post_by']);
                                while($user = $req_user->fetch()) { ?>
                                <a href="#"> 
                                    <strong>
                                        <?php 
                                            echo $user['user_signature'];
                                }
                                            $req_user->closeCursor();
                                        ?>
                                    </strong>
                                </a>
                            </label>
                        </div> 
                    </div>
                </div>
            </div>
            <?php } ?>

            
        
                <?php
                    $query=$db->prepare('SELECT topic_locked FROM topics WHERE topic_id = ' . $topic_id);
                    $query->execute();

                    $info = $query->fetch(PDO::FETCH_ASSOC);
                    if($info["topic_locked"]){
                ?>
                    <div class=buttonUp>
                    <button disabled>Post Reply <i class="fas fa-reply"></i></button>
                <?php
                    echo 'You can\'t reply to a topic locked';
                    }
                    else { ?>
                        <div class=buttonUp>
                    <a href="post_message.php?topic_id=<?php echo $topic_id;?>" type="button" class="btn btn-primary">Post Reply <i class="fas fa-reply"></i></a>
                <?php }
                ?>
                     
                    <div class=buttonUp>   
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" class="btn btn-secondary"><i class="fa fa-wrench" aria-hidden="true"></i>
                        </button>
                        <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        </div>
                     
                    <label id="postPage2">1 Post Page 1/1</label>       
                </div>  
                <div class=buttonSerie1>
                        <label id="postPage3">< Return to ""</label> 

                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="button" class="btn btn-secondary">< Jump</button>
                            <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        </div>  
                </div>  
            </div>
 
    <div class="aside">
        <?php
        include "includes/footer.php";
        ?>
    </div>
</div>
