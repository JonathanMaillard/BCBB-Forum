<?php 
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $arianne = '<p><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a> > Profile</p>';
    $titre = "Profile - Rolling Stones Forum";
    $css = 'form';
?>

<?php

include "includes/connect.php";
include "includes/header.php";


 

    if(isset($_SESSION['id']) & $_GET['cat_id'] == 6) {
        $creationDate = date("Y-m-d H:i:s");
        
        $values = array(":subject"=>$_POST["subject"], ":topic_date"=>$creationDate, ":topic_by"=>$_SESSION['id'], ":topic_cat"=>$_GET['cat_id'], ":topic_search"=> 1);
        $req = $db->prepare('INSERT INTO topics (topic_subject, topic_date, topic_by, topic_cat, topic_search) VALUES(:subject, :topic_date, :topic_by, :topic_cat, :topic_search)');
        $req->execute($values);
    
        $topicId = $db->lastInsertId();
        $values2 = array(":content"=>$_POST["message"], ":post_date"=>$creationDate, ":post_topic"=>$topicId, ":post_by"=>$_SESSION['id']);
        $req = $db->prepare('INSERT INTO posts (post_content, post_date, post_topic, post_by) VALUES(:content, :post_date, :post_topic, :post_by)');
        $req->execute($values2);
    
    }else{
        if(isset($_SESSION['id'])) {

            $creationDate = date("Y-m-d H:i:s");
            
            $values = array(":subject"=>$_POST["subject"], ":topic_date"=>$creationDate, ":topic_by"=>$_SESSION['id'], ":topic_cat"=>$_GET['cat_id']);
            $req = $db->prepare('INSERT INTO topics (topic_subject, topic_date, topic_by, topic_cat) VALUES(:subject, :topic_date, :topic_by, :topic_cat)');
            $req->execute($values);
        
            $topicId = $db->lastInsertId();
            $values2 = array(":content"=>$_POST["message"], ":post_date"=>$creationDate, ":post_topic"=>$topicId, ":post_by"=>$_SESSION['id']);
            $req = $db->prepare('INSERT INTO posts (post_content, post_date, post_topic, post_by) VALUES(:content, :post_date, :post_topic, :post_by)');
            $req->execute($values2);
        }
    }

echo "Your topic is created!";

// $topicCreated = $db->lastInsertId();

?>

<br>

<a href="comment.php?topic_id=<?php echo $topicId;?>" class="btn btn-primary">View topic </a>

<?php

    include "includes/footer.php";

?>