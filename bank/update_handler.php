<?php
    require_once 'Dao.php';
    $dao = new Dao ();
    
    $dao->updateUser($_POST['firstName'], $_POST['lastName'], $_POST['balance']);
    header('Location: update.php');

    exit;
