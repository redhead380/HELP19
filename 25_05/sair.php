<?php
    session_start();
    session_destroy();
    header("Location: /25_05/login.html");
?>