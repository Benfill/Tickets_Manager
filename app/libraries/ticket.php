<?php
class ticket {
    function createTicket ($subject, $deadline, $assignment, $tag, $priority, $status, $description, $date, $conn) {
        require_once "../models/ticketModel.php";
        $ticketModel = new ticketModel();

        $ticketModel->__set("subject", $subject);
        $ticketModel->__set("assignment", $assignment);
        $ticketModel->__set("tag", $tag);
        $ticketModel->__set("priority", $priority);
        $ticketModel->__set("status", $status);
        $ticketModel->__set("description", $description);
        $ticketModel->__set("deadline", $deadline);
        $ticketModel->__set("date", $date);
        $ticketModel->insertTicket($conn);
    }


}