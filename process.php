<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'hotels_project2020-2021') or die(mysqli_error($mysqli));
$id = 0;
$update = false;
$hotel_Name = '';
$id = '';
$email = '';
$city = '';
$phone = '';
$post = '';
$country = '';
$rating = '';
$msg = "";

if (isset($_POST['save'])) {

  $id = $_POST['id'];
  $hotel_Name = $_POST['hotel_Name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $post = $_POST['post'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $rating = $_POST['rating'];
  $image = $_FILES['image']['name'];
  $target = "images/" . basename($image);

  $mysqli->query("INSERT INTO hotel_list (id,hotel_Name,phone,post ,image, email , city, country , rating ) VALUES ('$id','$hotel_Name','$phone','$post','$image',' $email','$city','$country','$rating')") or die($mysqli->error);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
  } else {
    $msg = "Failed to upload image";
  }

  $_SESSION['message'] = "Hotel Record Has Been Created";
  $_SESSION['msg_type'] = "success";

  header("location: index.php");
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $mysqli->query("DELETE FROM hotel_list WHERE id=$id") or die($mysqli->error);

  $_SESSION['message'] = "Hotel Record Has Been Deleted";
  $_SESSION['msg_type'] = "danger";

  header("location: index.php");
}

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM hotel_list WHERE id=$id") or die($mysqli->error);

  if ($result->num_rows) {
    $row = $result->fetch_array();
    $id = $row['id'];
    $hotel_Name = $row['hotel_Name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $post = $row['post'];
    $country = $row['country'];
    $city = $row['city'];
    $rating = $row['rating'];
    $image = $row['image'];
  }
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $hotel_Name = $_POST['hotel_Name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $post = $_POST['post'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $rating = $_POST['rating'];
  $image = $_FILES['image']['name'];
  $target = "images/" . basename($image);

  $mysqli->query("UPDATE hotel_list SET hotel_Name ='$hotel_Name', email ='$email', image ='$image',city = '$city',country='$country', rating='$rating',  phone='$phone' , post='$post' WHERE id=$id") or die($mysqli->error);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
  } else {
    $msg = "Failed to upload image";
  }

  $_SESSION['message'] = "Hotel Record Has Been Updated";
  $_SESSION['msg_type'] = "warning";

  header("location: index.php");
}