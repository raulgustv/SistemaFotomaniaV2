<?php


session_start();

unset($_SESSION['admin']);
unset($_SESSION['user']);
unset($_SESSION['ultimoLogin']);

session_destroy();

header("location:../loginAdmin.php");







?>;