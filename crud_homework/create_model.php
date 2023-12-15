<?php
require_once './database/database.php';
function validate_name($name)
{
 if(!ctype_alnum($name)){
    return "Username should contain only letters and numbers";
 }
 return "";
}
function validate_age($age)
{
if ($age<0){
    return "Invalid age number";
}
return "";
}
function validate_email($email)
{
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    return "Please enter a valid email";
}
return "";
}
function validate_image($image_url)
{
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$image_url)) {
        return "Invalid URL";
    }
    return "";
}
$name_error = "";
$email_error = "";
$image_error = "";
$age_error = "";
$name = "";
$email = "";
$image = "";
$age = "";

$form_valid = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $image_url = trim($_POST['image_url']);
    $age = $_POST['age'];

    // Validate username
    if (empty($name)) {
        $name_error = "Please enter a username";
    } else {
        $name_error = validate_name($name);
    }

    // Validate email
    if (empty($email)) {
        $email_error = "Please enter an email";
    } else {
        $email_error = validate_email($email);
    }

    // Validate image
    if (empty($image_url)) {
        $image_error = "Please enter a image url";
    } else {
        $image_error = validate_image($image_url);
    }

      // Validate age
      if (empty($age)) {
        $age_error = "Please enter a age";
    } else {
        $age_error = validate_age($age);
    }
    

    // Check if there are no errors
    if (empty($name_error) && empty($email_error) && empty($image_error) && empty($age_error)) {
      $student=array(
        'name'=>$name,
        'age'=>$age,
        'email'=>$email,
        'profile'=>$image_url
      );
      createStudent($student);
      header("location:index.php");
      
    }

}


?>

