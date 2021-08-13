<?php
    include("db_connect.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = $_POST['name'];
        $mob = $_POST['mob'];
        $occ = $_POST['occ'];
        $lang = $_POST['lang'];
        $city = $_POST['city'];
        
        if(isset($_FILES['img']))
        {
            $file_name = $_FILES['img']['name'];
            $temp_name = $_FILES['img']['tmp_name'];
            $folder = "upload/".$file_name;
        }

        $result = mysqli_query($conn,"INSERT INTO emp VALUES(NULL,'$name','$mob','$occ','$lang','$city','$file_name')");

        if(move_uploaded_file($temp_name,$folder))
        {
            // echo "image has been uploaded";
        }
        else
        {
            echo "Image has not been uploaded";
        }
        if($result)
        {
            // echo "data has been added";
        }
        else
        {
            echo mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <section style="padding-top:60px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">Add Employee</div>
                        <div class="card-body">
                            <form class="pt-2" action="" method="POST" enctype="multipart/form-data">
                                <div class="from-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control mb-2" placeholder="Enter name" name="name">
                                </div>
                                <div class="from-group">
                                    <label for="mobile">mobile:</label>
                                    <input type="phone" class="form-control mb-2" placeholder="Enter mobile no." name="mob">
                                </div>
                                <div class="from-group">
                                    <label for="occupation">occupation:</label>
                                    <input type="text" class="form-control mb-2" placeholder="Enter your occupation" name="occ">
                                </div>
                                <div class="from-check from-check-inline mt-3">Language:
                                    <input type="radio" name="lang" value="Python" class="form-check-input ml-1">
                                    <label for="language" class="form-check-label ml-4">Python</label>
                                    <input type="radio" name="lang" value="Java" class="form-check-input ml-1"> 
                                    <label for="language" class="form-check-label ml-4">Java</label>
                                    <input type="radio" name="lang" value="PHP" class="form-check-input ml-1"> 
                                    <label for="language" class="form-check-label ml-4">PHP</label> 
                                </div>
                                <select class="form-select mt-3 form-control" name="city">
                                    <option selected>Select city</option>
                                    <option value="Rajkot">Rajkot</option>
                                    <option value="jetpur">Jetpur</option>
                                    <option value="porbandar">Porbandar</option>
                                </select>
                                <div class="from-group mt-3">
                                    <label for="file">Profile Image:</label>
                                    <input type="file" name="img" class="form-control">
                                </div>
                                <input type="submit" value="Submit" class="btn btn-primary mt-3" name="submit">
                                <input type="reset" value="Reset" name="reset" class="btn btn-primary mt-3 mx-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>
</body>
</html>
