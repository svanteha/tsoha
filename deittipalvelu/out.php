<?php
    session_start();
    unset($_SESSION['kayttaja_id']);
    header('Location: index.php');
?>
