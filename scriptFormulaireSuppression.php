<?php
require_once('connectionDb.php');
$db=connect();
include('header.php');




//suppression d'un disque


    $disc_id= $_GET['disc_id'];
    $pdoStat = $db -> prepare("DELETE disc
                                FROM disc
                                INNER JOIN artist
                                ON disc.artist_id = artist.artist_id
                                WHERE disc.disc_id = :disc_id");
    $pdoStat->bindValue(':disc_id',$disc_id,PDO::PARAM_INT);
    $pdoStat->execute();

    //header("Location: clients.php");



?>











