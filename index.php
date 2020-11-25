<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Modify these varialbe according to your page
    $arianne = '<a href=#><i class="fa fa-home" aria-hidden="true"></i> Home</a>';
    $titre = "Home - Rolling Stones Forum";
    $css;


    include "includes/connect.php";
    include "includes/header.php";

?>

<h2>Categories</h2>


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
        '<a href="./topics.php?id='.$data['cat_id'].'">
        <div class="categories">

        <h4>'.stripslashes(htmlspecialchars($data['cat_name'])).'</h4>

        </div>
        </a>';

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

    include "includes/footer.php";
?>