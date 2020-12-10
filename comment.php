<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
    session_start();

    $arianne = '<a href=#><i class="fa fa-home" aria-hidden="true"></i> Home</a>';
    $titre = "Home - Rolling Stones Forum";
    $css = 'style';


    include "includes/connect.php";
    include "includes/header.php";

    // echo $_POST["message"];
        // if (isset ($_POST["message"])) {
        //     echo $_POST["message"];
        // }

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
        <!-- Div2 à droite (contient chemin, titre, forum rules, trois boutons (reply, tools et search) + "1 post page 1/1" et totalité des commentaires) -->
        <div class="mainRight">   

            <div class="title">
            <H2>Topic Read</H2>
            &nbsp
            <a href="#" class="btn btn-secondary1 btn-md" tabindex="-1" role="button" aria-disabled="true">Forum Rules</a>
            </div>
            
          
                <div class=buttonUp>
                    <button type="button" class="btn btn-primary">Post Reply <i class="fas fa-reply"></i></button>
                &nbsp
            

                <div class=buttonUp>   
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn btn-secondary"><i class="fas fa-wrench"></i></button>
                    <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                </div>
                &nbsp
                <div class=buttonUp> 
                    <div class="btn-group" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary">Search this topic...</button>
                    <button type="button" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                    <button type="button" class="btn btn-secondary"><i class="fas fa-cog"></i></button>
                </div>
                <label id="postPage">1 Post Page 1/1</label>
            </div>
        </div>
       

        <div class="mainRightComment">
            <div class="comment">
                    <div class="commentInside">
                        <div class="detailUser">
                            <img id="avatar" src="images/shithot_119538.png" alt="">
                            <label id="userName">Name</label>
                            <label id="postNumber">Total Posts</label>
                            <label id="location">Location</label>  
                        </div>
                        <div class="detailMessage">
                            <label class= "date">Ici vient la date</label>
                            <div class="commentContent">
                            <textarea id="textarea" cols= "70" rows="5"></textarea>
                            </div>
                            <label class= "signature">Ici vient la signature</label>
                        </div> 
                    </div>
                    <div class="commentInside">
                        <div class="detailUser">
                            <img id="avatar" src="images/shithot_119538.png" alt="">
                            <label id="userName">Name</label>
                            <label id="postNumber">Total Posts</label>
                            <label id="location">Location</label>  
                        </div>
                        <div class="detailMessage">
                            <label class= "date">Ici vient la date</label>
                            <div class="commentContent">
                            <textarea id="textarea" cols= "70" rows="5">Ici vient le message</textarea>
                            </div>
                            <label class= "signature">Ici vient la signature</label>
                        </div> 
                    </div>
                    
                </div>
            </div>
        
                <div class=buttonUp>
                    <button type="button" class="btn btn-primary">Post Reply <i class="fas fa-reply"></i></button>
                    &nbsp
                    <div class=buttonUp>   
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" class="btn btn-secondary"><i class="fas fa-wrench"></i></button>
                        <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    </div>
                    &nbsp
                    <label id="postPage">1 Post Page 1/1</label>       
                </div>  
                <div class=buttonSerie1>
                        <label id="postPage">< Return to ""</label> 

                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="button" class="btn btn-secondary">< Jump</button>
                            <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        </div>  
                </div>  
        </div>
    </div>


</body>



