<html>
    <head><title>Conditonal Test</title></head>
    <body>
        <?php
        $first = $_GET["firstName"]; $middle = $_GET["middleName"]; $last = $_GET("lastName");
        print ("Hi $first! Your full name is $last $middle $first. <br></br>");
        if ($first == $last) {
            print ("$first and $last are equal");
        }
        if ($first < $last) {
            print ("$first is less than $last");
        }
        if ($first > $last) {
            print ("$first is greater than $last");
        }
        print("<br></>");

        $gradel = $_GET ["gradel1"]; $grade2 = $_GET["grade2"];
        $final = (2 * $gradel + 3 *$grade2)/5;
        if($final > 89) (
            print ("Your final grade is $final. You got an A. Congaratulation");
        } elseif ($final > 79) {
            print ("Your final grade is $final. You got a B.");
        } elseif ($final > 69) {
            print ("Your final grade is $final. Yout got a C.");
        } elseif ($final > 59) {
          print ("Your final grade is $final. You got a D.");
        } elseif ($final >= 0) {
            print ("Your final grade is $final. You got a F.");
        } else {
            print ("Illegal grade less than 0. Final grade = $final");
        }
        ?>
    </body>
</html>