<?php
require('db_con.php');
$id = $_REQUEST['id'];
$query = "DELETE FROM absences WHERE id=$id";
$result = mysqli_query($conn, $query);
header("Location: view_absenses.php");
