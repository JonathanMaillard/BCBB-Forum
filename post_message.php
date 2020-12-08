<?php
    session_start();

    $arianne = '<a href=#><i class="fa fa-home" aria-hidden="true"></i> Home</a>';
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

    <div class="main">
        <div class="mainRight">  
            <div class="title">
                <H2>Post a message</H2>
                &nbsp
                <a href="#" class="btn btn-secondary1 btn-md" tabindex="-1" role="button" aria-disabled="true">Forum Rules</a>
                <div class="form-group">
                    <input type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <form method="POST" action="post_message_script.php?topic_id=<?php echo $_GET['topic_id'];?>">
                    <textarea id="message" name="message" cols="88" rows="10" placeholder=" Your message"></textarea>
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
    
    <div class="emoji-box">
        <button type="button" id="emojis" class="btn btn-primary" name="emojis">emojis</button>
    </div>

    <script src="emojis/js/DisMojiPicker.js"></script>

    <script>
        var img = document.getElementById("emojis");


        img.addEventListener("click", () =>
        {
            jQuery(document).ready(function(){

            console.log("jQuery est prêt !");

            $("#emojis").disMojiPicker();

            twemoji.parse(document.body);

            $("#emojis").picker(emoji => console.log(emoji));
            });

            console.log("ok");
        }





    );
    </script>

<?php
    include "includes/footer.php";
?>




