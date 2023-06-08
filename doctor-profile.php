<?php
  $conn = new mysqli('localhost', 'root', '', 'doctor');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    body{
        font-size:20px;
        font-family:cursive;
        
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        background-image: url('bg2.avif');
        background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;     
        
    }

    nav{
        display:flex;
        flex-direction:row;
        width:100%;
        margin-bottom:25px;
    }

    .navbar .nav-item a {
      font-size: 18px;
    }

    .navbar .nav-item.home a {
      font-size: 24px;
      font-weight: bold;
      color: #000000;
    }

    .navbar .nav-item.home a:hover {
      color: #ff0000;
    }

    </style>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a style="font-family:cursive;" class="navbar-brand" href="cover-frame.php"><img src="logo.png" alt="Doctory Logo" width="50" height="50" > Doctory</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item home">
            <a style="font-size:35px; font-family:cursive;" class="nav-link" href="cover-frame.php">Home</a>
          </li>
          <li class="nav-item">
            <a style="font-size:25px; font-family:cursive;" class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a style="font-size:25px; font-family:cursive;" class="nav-link" href="search-page3.php">Services</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>






    <?php

$doctorID = $_GET['id'];

// Query the database to fetch the doctor's profile information based on the ID
$sql = "SELECT * FROM doctors WHERE ID = '$doctorID'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  // Doctor profile information found, display it as needed
  $row = $result->fetch_assoc();
  $doctorID = $row['ID'];
  $doctorName = $row['DoctorName'];
  $doctorInformation = $row['DoctorInformation'];
  $doctorImage = $row['DoctorImage'];
  $doctorCategory = $row['DoctorCategory'];

  echo '<img src="'.$row['DoctorImage'].'" alt="Doctor Image" style="width: 300px; border-radius: 50%;"> <br><br>';
  echo "Doctor's Id: " . $doctorID . "<br>";
  echo "Doctor's Name: " . $doctorName . "<br>";
  echo "Doctor's Information: " . $doctorInformation . "<br>";
  echo "Doctor's Category: " . $doctorCategory . "<br>";
 
  // ... display other profile details ...
} else {
  // No profile found for the specified doctor ID
  echo "Doctor profile not found.";
}

// Close the database connection
$conn->close();
?>

</body>
</html>



  