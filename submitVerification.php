<?php
session_start();
if(!isset($_POST)) {
    session_unset();
    header('Location: index.php');
} else {
    if ($_POST['name'] !='' && $_POST['type'] !='' && $_POST['country'] !='' && $_POST['grape'] !=''){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['type'] = $_POST['type'];
        $_SESSION['country'] = $_POST['country'];
        $_SESSION['grape'] = $_POST['grape'];
        header('Location: index.php');
    } else {
        session_abort();
        header('Location: index.php');
    }
}






