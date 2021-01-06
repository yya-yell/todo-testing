<?php
    require_once('config.php');
    if($_POST){
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $id = $_POST['id'];
        $pdoStatement = $pdo->prepare("UPDATE `todo` SET title='$title', description='$desc' WHERE id='$id'");
        $result = $pdoStatement->execute();
        if($result){
            echo "<script>alert('update success');window.location.href='index.php';</script>";
        }
    } else {
        $pdoStatement = $pdo->prepare("SELECT * FROM `todo` WHERE id=" . $_GET['id']);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchAll();
    }
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
            <h1>Edit TODO</h1>
            <div class="card-body">
            <?php 
                if($result){
                    foreach($result as $value) {
            ?>
                <form action="edit.php" method="POST">
                    <input type="hidden" value="<?php echo $value['id'];?>" name="id">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $value['title']; 
                        ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">
                        <?php echo $value['description'];?>
                        </textarea>
                    </div>
                       <div class="mt-3">
                            <input type="submit" class="btn btn-primary" value="Edit">
                            <a href="index.php" class="btn btn-warning">Back</a>
                       </div>
                </form>
            <?php             
                    }
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>