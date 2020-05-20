<?php


session_start();

unset($_SESSION['userId']);
unset($_SESSION['user']);
unset($_SESSION['ultimoLogin']);

header("location:../loginAdmin.php");







?>;