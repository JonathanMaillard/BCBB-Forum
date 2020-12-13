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
    
    <div class="main">
        <!-- Div2 à droite (contient chemin, titre, forum rules, trois boutons (reply, tools et search) + "1 post page 1/1" et totalité des commentaires) -->
        <div class="mainRight">   

            <div class="title">
            <H2>Topic Read</H2>
             
            <a href="#" class="btn btn-secondary1 btn-md" tabindex="-1" role="button" aria-disabled="true">Forum Rules</a>
            </div>
            
          
                <div class=buttonUp>
                    <a href="post_message.php?topic_id=<?php echo $topic_id;?>" type="button" class="btn btn-primary">Post Reply <i class="fas fa-reply"></i></a>
                 
            

                <div class=buttonUp>   
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn btn-secondary"><i class="fas fa-wrench"></i></button>
                    <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                </div>
                 
                <div class=buttonUp> 
                    <div class="btn-group" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary">Search this topic...</button>
                    <button type="button" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                    <button type="button" class="btn btn-secondary"><i class="fas fa-cog"></i></button>
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

        <div class="mainRightComment">
            <div class="comment">
                    <div class="commentInside">
                        <div class="detailUser">
                            <img id="avatar" src="images/shithot_119538.png" alt="">
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
                                                echo $total['numberPosts'];
                                    }
                                                $req_total->closeCursor();
                                            ?>
                                        </strong>
                                    </a>
                    
                            </label>
                            <label id="location">Location</label>  
                        </div>
                        <!-- Div 7 -->
                        <!-- Div 8 contient date, signe quote, contenu commentaire, signature, petit bouton ^-->
                        <div class="detailMessage">
                            <!-- Div 9 contient date, signe Quote, contenu commentaire -->
                            <label class= "date"><?php echo $data['post_date'] ?></label>
                            <div class="commentContent">
                            

                            <?php 

                            $emoji_replace = array(":)", ":-)", ":smile:", ":@", ":-@", ":angry:", "<3", ":love:", ":'", ":'(", ":cry:", ":D", ":-D", ":lol:", ";)", ";-)", ":wink:", "8)", "8-)", ":nerd:", ":(", ":-(", ":sad:" );

                            $emoji_new = array('<img src="emojis/emo_smile.png"/>', '<img src="emojis/emo_smile.png">', '<img src="emojis/emo_smile.png">', '<img src="emojis/emo_angry.png">', '<img src="emojis/emo_angry.png">',
                                                '<img src="emojis/emo_angry.png">', '<img src="emojis/emo_love.png">', '<img src="emojis/emo_love.png">', '<img src="emojis/emo_cry.png">',
                                                '<img src="emojis/emo_cry.png">', '<img src="emojis/emo_cry.png">', '<img src="emojis/emo_lol.png">', '<img src="emojis/emo_lol.png">', '<img src="emojis/emo_lol.png">',
                                                '<img src="emojis/emo_wink.png">', '<img src="emojis/emo_wink.png">', '<img src="emojis/emo_wink.png">','<img src="emojis/emo_nerd.png">', '<img src="emojis/emo_nerd.png">',
                                                '<img src="emojis/emo_nerd.png">', '<img src="emojis/emo_sad.png">', '<img src="emojis/emo_sad.png">', '<img src="emojis/emo_sad.png">' );
                            
                            $emojis = str_replace($emoji_replace, $emoji_new, $data['post_content']); 
                            
                            ?> 

                            <div id="textarea" cols= "70" rows="5"><?php echo $emojis ?>
                            </div>

                            </div>
                            <!-- Div 9 -->
                            <!-- Div 10 contient signature et petit bouton ^ -->
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
                            <!-- Div 10 -->
                        </div> 

                    </div>
                    
                </div>
            </div>
            <?php } ?>

            <div class="container d-flex emojis">

                <form method="post" action="#">

                    <button type="submit" class="like" id="<?=$post_id?>" value="like" name="like"><img src="emojis/emo_smile.png" alt="like"/> 0</button>
                    <button type="submit" class="dislike" id="<?=$post_id?>" value="dislike" name="dislike"><img src="emojis/emo_sad.png" alt="dislike"/> 0</button>
                    <button type="submit" class="love" id="<?=$post_id?>" value="love" name="love"><img src="emojis/emo_love.png" alt="love"/> 0</button>
                    <button type="submit" class="angry" id="<?=$post_id?>" value="angry" name="angry"><img src="emojis/emo_angry.png" alt="angry"/> 0</button>
                    <button type="submit" class="nerd" id="<?=$post_id?>" value="nerd" name="nerd"><img src="emojis/emo_nerd.png" alt="nerd"/> 0</button>

                </form>
            </div>
        
                <div class=buttonUp>
                    <a href="post_message.php?topic_id=<?php echo $topic_id;?>" type="button" class="btn btn-primary">Post Reply <i class="fas fa-reply"></i></a>
                     
                    <div class=buttonUp>   
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" class="btn btn-secondary"><i class="fas fa-wrench"></i></button>
                        <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    </div>
                     
                    <label id="postPage">1 Post Page 1/1</label>       
                </div>  

                <div class=buttonSerie1>
                        <label id="postPage">< Return to ""</label> 

                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="button" class="btn btn-secondary">< Jump</button>
                            <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        </div> 

                </div>  
        </div>
    </div>

<?php 

    // include "includes/footer.php";

?>