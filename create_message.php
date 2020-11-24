<?php
    session_start();

    $arianne = '<a href=#><i class="fa fa-home" aria-hidden="true"></i> Home</a>';
    $titre = "Home - Rolling Stones Forum";
    $css = 'style';


    include "includes/connect.php";
    include "includes/header.php";


?>


<h2>Message</h2>

<form clas="form" action="" method="POST">

    <div class="form-group">
        <label for="inputTextarea">Message text area</label>
        <textarea class="form-control" id="inputTextarea" placeholder="Write you text here..." rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
    


<?php
    include "includes/footer.php";
?>