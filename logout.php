<?php
session_start();
$_SESSION = array();

unset($_SESSION['email']); 
unset($_SESSION['password'] ) ;
unset($_SESSION['type_user']) ;
session_destroy();
header('location: login.php');
