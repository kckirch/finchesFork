<?php
    require_once 'Dao.php';
    $dao = new Dao();

    $dao->deleteUser($_GET['id']);
    header('Location: account.php');

    exit;