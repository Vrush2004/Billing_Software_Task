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

    <div class="container">
        <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add User</a></button>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Sr.No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Password</th>
            <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "Select * from `curd`";
                $result = mysqli_query($con,$sql);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $mobile = $row['mobile'];
                        $password = $row['password'];
                        echo '<tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$name.'</td>
                        <td>'.$email.'</td>
                        <td>'.$mobile.'</td>
                        <td>'.$password.'</td>
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