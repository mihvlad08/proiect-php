<?php

include 'index.php';

$database = new Database();

// Handle user interactions and calls to methods of the above classes as needed
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Lato&family=Roboto:wght@100;300;400&family=Rubik&display=swap" rel="stylesheet"> 
    <title>Proiecst</title>
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
        td {
            padding:30px
        }
        h1 {
            margin-bottom:50px;
        }
    </style>
</head>
<body>
    <h1>Evenimente</h1>
<?php
    $eventsResult = $database->getEvents();

    // Check if there are results
    if ($eventsResult) {
        echo "<table class='table'>";
        echo "<tr class='table-header'>";
        echo "<th>ID</th>";
        echo "<th>Titlu</th>";
        echo "<th>Despre</th>";
        echo "<th>Data si ora</th>";
        echo "<th>Locatie</th>";
        echo "<th>Sponsors</th>";
        echo "</tr>";
    
        while ($row = $eventsResult->fetch_assoc()) {
            if(strlen($row['despre']) > 10) {
                $row['despre'] = substr($row['despre'], 0, 28) . '...';
            }
            echo "<tr class='table-row'>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['titlu']}</td>";
            echo "<td>{$row['despre']}</td>";
            echo "<td>{$row['data_si_ora']}</td>";
            echo "<td>{$row['location']}</td>";
            echo "<td>{$row['sponsors']}</td>";
            echo "<td><a href='./{$row['titlu']}.html'>Vezi eveniment</a></td>";
            echo "</tr>";
        }
    
        echo "</table>";
    }
    else {
        echo "No events found.";
    }
?>
</body>
</html>

