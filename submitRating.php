<?php
session_start();
$_SESSION['submitRating'] = true;
if(!isset($_POST)) {
    session_unset();
    header('Location: index.php');
} else {
        if (!isset($_POST['rating']) || ($_POST['rating'] > 5 || $_POST['rating'] < 0)) {
            session_unset();
            header('Location: index.php');
        } else {
            $_SESSION['rating'] = $_POST['rating'];
            $_SESSION['id'] = $_POST['id'];
        }
    } header('Location: index.php');
