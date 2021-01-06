<?php

    require_once('config.php');
    $pdoStatement = $pdo->prepare("DELETE FROM `todo` WHERE id=" . $_GET['id']);
    $pdoStatement->execute();
    header("location:index.php");

?>