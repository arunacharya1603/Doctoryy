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

 <style>
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
</head>
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





<div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label for="search" class="form-label">Search by DoctorArea:</label>
        <input type="text" name="search" id="search" class="form-control" placeholder="Enter DoctorArea">
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">DoctorCategory:</label>
        <select name="category" id="category" class="form-control">
          <option value="">Select a DoctorCategory</option>
          <?php
          $categoryQuery = "SELECT DISTINCT DoctorCategory FROM doctors";
          $categoryResult = $conn->query($categoryQuery);
          while($categoryRow = mysqli_fetch_assoc($categoryResult)) {
            echo '<option value="'.$categoryRow['DoctorCategory'].'">'.$categoryRow['DoctorCategory'].'</option>';
          }
          ?>
        </select>
      </div>
      <button class="btn btn-dark btn-sm" type="submit" name="submit">Search</button>
    </form>
    <div class="container my-5">
      <table class="table" style="font-family: cursive;">
        <?php
        if(isset($_POST['submit'])){
          $search = $_POST['search'];
          $category = $_POST['category'];
          $sql = "SELECT * FROM doctors";
          
          if(!empty($search)){
            $sql .= " WHERE DoctorArea = '$search'";
          }
          if(!empty($category)){
            $sql .= " AND DoctorCategory = '$category'";
          }
          
          $result = $conn->query($sql);

          if($result){
            if(mysqli_num_rows($result) > 0){
              echo '<thead>
                <tr>
                  <th>Sr. no</th>
                  <th>Name</th>
                  <th>Information</th>
                  <th>Area</th>
                  <th>Image</th>
                  <th>Category</th>
                </tr>
              </thead>';

              echo '<tbody>';
              while($row = mysqli_fetch_assoc($result)){
                echo '<tr>
                  <td>'.$row['ID'].'</td>
                  <td><a href="doctor-profile.php?id='.$row['ID'].'">'.$row['DoctorName'].'</a></td>

                  <td>'.$row['DoctorInformation'].'</td>
                  <td>'.$row['DoctorArea'].'</td>
                  <td><img src="'.$row['DoctorImage'].'" alt="Doctor Image" style="width: 100px; border-radius: 50%;"></td>

                  <td>'.$row['DoctorCategory'].'</td>
                </tr>';
              }
              echo '</tbody>';
            }
            else {
              echo "<h2 class=:text-danger>No Data Found</h2>";
            }
          }
        }
        ?>
      </table>

      <div class="form" style="font-family: cursive; font-size: 25px;">
        <?php
       if (isset($_POST['description'])) {
        $description = $_POST['description'];
      
        echo "Description: " . $description . "<br>";
      
      } else {
        echo "No input provided.";
      }
        ?>
        
      </div>
    </div>
  </div>
</body>
</html>
