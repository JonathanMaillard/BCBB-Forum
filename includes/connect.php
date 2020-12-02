<?php
try
{
    $db = new PDO('mysql:host=db.bbs-queen.neant.be; port=33060; dbname=BCBB_STONE;', 'bcbb-STONE-site', 'BCBB4RollingSSITE--',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>