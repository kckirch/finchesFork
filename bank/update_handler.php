<?php
    require_once 'Dao.php';
    $dao = new Dao ();
    
    $dao->updateUser($_POST['firstName'], $_POST['lastName'], $_POST['accountNum'], $_POST['balance']);
    header('Location: account.php');

    exit;
