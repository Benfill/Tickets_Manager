<?php
class ticketModel {
    private $subject;
    private $assignment;
    private $tag;
    private $priority;
    private $status;
    private $description;
    private $deadline;
    private $date;

    function __set($property, $value) {
        $this->$property = $value;
    }
    function __get($property) {
        return $this->$property;
    }

    function insertTicket($conn) {
        $sql = "INSERT INTO ticket (subject, assignment, tag_id, priority, status, description, deadline, date) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssisssii", $this->subject, $this->assignment, $this->tag, $this->priority, $this->status, $this->description, $this->deadline, $this->date);
        mysqli_stmt_execute($stmt);
    }
}