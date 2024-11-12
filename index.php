
<?php 

include  'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];


    $sql = "INSERT INTO   product(name,price,description) VALUES ('$name','$price','$description')";


    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    
        $sql = "SELECT * FROM product WHERE id = $id";
        $update_result = mysqli_query($conn, $sql);
        $fetch_data = mysqli_fetch_assoc($update_result);
    }


    if ($conn->query($sql) === TRUE) {

        echo  '
        <div class="alert alert-success" role="alert">
         Data Inserted In Database
        </div>
        ';
    } else {

        echo  '
        <div class="alert alert-danger" role="alert">
         Data Not Inserted In Database
        </div>
        ';
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
    <style>
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
    color: white;
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

    <?php include 'navbar.php' ?>
    <div class="main">

        <div class="product-form">
            <h2>Add New Product</h2>
            <form  action="index.php" method="POST">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description"  rows="4" required> 
             </textarea>

                <button type="submit">Add Product</button>
            </form>
        </div>
    </div>


    <script>
                const hamburger = document.getElementById('hamburger');
        const navLinks = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>