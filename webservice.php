<?php
$search_city = $_POST['city'];
$search_category = $_POST['category'];

if(isset($_POST["city"]) && isset($_POST["category"])){
  echo $search_city;
  echo $search_category;
}

$conn = new mysqli("localhost", "root","","doctor");

?>