<?php
    require_once('config.php');
    $pdoStatement = $pdo->prepare("SELECT * FROM `todo` ORDER BY id DESC");
    $pdoStatement->execute(); 
    $result =$pdoStatement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Home Page</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <h1>TODO Home page</h1>
            <div class="card-body">
            <a href="create.php" class="btn btn-success mb-3">Create New</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Discription</th>
                            <th>Created Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                <?php if($result) {
                    $i = 1;
                foreach($result as $value) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['title']; ?></td>
                            <td><?php echo $value['description']; ?></td>
                            <td><?php echo date('Y-m-d' , strtotime($value['created_at'])); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $value['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?php echo $value['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                <?php 
                    $i++;
                    }
                } 
                ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>