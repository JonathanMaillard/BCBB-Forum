<?php
    $search_done = false;

    if (isset($_GET['search']) AND !empty($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
        $req_topics_results = $db->query('SELECT * FROM topics WHERE topic_search = 0 AND topic_subject LIKE "%'.$search.'%"');
        $req_posts_results = $db->query('SELECT * FROM posts WHERE post_search = 0 AND post_content LIKE "%'.$search.'%"');
        
        $countTopicResults=$req_topics_results->rowCount();
        $countPostResults=$req_posts_results->rowCount();
        $countTotalResult= $countTopicResults + $countPostResults;

        $search_done = true;
    }
?>
