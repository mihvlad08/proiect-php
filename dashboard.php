<?php
include 'index.php';

$database = new Database();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .login-form-container { display: none }
        .table-row { dispay: block }
        .ul > * {
            display:block;
            margin-bottom:35px;
        }
        a {
            display:inline;
        }
        .container-supreme {
            display:flex;
            align-items:center;
            flex-direction:column;
            background: url('./background-dark.jpg') no-repeat;
            height:100vh;
            color:white; 
            justify-content:center;
        }
        label {
            display: block
        }

        td, th {
        padding-left:45px 
        }

        .form {
            margin-bottom:100px;
            text-align:center;
        }

    </style>
</head>
<body>
    <div class="container-supreme">
    <form method="post" action="process_create_event.php" class='form'>
    <h1>Create New Event</h1>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br>

        <label for="sponsors">Sponsors:</label>
        <input type="text" id="sponsors" name="sponsors" required><br>

        <input type="submit" value="Create Event">
    </form>
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
        echo "<th>Actiuni</th>";
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
            echo "<td><a href='edit_event.php?id={$row['id']}'>Edit</a></td>";
            echo "<td><a href='remove_event.php?id={$row['id']}'>Delete</a></td>";
            echo "<td><a href='./{$row['titlu']}.html'>Vezi eveniment</a></td>";
            echo "</tr>";
        }
    
        echo "</table>";
    }
    else {
        echo "No events found.";
    }
?>
    </div>
</body>
</html>