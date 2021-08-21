<?php
session_start();
$_SESSION['submitFavorite'] = true;
$_SESSION['submitRating'] = false;
if(!isset($_POST)) {
    session_unset();
//    header('Location: index.php');
} else {
        if (!isset($_POST['favorite']) || ($_POST['favorite'] > 1 || $_POST['favorite'] < 0)) {
            echo 'here';
            session_unset();
//            header('Location: index.php');
        } else {
            echo $_POST['favorite'];
            $_SESSION['favorite'] = $_POST['favorite'];
            $_SESSION['id'] = $_POST['id'];
        }
    } //header('Location: index.php');
