<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Thank you: Got your Input.</h2>
    <?php
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        print "<br> Your email address is $email";
        print "<br> Contact preference is $contact";
    ?>
</body>
</html>