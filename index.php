<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Modify these varialbe according to your page
    $arianne = '<a href=#><i class="fa fa-home" aria-hidden="true"></i> Home</a>';
    $titre = "Home - Rolling Stones Forum";
    $css = "home";

/* 
    if($_SERVER["REQUEST_URI"] = "/BCBB-Forum/index.php?mdp=WeAreTheChampions") {      // CODE MYSTERY
        header("location:./topics.php?id=6");
    }
*/

    include "includes/connect.php";
    include "includes/header.php";

?>

<h2>Categories</h2>

<div class="container categories d-flex justify-content-between flex-wrap">
    

<?php
    //Get categories infos
    $query=$db->prepare('SELECT cat_id, cat_name, cat_description FROM categories');

    $query->execute();

    //Loop on each catgory
    while($data = $query->fetch())
    { ?>
        <!-- // Echo of categories infos
        echo  -->
            <div class="category">

                <div class="container">
                    <div class="row category__start">
                        <div class="col-3">
                        <?php
                        if($data['cat_id'] == 1){   
                            echo "<img class='category__img' src='./images/guitar.png'>";
                        }
                        else if($data['cat_id'] == 2){
                            echo "<img class='category__img' src='./images/dev.png'>";
                        }
                        else if($data['cat_id'] == 3){
                            echo "<img class='category__img' src='./images/smalltalk.png'>";
                        }
                        else if($data['cat_id'] == 4){
                            echo "<img class='category__img' src='./images/events.png'>";
                        }
                        else if($data['cat_id'] == 5){
                            echo "<img class='category__img' src='./images/dice.png'>";
                        }
                        else if($data['cat_id'] == 6){
                            echo "<img class='category__img' src='./images/mystery.png'>";
                        }
                        else{
                            echo "";
                        }?>
                        <!-- // ??? INTERCALER ICI LE CODE POUR LA MYSTERY PAGE ??? -->
                        </div>
                        <div class="col-9">
                            <h4 class="category__title"><a href="./topics.php?id=<?php $data['cat_id'];?>"><?php echo stripslashes(htmlspecialchars($data['cat_name']));?></a></h4>
                            <p class="category__description"> <?php echo stripslashes(htmlspecialchars($data['cat_description']));?></p>
                        </div>
                    </div>
                    <div class ="row category__end">
                        <div class="col-3 bordered">
                            <p class="category__numbers">  
                                <?php
                                $numOfTopics = $db->query('SELECT COUNT(*) AS topic_cat FROM topics WHERE topic_cat =' . $data['cat_id']);
                                while($topics = $numOfTopics->fetch()){
                                echo $topics['topic_cat'];            
                                }
                                $numOfTopics->CloseCursor();
                                ?>
                            </p>
                            <p class="category__text">Topics</p>
                        </div>
                        <div class="col-3">
                            <p class="category__numbers">
                                <?php
                                $postInCat = $db->query('SELECT COUNT(*) AS topic_cat FROM topics WHERE topic_cat =' . $data['cat_id']);
                                while($posts = $postInCat->fetch()){
                                echo $posts['topic_cat'];            
                                }
                                $postInCat->CloseCursor();
                                ?>                           
                            </p>
                            <p class="category__text">Posts</p>
                        </div>
                        <div class="col-6">
                            <p class="category__date">Fri Nov 27</p>
                            <p class="category__text">Last post</p>
                        </div>
                    </div>
                </div>
            </div>
        

        
        <!-- <tr><td><img src="./images/message.gif" alt="message" /></td>
        <td class="titre">
        <a href="./topic.php?f=<? $data['cat_id'] ?>">
        <? stripslashes(htmlspecialchars($data['cat_name']))?></a>
        <br /> <?nl2br(stripslashes(htmlspecialchars($data['cat_description'])))?></td>
        <td class="nombresujets"><? $data['forum_topic']?></td>
        <td class="nombremessages"><?$data['forum_post']?></td> -->
        
    <?} 
    
    $query->CloseCursor();
?>
    
</div>

<?php
    include "includes/footer.php";
?>