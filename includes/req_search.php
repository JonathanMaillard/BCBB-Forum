<?php
    $search_done = false;

    if (isset($_GET['search']) AND !empty($_GET['search'])) {
        $search = htmlspecialchars($_GET['search']);
        $req_topics_results = $db->query('SELECT * FROM topics WHERE topic_subject LIKE "%'.$search.'%"');
        $req_posts_results = $db->query('SELECT * FROM posts WHERE post_content LIKE "%'.$search.'%"');
        $search_done = true;
    }
?>
