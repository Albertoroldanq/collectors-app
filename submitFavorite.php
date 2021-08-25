<?php
session_start();
$_SESSION['submitFavorite'] = true;
$_SESSION['submitRating'] = false;
if(!isset($_POST)) {
    session_unset();
    header('Location: index.php');
} else {
        if (!isset($_POST['favorite']) || ($_POST['favorite'] !== 'on')) {
            $_SESSION['favorite'] = 0;
            $_SESSION['id'] = $_POST['id'];
            header('Location: index.php');
        } else {

            $_SESSION['favorite'] = 1;
            $_SESSION['id'] = $_POST['id'];
        }
    } header('Location: index.php');
