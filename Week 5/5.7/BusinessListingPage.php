<?php
  $host="localhost";
  $dbuser="root";
  $password="";
  $dbname="business_service";
  $conn=mysqli_connect($host,$dbuser,$password,$dbname);
  if(mysqli_connect_errno()) {
    die("Connection Failed! " . mysqli_connect_error());
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <form name="form" id="form" method="post">
    <div class="coordinate">
      <p class="title">Click on a category to find business listings: </p>
      <div class="input">
        <input type="submit" name="submit" value="Automotivate Parts and Supplies">
        <input type="submit" name="submit" value="Seafood Stores and Restaurants">
        <input type="submit" name="submit" value="Health And Beauty">
        <input type="submit" name="submit" value="Schools and Colleges">
        <input type="submit" name="submit" value="Community Sports and Recreation">
      </div>
    </div>
  </form>
  <?php
    $input = '';
    if(isset($_POST['submit'])) {
      $input = $_POST['submit'];
      $sql="select b.Business_ID, b.Name, b.Address, b.City, b.Telephone, b.URL from businesses b, biz_categories bc, categories c where b.Business_ID = bc.Business_ID and c.Category_ID = bc.Category_ID and c.Title = "."'".$input."'";
      // echo $sql;
      $res=mysqli_query($conn,$sql);
      if(!$res) {
        die("Query Failed!");
      }
      echo "<table border='1' class='table'>";
      echo "<tbody>";
      while($row=mysqli_fetch_assoc($res)) {
        echo "<tr><td>{$row['Business_ID']}</td><td>{$row['Name']}</td><td>{$row['Address']}</td><td>{$row['City']}</td><td>{$row['Telephone']}</td><td>{$row['URL']}</td>";
      }
      echo "</tbody>";
      echo "</table>";
      mysqli_free_result($res);
    }
  ?>
</body>
</html>

