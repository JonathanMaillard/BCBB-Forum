<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Modify these varialbe according to your page
    $arianne = '<a href=#><i class="fa fa-home" aria-hidden="true"></i> Home</a>';
    $titre = "Home - Rolling Stones Forum";
    $css = "home";

    include "includes/connect.php";
    include "includes/header.php";
    require_once "includes/functions/functions.php";

?>

<h2>Categories</h2>

<div class="container categories d-flex justify-content-between flex-wrap">
    

<?php
    //Get categories infos
    $query=$db->prepare('SELECT cat_id, cat_name, cat_description 
    FROM categories');

    $query->execute();


    //Loop on each catgory
    while($data = $query->fetch())
    {
        // Echo of categories infos
        echo 
            '<div class="category">

                <div class="container">
                    <div class="row category__start">
                        <div class="col-3">';

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
                        }
                        // ??? INTERCALER ICI LE CODE POUR LA MYSTERY PAGE ???
                        echo '</div>
                        <div class="col-9">
                            <h4 class="category__title">';
                                if ($data['cat_id'] == 6) {
                                    echo '<a href="./mystery_page.php?id='.$data['cat_id'].'">'.stripslashes(htmlspecialchars($data['cat_name'])).'</a></h4>';
                                }else{
                                    echo '<a href="./topics.php?id='.$data['cat_id'].'">'.stripslashes(htmlspecialchars($data['cat_name'])).'</a></h4>';
                                }

                            echo '<p class="category__description">'.stripslashes(htmlspecialchars($data['cat_description'])).'</p>
                        </div>
                        </div>
                        <div class ="row category__end">
                        <div class="col-3 bordered">
                            <p class="category__numbers">';
                                if ($data['cat_id'] == 5) { //static result (for now)
                                    echo "5";
                                }else{
                                    $topics= getAllTopicsFromCategories($data['cat_id']);
                                    echo $topics->rowCount();
                                }
                                echo'</p>      
                            <p class="category__text">Topics</p>
                        </div>
                        <div class="col-3">
                            <p class="category__numbers">';
                                if ($data['cat_id'] == 5) {  // static result (for now)
                                    echo "17";
                                }else{
                                    $posts = getAllPostsFromCategories($data['cat_id']);
                                    echo $posts->rowCount();    
                                }
                            echo '</p>
                            <p class="category__text">Posts</p>
                        </div>
                        <div class="col-6">
                            <p class="category__date">';
                                if ($data['cat_id'] == 5) { // static result (for now)
                                    echo "Wed Dec 09";
                                }else{
                                    $req_posts = getLastPostsDate($data['cat_id']);
                                    $post = $req_posts->fetch();
                                    $date = new DateTime($post['post_date']);
                                    echo $date->format('D M d');    
                                }
                            echo '</p>
                            <p class="category__text">Last  post</p>
                        </div>
                    </div>
                </div>
            </div>';
        //;

        /*
        echo'<tr><td><img src="./images/message.gif" alt="message" /></td>
        <td class="titre">
        <a href="./topic.php?f='.$data['cat_id'].'">
        '.stripslashes(htmlspecialchars($data['cat_name'])).'</a>
        <br />'.nl2br(stripslashes(htmlspecialchars($data['cat_description']))).'</td>
        <td class="nombresujets">'.$data['forum_topic'].'</td>
        <td class="nombremessages">'.$data['forum_post'].'</td>';
        */

    } //loop end
    
    $query->CloseCursor();
?>
    
</div>

<?php
    include "includes/footer.php";
?>