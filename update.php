<?php

include("db_connect.php");

$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM emp WHERE id = '$id'");

$data = mysqli_fetch_assoc($query);
if(isset($_POST['update']))
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
        $folder = 'upload/'.$file_name;
    }

    $result = mysqli_query($conn,"UPDATE emp set name='$name',mobile='$mob',occ='$occ',language='$lang',city='$city',img='$file_name' WHERE id='$id'");

    if(move_uploaded_file($temp_name,$folder))
    {
        echo "image uploaded";
    }
    else
    {
        echo mysqli_error($conn);
    }
    if($result)
    {
        header("location:all-data.php");
        echo "updated";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    
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
                                    <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="<?php echo $data['name']?>">
                                </div>
                                <div class="from-group">
                                    <label for="mobile">mobile:</label>
                                    <input type="phone" class="form-control mb-2" placeholder="Enter mobile no." name="mob" value="<?php echo $data['mobile']?>">
                                </div>
                                <div class="from-group">
                                    <label for="occupation">occupation:</label>
                                    <input type="text" class="form-control mb-2" placeholder="Enter your occupation" name="occ" value="<?php echo $data['occ']?>">
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
                                <input type="submit" value="update" class="btn btn-primary mt-3" name="update">
                                <input type="reset" value="Reset" name="reset" class="btn btn-primary mt-3 mx-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
