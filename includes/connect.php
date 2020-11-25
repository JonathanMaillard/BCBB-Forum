<?php
try
{
    $db = new PDO('mysql:host=85.10.205.173:3306;dbname=forum_stones', 'becodeproject', 'becodeforum',);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>