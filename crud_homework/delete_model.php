<?php
require_once './database/database.php';
$id=$_GET["id"];
deleteStudent($id);
header("location:index.php");
?>