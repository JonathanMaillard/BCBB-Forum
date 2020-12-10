<?php
function getCategories($id){
    require('includes/connect.php');
    $query=$db->prepare('SELECT * FROM categories WHERE cat_id = ?');
    $query->execute([$id]);
    return $query;
}

function getAllTopicsFromCategories($para){
    require('includes/connect.php');
    $query=$db->prepare('SELECT topic_id FROM topics WHERE topic_cat IN (SELECT cat_id FROM categories WHERE cat_id = :posts)');
    $query->execute(array('posts'=> $para));
    return $query;
}

function getAllPostsFromCategories($para) {
    require('includes/connect.php');
    $query = $db->prepare('SELECT post_id FROM posts WHERE post_topic IN (SELECT topic_id FROM topics WHERE topic_cat = :topics)');
    $query->execute(array('topics' => $para));
    return $query;
}


function getLastPostsDate($para) {
    require('includes/connect.php');
    $query = $db->prepare('SELECT
            topics.topic_id,
            posts.post_date
        FROM
            posts
        LEFT JOIN
            topics
        ON
            posts.post_topic = topics.topic_id
        WHERE
            post_topic
        IN
            (SELECT topic_id FROM topics WHERE topic_cat = :topics)
        ORDER BY
            posts.post_date DESC
        LIMIT 1'
    );
    $query->execute(array('topics' => $para));
    return $query;
}


function getAllPostsFromUser($para){
    require('includes/connect.php');
    $query=$db->prepare('SELECT post_id FROM posts WHERE post_by IN (SELECT user_id FROM users WHERE user_id = :posts)');
    $query->execute(array('posts'=> $para));
    return $query;
}


function incrementTopicViews() {
    require('includes/connect.php');
    $query = $db->prepare("UPDATE topics SET topic_views = topic_views + 1 WHERE topic_id = :topicId");
    $query->execute(array(
        'topicId' => $_GET['topic_id']
    ));
    return $query;
}


?>