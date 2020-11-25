<?php
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "includes/connect.php";

    //Get ID of the selected categories ont he board
    $category_id = $_GET["id"];

    //Get the category name in the DB
    $query=$db->prepare('SELECT cat_name 
    FROM categories
    WHERE cat_id ='.$category_id);

    $query->execute();
    
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $cat_name = $result["cat_name"];

    //Modify these varialbe according to your page
    $arianne = '<p><a href=#><i class="fa fa-home" aria-hidden="true"></i> Home</a> > ' . $cat_name . ' </p>';
    $titre = $cat_name . " - Rolling Stones Forum";
    $css = "topics";


    
    include "includes/header.php";

?>

    <p class="title"><?php echo $cat_name;?> Icon Demos</p>

    <p class="rules">Forum rules</p>

    <button class="new">New Topic  <i class="fa fa-search" aria-hidden="true"></i>
</button>
    <div class="search">
        <input type ="text" placeholder="Search this forum..."><i class="fas fa-search"></i><i class="fas fa-cog"></i>
    </div>
    <p class="subtitle">Announcements</p>
    <p class="subtitle">Topics</p>
    <button class="new">New Topic  <i class="fas fa-pen"></i></button>
    <br>
    <div class="search">
        <input type ="text" placeholder="Search..."><i class="fas fa-search"></i><i class="fas fa-cog"></i>
    </div>
    <div class="form__login">
        <label for="username">Username:</label>
        <br>
        <input class="connection" type="text" id="username" name="user__username">
    </div>
    <div class="form__pwd">
        <label for="name">Password:</label>
        <br>
        <input class="connection" type="password" id="pwd" name="user__pwd">
    </div>
    <div class="form__remember">
        <label for="remember">Remember me </label>
        <input type="checkbox" name="yes" value="1">
    </div>
    <button class="new connection">Login</button>
    <a href="">I forgot my password</a>
    <p class="subtitle">Last posts</p>
    <p class="subtitle">Last active user</p> 

<?php
    include "includes/footer.php";
?>