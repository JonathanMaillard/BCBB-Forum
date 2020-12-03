<?php
    session_start();

    $arianne = '<a href=#><i class="fa fa-home" aria-hidden="true"></i> Home</a>';
    $titre = "Home - Rolling Stones Forum";
    $css = 'style';


    include "includes/connect.php";
    include "includes/header.php";


?>


<h2>Create new topic</h2>

<form class="form" action="create_topic_script.php?cat_id=<?php echo $_GET['cat_id'];?>" method="POST">

    <div class="form-group">
        <label for="inputTopicSubject">Topic subject</label>
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the subject of your topic in one line...">
    </div>
    
    <div class="form-group">
        <label for="inputTextarea">Description</label>
        <textarea class="form-control" id="message" name="message" placeholder="Write you text here..." rows="10"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>    


<?php
    include "includes/footer.php";
?>