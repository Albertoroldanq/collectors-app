<?php
session_start();
if(!isset($_POST)) {
    session_unset();
    header('Location: index.php');
} else {
    if ($_POST['name'] !='' && $_POST['type'] !='' && $_POST['country'] !='' && $_POST['grape'] !='' && ($_POST['type'] == 'Red' || $_POST['type'] == 'White')) {
        $_SESSION['name'] = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        $_SESSION['type'] = filter_var(trim($_POST['type']), FILTER_SANITIZE_STRING);
        $_SESSION['country'] = filter_var(trim($_POST['country']), FILTER_SANITIZE_STRING);
        $_SESSION['grape'] = filter_var(trim($_POST['grape']), FILTER_SANITIZE_STRING);
    } else {
        session_abort();
    }
    header('Location: index.php');
}