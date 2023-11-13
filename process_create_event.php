<?php
include 'index.php';
$database = new Database();

$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];
$sponsors = $_POST['sponsors'];
$location = $_POST['location'];

$database->addEvent($title, $description, $date, $sponsors, $location);
header('Location: dashboard.php');
