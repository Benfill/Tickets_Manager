<?php
session_start();
$url = "http://localhost/benfillous-anass_tickets_manager/";

class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "ticket";
    private $conn;

    function __construct(){
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbName);
        $sql = "CREATE DATABASE IF NOT EXISTS " . $this->dbName;
        $this->conn->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS user (user_id INT PRIMARY KEY AUTO_INCREMENT, username TEXT, email TEXT UNIQUE, password TEXT, picture text)";
        $this->conn->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS tag (tag_id INT PRIMARY KEY AUTO_INCREMENT, tag TEXT UNIQUE)";
        $this->conn->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS comment (comment_id INT PRIMARY KEY AUTO_INCREMENT, comment TEXT, user_id INT, ticket_id INT,
                FOREIGN KEY (ticket_id) REFERENCES ticket(ticket_id),
                FOREIGN KEY (user_id) REFERENCES user(user_id))";
        $this->conn->query($sql);

       $sql = "CREATE TABLE IF NOT EXISTS ticket (ticket_id INT PRIMARY KEY AUTO_INCREMENT, subject TEXT, description TEXT, status TEXT, priority text, date INT, deadline INT, is_deleted TINYINT(1) DEFAULT 0,
            user_id INT,
            FOREIGN KEY (user_id) REFERENCES user(user_id)";
        $this->conn->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS tag_ticket (ticket_id INT, tag_id INT,
                FOREIGN KEY (ticket_id) REFERENCES ticket(ticket_id),
                FOREIGN KEY (tag_id) REFERENCES tag(tag_id))";
        $this->conn->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS assignment (ticket_id INT, user_id INT,
                FOREIGN KEY (ticket_id) REFERENCES ticket(ticket_id),
                FOREIGN KEY (user_id) REFERENCES user(user_id))";
        $this->conn->query($sql);

        $sql = "INSERT INTO tag (tag) VALUES 
    ('SoftwareIssue'), 
    ('HardwareProblem'), 
    ('NetworkTrouble'), 
    ('SecurityConcern'), 
    ('AccountAccess')
    ON DUPLICATE KEY UPDATE tag = VALUES(tag)";
        $this->conn->query($sql);
    }

    function connection() {
        return ($this->conn);
    }
}


$database = new Database();
$conn = $database->connection();


