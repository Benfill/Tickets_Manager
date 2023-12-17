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
        return $ticketModel->insertTicket($conn);
    }

    function displayTicket($conn, $ticket_id) {
        require_once "../../app/models/ticketModel.php";
        $ticketModel = new ticketModel();

        $ticketModel->__set("ticket_id", $ticket_id);
        return $ticketModel->displayOneTicket($conn);
    }


}