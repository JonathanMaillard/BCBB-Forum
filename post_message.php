<?php session_start();?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php

    $arianne = '<a href=#><i class="fa fa-home" aria-hidden="true"></i> Home</a>';
    $titre = "Home - Rolling Stones Forum";
    $css = 'style';


    include "includes/connect.php";
    include "includes/header.php";
    if(isset($_SESSION['id'])) {
    if (isset($_POST['message_submit'],$_POST['message'])){
        if (!empty($_POST['message'])){

            // $response = htmlspecialchars($_POST['message']);

            $creationDate = date("Y-m-d H:i:s");
                
            $values = array(':topic_subject'=>$_POST['topic_subject'], ':post_date'=>$creationDate, ':post_by'=>$_SESSION['id'], ":topic_subject"=>$_GET['topic_id']);
            $req = $db->prepare('INSERT INTO posts(message, post_date, post_by, topic_subject) VALUES(:message, :post_date, :post_by, :topic_subject)');
            $req->execute($values);
            
            $postId = $db->ins();
            $values2 = array(':content'=>$_POST['message'], ':post_date'=>$creationDate, ':post_topic'=>$topicId, ':post_by'=>$_SESSION['id']);
            $req = $db->prepare('INSERT INTO posts (post_content, post_date, post_topic, post_by) VALUES(:content, :post_date, :post_topic, :post_by)');
            $req->execute($values2);
            
        }
        else{
            $message_answer = "You can't send an empty message, please try again";
        }
    }
}

?>
<head>
    <meta charset="utf-8">
    <title>Comment</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/style_comment.css">
</head>
<body>

    <div class="main">
        <div class="mainRight">  
            <div class="title">
                <H2>Post a message</H2>
                &nbsp
                <a href="#" class="btn btn-secondary1 btn-md" tabindex="-1" role="button" aria-disabled="true">Forum Rules</a>
                <div class="form-group">
                    <input id="topic_subject" type="text" class="form-control" id="formGroupExampleInput" placeholder="-> Reprend le titre du topic auquel on répond?">
                </div>
                <!-- <h2> <?php $topic['topic_subject'] ?> </h2> -->
                <form action="" method="POST">
                    <textarea id="commentContentWrite" name="message" cols="88" rows="10" placeholder=" Your message"></textarea>
                    <?php if (isset($message_answer)) {
                    echo $message_answer;
                    } ?>
                    <div class=buttonSerie2>
                    <div class=buttonUp>
                        <button type="submit" name="message_submit" class="btn btn-primary" id="publish"> Publish <i class="fas fa-reply"></i></button>
                </form>
            </div>
        </div>
    </div>            
</body>