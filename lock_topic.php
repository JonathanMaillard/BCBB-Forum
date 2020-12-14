<?php 
    session_start();

    include "includes/connect.php";

    $topic_id = $_GET['topic_id'];

    $query=$db->prepare('UPDATE topics 
    SET topic_locked = "1"
    WHERE topic_id ='. $_GET["topic_id"]);
    $query->execute();

    header("Location: comment.php?topic_id=$topic_id");

?>