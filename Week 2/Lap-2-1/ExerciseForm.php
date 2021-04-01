<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Submit Form</title>
</head>
<body>
    <?php
        $name = $_POST["Name"];
        $class = $_POST["Class"];
        $university = $_POST["University"];
        $hobbies = array($_POST["hobby1"], $_POST["hobby2"], $_POST["hobby3"], $_POST["hobby4"], $_POST["hobby5"]);
        
        echo "Hello, $name";
        echo "<br>";
        echo "You are studying at  $class, $university";
        echo "<br>";
        echo "Your hobby is:";
        echo "<ol>";
        for($i = 0; $i < count($hobbies); $i++) {
            if($hobbies[$i] != null) {
                echo "<li>";
                echo $hobbies[$i];
                echo "</li>";
            }
        }
        echo "</ol>";
    ?>
</body>
</html>