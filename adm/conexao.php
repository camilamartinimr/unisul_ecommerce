   <?php
   
   $db   = "u286814690_fuchsia";
    $servername = "localhost";
    $username = "u286814690_cami";
    $password = "F[#2teW$";

    // Create connection
    $con = new mysqli($servername, $username, $password, $db);

    mysqli_set_charset( $con, 'utf8'); //B1

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
   



?>