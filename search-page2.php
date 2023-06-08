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
<body>
  <div class="container my-5">
    <form method="post">
      <input type="text" name="search" id="search" placeholder="Search Area">
      <input type="text" name="category" id="category" placeholder="Search Category">
      <button class="btn btn-dark btn-sm" type="submit" name="submit">Search</button>
    </form>
    <div class="container my-5">
    <table class="table">
        <?php
        if(isset($_POST['submit'])){
          $searchArea = $_POST['search'];
          $searchCategory = $_POST['category'];
          $sql = "SELECT * FROM doctor";
          
          if(!empty($searchArea)){
            $sql .= " WHERE DoctorArea = '$searchArea'";
            if (!empty($searchCategory)) {
              $sql .= " AND DoctorCategory = '$searchCategory'";
            }
          }
          
          $result = $conn->query($sql);
          echo $result;

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
                  <td>'.$row['DoctorName'].'</td>
                  <td>'.$row['DoctorInformation'].'</td>
                  <td>'.$row['DoctorArea'].'</td>
                  <td>'.$row['DoctorImage'].'</td>
                  <td>'.$row['DoctorCategory'].'</td>
                </tr>';
              }
              echo '</tbody>';
            }
            else {
              echo "<h2 class='text-danger'>No Data Found</h2>";
            }
          }
        }
        ?>
      </table>
    </div>
  </div>
</body>
</html>
