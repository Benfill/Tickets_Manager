<?php
class ticket {
    function createTicket ($creator, $subject, $deadline, $assignment, $tag, $priority, $status, $description, $date, $conn) {
        require_once "../models/ticketModel.php";
        $ticketModel = new ticketModel();

        $ticketModel->__set("subject", $subject);
        $ticketModel->__set("creator", $creator);
        $ticketModel->__set("assignment", $assignment);
        $ticketModel->__set("tag", $tag);
        $ticketModel->__set("priority", $priority);
        $ticketModel->__set("status", $status);
        $ticketModel->__set("description", $description);
        $ticketModel->__set("deadline", $deadline);
        $ticketModel->__set("date", $date);

        $ticket_id = $ticketModel->insertTicket($conn);
        foreach ($assignment as $assignedTo) {
            $ticketModel->insertAssignment($conn, $ticket_id, $assignedTo);
        }
        return $ticket_id;
    }

    function displayTicket($conn, $ticket_id) {
        require_once "../../app/models/ticketModel.php";
        $ticketModel = new ticketModel();

        $ticketModel->__set("ticket_id", $ticket_id);
        return $ticketModel->displayOneTicket($conn);
    }

    function displayComments($conn, $ticket_id) {
        require_once "../../app/models/ticketModel.php";
        $ticketModel = new ticketModel();

        $ticketModel->__set("ticket_id", $ticket_id);
        return $ticketModel->displayComments($conn);
    }

    function insertComment($conn, $comment, $user_id, $ticket_id) {
        require_once "../../app/models/ticketModel.php";
        $ticketModel = new ticketModel();

        $ticketModel->__set("ticket_id", $ticket_id);
        $ticketModel->__set("comment", $comment);
        $ticketModel->__set("comment_user_id", $user_id);

        $ticketModel->createComment($conn);
    }

}