<?php
include 'index.php';
$database = new Database();

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $eventData = $database->fetchEventById($eventId); 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $editedTitle = $_POST['title'];
    $editedDescription = $_POST['despre'];
    $editedDate = $_POST['date'];
    $editedLocation = $_POST['location'];
    $editedSponsors = $_POST['sponsors'];
    $database->updateEvent($eventId, $editedTitle, $editedDescription, $editedDate, $editedLocation, $editedSponsors); // Implement this function
    header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <style>
        .login-form-container { display: none }
        .edit-container {
            background: url('./background-dark.jpg') no-repeat;
            height:100vh;
            color:white;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
        }
        .edit-container label {
            margin-top:15px;
        }
        .edit-container .button {
            padding-left:2%;
            padding-right:2%;
            padding-bottom:1%;
            padding-top:1%;
            margin-top:45px;
        }
        .edit-container .textarea {
            padding:20px;
            text-align:center;
        }
        .edit-container label {
            font-size:20px;
        }
    </style>
</head>
<body>
    <form method="post" class="edit-container" action="edit_event.php?id=<?php echo $eventId; ?>">
        <h1>Edit Event</h1>
        <label for="title">Titlu:</label>
        <input type="text" class="textarea" id="title" name="title" value="<?php echo $eventData['titlu']; ?>"><br>

        <label for="despre">Despre:</label>
        <input type="text" class="textarea" id="despre" name="despre" value="<?php echo $eventData['despre']; ?>"><br>

        <label for="data_si_ora">Data si ora:</label>
        <input type="datetime" class="textarea" id="data_si_ora" name="data_si_ora" value="<?php echo $eventData['data_si_ora']; ?>"><br>

        <label for="sponsors">Sponsori:</label>
        <input type="text" class="textarea" id="sponsors" name="sponsors" value="<?php echo $eventData['sponsors']; ?>"><br>

        <label for="location">Locatie:</label>
        <input type="text" class="textarea" id="location" name="location" value="<?php echo $eventData['location']; ?>"><br>

        <input type="submit" value="Save Changes" class="button">
    </form>
</body>
</html>
