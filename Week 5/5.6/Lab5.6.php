<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $mydb = 'business_service';

    $conn = mysqli_connect($server, $user, $pass, $mydb);
    if(!$conn){
        die("Connect Failed!"); 
    } else {
        $selectQuery = 'select * from categories';
        $selectResult = mysqli_query($conn, $selectQuery);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Category Administration</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Business Registration</h1>
              <form name="addForm" method="POST">
                <div class="main-content">
                  <div class="list-cat">
                    <p>Click on one, or control-click on multiple categories:</p>
                    <div class="list-check">
                      <?php
                        $selectQuery = "select Category_ID, Title from categories";
                        $res = mysqli_query($conn, $selectQuery);
                        if(!$res) {
                          die("Query failed!");
                        }
                        while($row=mysqli_fetch_assoc($res)) {
                          echo "<input id='{$row['Category_ID']}' name='cat-Title[]' type='checkbox' value='{$row['Title']}'>";
                          echo "<label for='{$row['Category_ID']}'>{$row['Title']}</label>";
                        }
                        mysqli_free_result($res);
                      ?> 
                    </div>
                  </div>
                  <div class="form-biz">
                    <table>
                        <tr>
                            <td>Business name: </td>
                            <td><input type="text" name="biz_name" id="biz_name" required></td>
                        </tr>
                        <tr>
                            <td>Address: </td>
                            <td><input type="text" name="address" id="address" required pattern="[A-Za-z0-9'\.\-\s\,]"></td>
                        </tr>
                        <tr>
                            <td>City: </td>
                            <td><input type="text" name="city" id="city" required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$"></td>
                        </tr>
                        <tr>
                            <td>Telephone: </td>
                            <td><input type="text" name="number" id="number" required pattern="[0]{1}[1-9]{1}[0-9]{4}[0-9]{4}"></td>
                        </tr>
                        <tr>
                            <td>URL: </td>
                            <td><input type="text" name="url" id="url" required></td>
                        </tr>
                    </table>
                  </div>
                </div>
                <div class="btn"> 
                  <input type="submit" id="submit" name="submit" class="submit" value="Click to Submit">
                  <input type="reset" class="submit" value="Cancel">
                </div>
              </form>
              <?php
                $biz_tab = 'businesses';
                $biz_cat = 'biz_categories';

                $catList = array();
                $catQuery = "select Category_ID, Title from categories";
                $result = mysqli_query($conn, $catQuery);
                if(!$result) {
                  die("Query failed!");
                }
                if(isset($_POST['cat-Title'])) {
                  while($row=mysqli_fetch_assoc($result)) {
                    if(in_array($row['Title'], $_POST['cat-Title'])) {
                      array_push($catList, $row['Title']);
                    }
                  }
                }
                if(isset($_POST['biz_name'])) {
                  $biz_name = $_POST['biz_name'];
                  $address = $_POST['address'];
                  $city = $_POST['city'];
                  $number = $_POST['number'];
                  $url = $_POST['url'];
  
                  $query1 = "INSERT INTO $biz_tab (`Name`, `Address`, `City`, `Telephone`, `URL`) VALUES ('$biz_name', '$address', '$city', '$number', '$url')";
                  $query2 = "INSERT INTO $biz_cat VALUES ('$biz_id', '$cat_selected')";
                  mysqli_query($conn, $query1);
                  $insertResult = mysqli_query($conn, $query2);
                  if($insertResult){
                    echo '<script type="text/javascript">alert("Insert Successfully ")</script>';
                    echo header("refresh: 0.2");
                  }
                }
                
              ?>
    </body>
</html>