<?php

function getAllPostsFromBoard($cat_id) {
    require('includes/connect.php');
    $query = $db->prepare('SELECT post_id FROM posts WHERE post_topic IN (SELECT topic_id FROM topics WHERE topic_cat = :topics)');
    $query->execute(array(':topics' => $cat_id));
    return $query;
}

?>