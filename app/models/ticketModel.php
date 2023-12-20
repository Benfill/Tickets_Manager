<?php
class ticketModel
{
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
    private $comment;
    private $comment_user_id;

    function __set($property, $value)
    {
        $this->$property = $value;
    }

    function __get($property)
    {
        return $this->$property;
    }

    function insertTicket($conn)
    {
        $sql = "INSERT INTO ticket (user_id, subject, priority, status, description, deadline, date) VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "issssii", $this->creator, $this->subject, $this->priority, $this->status, $this->description, $this->deadline, $this->date);
        mysqli_stmt_execute($stmt);
        return mysqli_insert_id($conn);
    }
    function insertAssignment($conn, $ticket_id, $user_id) {
        $sql = "INSERT INTO assignment (ticket_id, user_id) VALUES ($ticket_id, $user_id)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        echo $stmt->error;
    }

    function displayOneTicket($conn)
    {
        $sql = "SELECT ticket.*, user.username FROM ticket
                INNER JOIN user ON ticket.user_id=user.user_id
                WHERE ticket_id=? AND is_deleted=0";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $this->ticket_id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        echo $stmt->error;
        return mysqli_fetch_assoc($res);
    }

    function displayAllTickets($conn) {
        $sql = "SELECT tickets.*, users.* 
        FROM ticket AS tickets
        INNER JOIN user AS users ON tickets.user_id = users.user_id";

        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        $tickets = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $tickets[] = $row;
        }
        return $tickets;
    }


    function displayComments($conn)
    {
        $sql = "SELECT comment.*, user.* FROM comment
                INNER JOIN user ON comment.user_id=user.user_id
                WHERE ticket_id=?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "i", $this->ticket_id);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        $comments = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $comments[] = $row;
        }
        return $comments;
    }

    function createComment($conn)
    {
        $sql = "INSERT INTO comment (comment, ticket_id, user_id) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sii", $this->comment, $this->ticket_id, $this->comment_user_id);
        mysqli_stmt_execute($stmt);
    }

}