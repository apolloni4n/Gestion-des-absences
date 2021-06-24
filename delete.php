<?php
require('db_con.php');
$id = $_REQUEST['id'];
$query = "DELETE FROM etudiant WHERE id_etudiant=$id";
$result = mysqli_query($conn, $query);
header("Location: view.php");
