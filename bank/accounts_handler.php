<?php
    require_once 'Dao.php';
    $dao = new Dao(); 

    $dao->insertNewUser($_POST['firstName'], $_POST['lastName'], $_POST['balance']);
    header('Location: account.php');

    exit;