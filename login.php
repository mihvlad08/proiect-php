<?php
include 'index.php';

$database = new Database(); 
$user = new User($database);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $user->login($username, $password);

    if ($user->isLoggedIn()) {
        header("Location: dashboard.php");
        exit();
    } else {
        header("Refresh:0");
        exit();
    }
}
?>
