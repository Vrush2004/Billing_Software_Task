<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURD Operations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url('./images/bg.png'); 
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container{
            margin-top:50px;
            background-color: white;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            background-color: #333;
            color: white;
        }
        .header-right{
            margin-right: 30px;
            display: flex;
            gap: 20px;
        }
        .nav-search{
            display: flex;
            justify-content: space-evenly;
            background-color: pink;
            width: 700px;
            height: 40px;
            border-radius: 4px;
            margin-left: 50px;
        }
        .search-input{
            padding-left: 10px;
            width: 100%;
            font-size: 1rem;
            border:none;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .search-icon{
            width: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            background-color: rgba(255, 166, 0, 0.825);
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            color: #0F1111;
        }
        .nav-search:hover{
            border: 2px solid orange;
        }
        .notification-bell {
            font-size: 24px;
            cursor: pointer;
        }
        .profile-section {
            cursor: pointer;
            font-size: 24px;
            margin-right: 20px;
        }
        .effect:hover{
            color:  rgba(255, 166, 0, 0.825);;
        }
        /* Headings */
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        h3 {
            margin-top: 30px;
            margin-bottom: 15px;
            font-size: 20px;
            color: #333;
        }

        /* Form styles */
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 80%;
            gap: 15px;
            margin-bottom: 30px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* List styles */
        ul {
            list-style: none;
            padding-left: 0;
        }

        li {
            padding: 10px;
            background-color: #f4f4f4;
            margin-bottom: 10px;
            border-left: 4px solid #4CAF50;
            border-radius: 5px;
        }
        li a{
            font-weight: 700;
        }
        .inventory-management{
            display:flex;
            flex-direction:column;
            justify-content: center;
            
        }
        /* Billing system specific styles */
        #billing-products {
            height: 120px;
            overflow-y: scroll;
        }

        #total-amount {
            font-weight: bold;
            color: #4CAF50;
        }

        /* Customer, Inventory, and Billing Lists */
        #customer-list, #product-list, #billing-list {
            margin-top: 15px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            max-height: 200px;
            overflow-y: scroll;
        }

        /* Footer Navigation */
        nav {
            margin-top: 30px;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding-left: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #007BFF;
            font-size: 18px;
            padding: 10px;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

    </style>
    </head>
    <body>
    <header>
        <div class="nav-search">
            <input placeholder="Search" class="search-input">
            <div class="search-icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        <div class="header-right">
            <span class="notification-bell"><i class="fa-regular fa-bell effect"></i></span>
            <div class="profile-section"><i class="fa-regular fa-user effect"></i></div>
        </div>  
    </header>

    <!-- Inventory Management Section -->
    <section class="inventory-management">
        <h2>Inventory Management</h2>
        <form id="product-form">
            <input type="text" placeholder="Product Name" id="product-name" required>
            <input type="number" placeholder="Product Price" id="product-price" required>
            <input type="number" placeholder="Product Quantity" id="product-quantity" required>
            <input type="text" placeholder="Product Brand" id="product-brand" required>
            <input type="text" placeholder="Product Supplier" id="product-supplier" required>
            <input type="number" placeholder="Old Stock" id="old-stock" required>
            <input type="text" placeholder="Product Category" id="product-category" required>
            <button type="submit">Save</button>
        </form>
        <h3>View Products</h3>

    <div class="container">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Brand</th>
            <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "Select * from `inventory`";
                $result = mysqli_query($con,$sql);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $name = $row['name'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $brand = $row['brand'];
                        echo '<tr>
                        <td>'.$name.'</td>
                        <td>'.$price.'</td>
                        <td>'.$quantity.'</td>
                        <td>'.$brand.'</td>
                        <td>
                        <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
                        <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                        </td>
                        </tr>';
                    }
                }
            ?>
            
        </tbody>
        </table>
    </div>
</body>
</html>