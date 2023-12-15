<?php

// Include the database connection function
require_once "database/database.php";


// Process the form submission and update student information
$db = db();
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$image_url = $_POST['image_url'];
$id = $_POST['id'];
// Check if there are no errors

$student=array(
    'name'=>$name,
    'age'=>$age,
    'email'=>$email,
    'profile'=>$image_url,
    'id'=>$id
);
updateStudent($student);
header("location:index.php");
    
// echo $id;
// $student = updateStudent($id, $name, $age, $email, $image_url);
// header('location: index.php');
?>
