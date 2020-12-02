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
 
if(isset($_SESSION['id'])) {

	$creationDate = date("Y-m-d H:i:s");
	$values = array(":subject"=>$_POST["subject"], ":topic_date"=>$creationDate, ":user_id"=>$_SESSION['id'], ":cat_id"=>$_GET['cat_id']);

	$req = $db->prepare('INSERT INTO topics (topic_subject, topic_date, user_id, cat_id) VALUES(:subject, :topic_date, :user_id, :cat_id)');
	$req->execute($values);

}


include "includes/footer.php";


?>