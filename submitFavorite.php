<?php
session_start();
$_SESSION['submitFavorite'] = true;
$_SESSION['submitRating'] = false;
if(!isset($_POST)) {
    session_unset();
    header('Location: index.php');
} else {
        $valueIdFavorite = preg_split('~-~', $_POST['favorite']);
        $_SESSION['favorite'] = $valueIdFavorite[0];
        $_SESSION['id'] = $valueIdFavorite[1];
        $_SESSION['pagePosition'] = '#'.$valueIdFavorite[1];

    } header('Location: index.php'.$_SESSION['pagePosition']);
