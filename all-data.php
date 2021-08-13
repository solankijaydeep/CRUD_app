<?php

require("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All data from database</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>
<body>
<section style="padding-top:60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Add Employee <a href="form.php" class="btn btn-primary">Add new</a></div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile no.</th>
                                        <th>Occupation</th>
                                        <th>Language</th>
                                        <th>City</th>
                                        <th>Profile</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = mysqli_query($conn,"SELECT * FROM emp");
                                        while($result = mysqli_fetch_assoc($query))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $result['name'] ?></td>
                                            <td><?php echo $result['mobile'] ?></td>
                                            <td><?php echo $result['occ'] ?></td>
                                            <td><?php echo $result['language'] ?></td>
                                            <td><?php echo $result['city'] ?></td>
                                            <td><img src="upload/<?php echo $result['img']?>" style="max-width: 60px"></td>
                                            <td>
                                                <a href="update.php?id=<?php echo $result['id']?>">Edit</a>
                                            </td>
                                            <td>
                                                <a href="delete.php?id=<?php echo $result['id'] ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                        ?>

                                        
                                </tbody>
                            </table>
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
