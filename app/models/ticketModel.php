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
        $sql = "INSERT INTO ticket (user_id, subject, tag_id, priority, status, description, deadline, date) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "isisssii", $this->creator, $this->subject, $this->tag, $this->priority, $this->status, $this->description, $this->deadline, $this->date);
        mysqli_stmt_execute($stmt);
        $ticket_id = mysqli_insert_id($conn);

        return $ticket_id;
    }
    function insertAssignment($conn, $ticket_id, $user_id) {
        $sql = "INSERT INTO assignment (ticket_id, user_id) VALUES ($ticket_id, $user_id)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
    }

    function displayOneTicket($conn)
    {
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