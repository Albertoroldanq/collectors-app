<?php
session_start();
$_SESSION['submitRating'] = true;
$_SESSION['submitFavorite'] = false;
if(!isset($_POST)) {
    session_unset();
    header('Location: index.php');
} else {
        if (!isset($_POST['rating']) || ($_POST['rating'] > 5 || $_POST['rating'] < 0)) {
            session_unset();
            header('Location: index.php');
        } else {
            $idRating = preg_split('~-~', $_POST['rating']);
            $_SESSION['rating'] = $idRating[0];
            $_SESSION['id'] = $idRating[1];
            $_SESSION['pagePosition'] = $idRating[2];
        }
    } header('Location: index.php');
