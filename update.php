<?php

include  'db.php';











if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM product WHERE id = $id";
    $update_result = mysqli_query($conn, $sql);
    $fetch_data = mysqli_fetch_assoc($update_result);
}





























$conn->close();
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        input[name="content"] {
            height: 100px;
        }
    </style>
</head>

<body>


    <?php include 'navbar.php' ?>



    <div class="container mt-5 p-5">
        <form action="update.php" method="POST">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Product name</label>
                <input type="text" value="<?php echo $fetch_data["name"]; ?> " class="form-control" name="author_name" id="exampleFormControlInput1" placeholder="Enter your Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">price</label>
                <input type="text" value="<?php echo $fetch_data["price"]; ?> " class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter your blog title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">description</label>
                <input class="form-control" value="<?php echo $fetch_data["description"]; ?> " name="content" id="exampleFormControlTextarea1" placeholder="Enter your Blog Content" rows="3"></>
            </div>

            <div class="col-auto">
                <button class="btn btn-primary" type="submit">Update Blog</button>
            </div>
        </form>

    </div>

</body>

</html>