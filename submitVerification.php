<?php
session_start();
    if($_POST['name'] !='' && $_POST['type'] !='' && $_POST['country'] !='' && $_POST['grape'] !=''){
        $_SESSION['set'] = true;
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['type'] = $_POST['type'];
        $_SESSION['country'] = $_POST['country'];
        $_SESSION['grape'] = $_POST['grape'];
        header('Location: index.php');
    } else {
        session_abort();
        $_SESSION['set'] = false;
        header('Location: index.php');
    }



