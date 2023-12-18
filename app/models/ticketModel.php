<?php
class ticketModel {
    private $ticket_id;
    private $creator;
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
        $sql = "INSERT INTO ticket (user_id, subject, assignment, tag_id, priority, status, description, deadline, date) VALUES (?, ?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "isiisssii", $this->creator, $this->subject, $this->assignment, $this->tag, $this->priority, $this->status, $this->description, $this->deadline, $this->date);
        mysqli_stmt_execute($stmt);

        return mysqli_insert_id($conn);
    }

    function displayOneTicket($conn) {
        $sql = "SELECT ticket.*, tag.tag, user.username FROM ticket
                INNER JOIN tag ON ticket.tag_id=tag.tag_id
                INNER JOIN user ON ticket.user_id=user.user_id
                WHERE ticket_id=? AND is_deleted=0";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $this->ticket_id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($res);
    }

    function displayComments($conn) {
        $sql = "SELECT * FROM comment WHERE ticket_id=?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $this->ticket_id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        $comments = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $comments[] = $row;
        }
        return $comments;
    }
}