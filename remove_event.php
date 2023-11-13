<?php
include 'index.php';

$database = new Database();
$eventId = $_GET['id'];
$database->removeEvent($eventId);
header('Location: dashboard.php');
