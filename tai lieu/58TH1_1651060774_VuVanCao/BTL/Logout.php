<?php
session_start();
unset($_SESSION['user_name']);
header("Location: index_1.php");
?>