<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=forum', 'admin', 'becode');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>