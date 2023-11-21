<?php

// Handle user interactions and calls to methods of the above classes as needed
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Lato&family=Roboto:wght@100;300;400&family=Rubik&display=swap" rel="stylesheet"> 
    <title>Proiect</title>
    <style>
        * {
            font-family: 'Josefin Sans', sans-serif;
            margin:0;
            padding:0;
        }
        .login-form-container {
            display:flex;
            justify-content:center;
            align-items:center;
            text-align:center;
            height:100vh;
            background: url('./background-dark.jpg') no-repeat;
            color:white;
        }
        .login-form-container label {
            display:block;
        }
        .login-form-container input {
            padding:10px;
        }
        .index-login-button {
            padding-left:20%;
            padding-right:20%;
            padding-bottom:10%;
            padding-top:10%;
            background-color:purple;
            color:white;
        }
    </style>
</head>
<body>
    <div class="login-form-container">
        <form method="post" action="login.php" class='login-form'>
            <h2 class='login-header'>Admin Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <input type="submit" value="Login" class='index-login-button'>
        </form>
    </div>  
</body>
</html>

