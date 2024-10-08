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
        .dashboard {

            width: 90%;
            background-color: white;
            padding: 20px;
            margin: 40px auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dashboard-metrics {
            display: flex;
            justify-content: space-around;
        }

        .metric {
            text-align: center;
            padding: 10px;
            background-color: #e7f3ff;
            border-radius: 8px;
            width: 200px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .metric h3 {
            margin-bottom: 10px;
        }

        nav {
            margin-top: 20px;
            text-align: center;
        }

        section {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
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
            width: 100%;
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

    <!-- Dashboard Section -->
    <section class="dashboard">
        <h2>Dashboard</h2>
        <div class="dashboard-metrics">
            <div class="metric">
                <h3>Total Sales</h3>
                <p id="total-sales">0</p>
            </div>
            <div class="metric">
                <h3>Total Revenue</h3>
                <p id="total-revenue">$0</p>
            </div>
        </div>
    </section>

    <!-- Navigation to Other Pages -->
    <nav>
        <ul>
            <li><a href="customer.php">Customer Management</a></li>
            <li><a href="inventory.php">Inventory Management</a></li>
            <li><a href="./html/billing.html">Billing System</a></li>
        </ul>
    </nav>
</body>
</html>