<?php   

    require("db_connect.php");

    $id = $_GET['id'];

    $query = mysqli_query($conn,"DELETE FROM emp WHERE id='$id'");
    if($query)
    {
        header("location:all-data.php");

    }
    else
    {
        echo mysqli_error($conn);
    }

?>
