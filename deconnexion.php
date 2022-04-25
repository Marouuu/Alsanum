<?php
    session_start();
    foreach ($_SESSION as $key => $value) {
        // echo $key . " ";
        unset($_SESSION[$key]);
    }
    include 'index.php';
    session_destroy();
?>