<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> Profile</p>';
    $titre = "Profile - Rolling Stones Forum";
    $css = 'form';

    // $topicId = $_GET['topic_id'];
?>

<?php

include "includes/connect.php";
include "includes/header.php";

//get cat_id
$query=$db->prepare('SELECT topic_cat FROM topics WHERE topic_id = ' . $_GET['topic_id']);
$query->execute();
$topic_cat = $query->fetch(PDO::FETCH_ASSOC);

if(isset($_SESSION['id'])) {

    if ($topic_cat['topic_cat'] == 6) {

        $creationDate = date("Y-m-d H:i:s");
    
        $req = $db->prepare('INSERT INTO posts(post_content, post_date, post_topic, post_by, post_search)
        VALUES(:content, :post_date, :post_topic, :post_by, :post_search)');
    
        $req->execute(array("content"=>$_POST["message"],
        "post_date"=>$creationDate,
        "post_topic"=>$_GET['topic_id'],
        "post_by"=>$_SESSION['id'],
        "post_search" => 1));
    
    }else{
        $creationDate = date("Y-m-d H:i:s");
        
        $req = $db->prepare('INSERT INTO posts(post_content, post_date, post_topic, post_by, post_search)
        VALUES(:content, :post_date, :post_topic, :post_by, :post_search)');
    
        $req->execute(array("content"=>$_POST["message"],
        "post_date"=>$creationDate,
        "post_topic"=>$_GET['topic_id'],
        "post_by"=>$_SESSION['id'],
        "post_search" => 0));
    }
} 

include "includes/footer.php";


?>
