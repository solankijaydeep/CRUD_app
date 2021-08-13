<?php  

    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $db_name = "emp1";

    $conn = mysqli_connect($server_name,$user_name,$password,$db_name);

    if(!$conn)
    {
        die("connection was failed".mysqli_connect_error());
    }
    else
    {
        // echo "connected";
    }

?>