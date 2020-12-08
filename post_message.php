<?php
session_start();

    $arianne = '<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>';
    $titre = "Home - Rolling Stones Forum";
    $css = 'style';


    include "includes/connect.php";
    include "includes/header.php";

    if (isset($_POST['message_submit'],$_POST['message'])){
        if (!empty($_POST['message'])){

        }
        else{
            $message_answer = "You can't send an empty message, please try again";
        }
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8mb4">
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
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="-> Reprend le titre du topic auquel on répond?">
                </div>
                <h2> <?php $topic['subject'] ?> </h2>
                <form method="POST">
                    <textarea id="commentContentWrite" name="message" cols="88" rows="10" placeholder=" Your message"></textarea>
                    <?php if (isset($message_answer)) {
                    echo $message_answer;
                    } ?>
                    <div class=buttonSerie2>
                        <div class=buttonUp>
                            <button type="submit" name="message_submit" class="btn btn-primary" id="publish"> Publish <i class="fas fa-reply"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 

<?php include "includes/footer.php" ?> 
</body>



