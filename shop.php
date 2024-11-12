<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("" . $conn->connect_error);
}
;



$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);






if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM product WHERE id = $id";
    $del_result = mysqli_query($conn, $sql);


    if ($del_result) {
        header("Location: shop.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }


}
$conn->close();



?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce || PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .main {
            display: flex;
            flex-wrap: wrap;
        }
        .icon-div {
            display: flex;
            justify-content: end;
            gap: 20px;
            align-items: center;
            flex-direction: row-reverse;
            font-size: 20px;
        }
    
       /* Basic reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    margin: 0;
}

/* Navbar styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 10px 20px;
    color: white;
}

.navbar .logo a {
    color: white;
    text-decoration: none;
    font-size: 1.8rem;
    font-weight: bold;
}

.nav-links {
    list-style-type: none;
    display: flex;
    margin-left: 30px;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-size: 1.1rem;
    padding: 5px 10px;
}

.nav-links a:hover {
    background-color: #444;
    border-radius: 5px;
}

/* Search Bar */
.search-bar input {
    padding: 8px;
    font-size: 1rem;
    border: none;
    border-radius: 20px;
    width: 200px;
}

/* Icons */
.icons {
    display: flex;
    align-items: center;
    gap: 15px;
}

.icons a {
    color: black;
    font-size: 1.5rem;
    text-decoration: none;
}

/* Hamburger Menu for Mobile */
.hamburger {
    display: none;
    font-size: 2rem;
    cursor: pointer;
    color: white;
}

/* Media Queries for Mobile Devices */
@media (max-width: 768px) {
    .nav-links {
        display: none;
        position: absolute;
        top: 60px;
        left: 0;
        background-color: #333;
        width: 100%;
        flex-direction: column;
        align-items: center;
    }

    .nav-links.active {
        display: flex;
    }

    .nav-links li {
        margin: 10px 0;
    }

    .search-bar {
        display: none;
    }

    .hamburger {
        display: block;
    }
}
        .main{
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            width: 100%;
        }

        .product-form {
            background-color: #fff;
            padding: 2rem;

            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            height: 500px;
        }

        .product-form h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            color: #333;
        }

        .product-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .product-form input[type="text"],
        .product-form input[type="number"],
        .product-form textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 1rem;
        }

        .product-form button {
            width: 100%;
            padding: 0.75rem;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 3px;
            font-size: 1rem;
            cursor: pointer;
        }

        .product-form button:hover {
            background-color: #218838;
        }
    
    </style>
</head>

<body>


<nav class="navbar">
            <!-- Logo Section -->
            <div class="logo">
                <a href="#">ShopLogo</a>
            </div>

            <!-- Menu Links -->
            <ul class="nav-links">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./shop.php">Shop</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>

            <!-- Search Bar -->
            <div class="search-bar">
                <input type="text" placeholder="Search for products...">
            </div>

            <!-- Icons (Account & Cart) -->
            <div class="icons">
                <a href="#" class="account-icon">👤</a>
                <a href="#" class="cart-icon">🛒</a>
            </div>

            <!-- Hamburger (for mobile view) -->
            <div class="hamburger" id="hamburger">
                &#9776;
            </div>
        </nav>



    <h1 class="mt-4 ms-5">Products</h1>


    <div class="container main">


        <?php foreach ($result as $post): ?>

            <div class="card col md-3">
                <div class="card-body">

                    <h5 class="card-title"> <?php echo $post["name"] ?></h5>
                    <p class="card-text"><?php echo $post["price"] ?></p>
                    <p class="card-text"><small class="text-body-secondary"><?php echo $post["description"] ?></small></p>
                    <div class="icons">
                        <a href="shop.php?id=<?php echo $post["id"] ?>"><i class="bi bi-trash"></i></a>
                        <a href="update.php?id=<?php echo $post["id"] ?>"><i class="bi bi-pencil-fill"></i></a>
                       
                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </div>

</body>

</html>