<?php
require('db_con.php');
$id = $_REQUEST['id'];
$query = "DELETE FROM filliere WHERE filliere_id=$id";
$result = mysqli_query($conn, $query);
header("Location: view_filliere.php");
