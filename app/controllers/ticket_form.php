<?php
require_once "../config/config.php";
require_once "../libraries/ticket.php";

if (isset($_POST["save"])) {
    $subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS);
    $assignment = filter_input(INPUT_POST, "assignment", FILTER_SANITIZE_SPECIAL_CHARS);
    $tag = filter_input(INPUT_POST, "tag", FILTER_SANITIZE_SPECIAL_CHARS);
    $priority = filter_input(INPUT_POST, "priority", FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
    $date = date("U");

    $deadline = filter_input(INPUT_POST, "deadline", FILTER_SANITIZE_NUMBER_INT);
    $deadlineObject = DateTime::createFromFormat('dmY', $deadline);
    $deadline = $deadlineObject->getTimestamp();
    $ticket = new ticket;
    $ticket->createTicket($subject, $deadline, $assignment, $tag, $priority, $status, $description, $date, $conn);
}