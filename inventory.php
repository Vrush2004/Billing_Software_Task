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