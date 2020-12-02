<?php
if (empty(session_id())) {session_start();}

$db = openDb();
// $boardId = $_POST["idBoard"];

include "includes/connect.php";

$req = $db->prepare('INSERT INTO topics (topic_subject, topic_date, user_id, cat_id) VALUES(:subject, :topic_date, :user_id, :cat_id)');
$req->execute(array(
	'title' => $_POST['subject'],
	'creationDate' => $creationDate->format("Y-m-d H:i:s"),
	'userId' => $userId,
	'categoryId' => $category_id,
));
// var_dump($db->lastInsertId());die;
$topicId = $db->lastInsertId();

addMessage($db, $_POST, $topicId);

header("Location: topic.php");

?>