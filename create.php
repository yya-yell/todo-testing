<?php
    require_once('config.php');
    if($_POST){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $sql = "INSERT INTO `todo` (title , description) VALUES
            (:title , :description)";
        $pdoStatement = $pdo->prepare($sql);
        $result = $pdoStatement->execute([
                    ':title'=>$title,
                    ':description'=>$description
                ]
            );
        if ($result) {
            echo "<script>alert('Create Complete');window.location.href='index.php'</script>";
        }
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
                <h1>Create New TODO</h1>
                <div class="card-body">
                    <form action="create.php" method="POST">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" >
                            </textarea>
                        </div>
                        <div class="mt-3">
                                <input type="submit" class="btn btn-primary" value="Create">
                                <a href="index.php" class="btn btn-warning">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>