<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "proiect_php_oop_2";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function addEvent($titlu, $despre, $data, $sponsors, $location) {
        $sql = "INSERT INTO eveniment (titlu, despre, data_si_ora, sponsors, location) 
        VALUES ('$titlu', '$despre', '$data','$sponsors','$location')";
        $this->conn->query($sql);
        $this->createEventPage($titlu, $despre, $data, $sponsors, $location);
    }

    public function checkCredentials($username, $password, $table) {
        $db = new mysqli($this->host, $this->username, $this->password, $this->database);
        $sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password'";
        $result = $db->query($sql);
        if ($result->num_rows === 1) {
            return true;
        } else {
            return false;
        }
    }


    public function getEvents() {
        $db = new mysqli($this->host, $this->username, $this->password, $this->database);
        $sql = "SELECT * FROM eveniment";
        $result = $db->query($sql);

        return $result;
    }

    function removeEvent($eventId) {
        // Create and execute a query to fetch the event details
        $connection = new mysqli('localhost', 'root', '', 'proiect_php_oop_2');
        $sql = "DELETE FROM eveniment WHERE id = $eventId";
        $result = $connection->query($sql);
    }

    function fetchEventById($eventId) {
        // Create and execute a query to fetch the event details
        $connection = new mysqli('localhost', 'root', '', 'proiect_php_oop_2');
        $sql = "SELECT * FROM eveniment WHERE id = $eventId";
        $result = $connection->query($sql);
    
        if ($result) {
            if ($result->num_rows == 1) {
                // Fetch and return the event data
                $eventData = $result->fetch_assoc();
                return $eventData;
            } else {
                // Event not found
                return null;
            }
        } else {
            // Query execution failed
            return null;
        }
    }

    public function createEventPage($titlu, $despre, $data, $sponsors, $location) {
        $htmlContent = "<!DOCTYPE html>
        <html>
        <head>
            <title>Generated HTML</title>
        </head>
        <body>
            <h1>Hello, World!</h1>
            <p>Titlul evenimentului: $titlu</p>
            <p>Descrierea evenimentului: $despre</p>
            <p>Data evenimentului: $data</p>
            <p>Sponsorii evenimentului: $sponsors</p>
            <p>Locatia evenimentului: $location</p>
        </body>
        </html>";
        
        // Define the path to the HTML file you want to create
        // $filePath = "./generated_html.html";
        $filePath = "./" . $titlu . ".html";
        // var_dump(file_put_contents($filePath, $htmlContent));
        // Use file_put_contents to create or overwrite the HTML file
        if (file_put_contents($filePath, $htmlContent) !== false) {
            echo "HTML file generated successfully at $filePath";
        } else {
            echo "Failed to generate the HTML file.";
        }
    }
    
    function updateEvent($eventId, $newTitle, $newDescription, $newDate, $newLocation, $newSponsors) {
    
        // Create and execute a query to update the event details
        $connection = new mysqli('localhost', 'root', '', 'proiect_php_oop_2');
        $sql = "UPDATE eveniment
                SET titlu = '$newTitle', despre = '$newDescription', sponsors = '$newSponsors', location = '$newLocation'
                WHERE id = $eventId";
                // Changing the date and time not working yet.
        $result = $connection->query($sql);
    
        if ($result) {
            return true; 
        } else {
            return false; 
        }
    }
    
}

class User {
    private $db;
    private $loggedIn = false;
    private $username;

    public function __construct($database) {
        $this->db = $database;
    }

    public function loginAdmin($username, $password) {
        // Verify user credentials against the database.
        $userExists = $this->db->checkCredentials($username, $password, 'admins');

        if ($userExists) {
            $this->loggedIn = true;
            $this->username = $username;
            $_SESSION['username'] = $username;
        }
    }

    public function loginUser($username, $password) {
        // Verify user credentials against the database.
        $userExists = $this->db->checkCredentials($username, $password, 'users');

        if ($userExists) {
            $this->loggedIn = true;
            $this->username = $username;
            $_SESSION['username'] = $username;
        }
    }

    public function logout() {
        // End the user's session or revoke the authentication token.
        $this->loggedIn = false;
        $this->username = null;
        session_destroy();
    }

    public function isLoggedIn() {
        return $this->loggedIn;
    }

    public function getUsername() {
        return $this->username;
    }
}

session_start();