<?php
require_once "../config/config.php";
require_once "../libraries/ticket.php";

if (isset($_POST["save"])) {
    header("Content-Type: text/plain");

    $subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS);
    $assignment = $_POST['assignment'];
    $tag = filter_input(INPUT_POST, "tag", FILTER_SANITIZE_SPECIAL_CHARS);
    $priority = filter_input(INPUT_POST, "priority", FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
    $date = date("U");
    $creator = $_SESSION["user_id"];


    $deadline = filter_input(INPUT_POST, "deadline", FILTER_SANITIZE_NUMBER_INT);
    $deadlineObject = DateTime::createFromFormat('dmY', $deadline);
    $deadline = $deadlineObject->getTimestamp();
    $ticket = new ticket;
    $ticket_id = $ticket->createTicket($creator, $subject, $deadline, $assignment, $tag, $priority, $status, $description, $date, $conn);

    header("Location: " . $url . "public/pages/ticket.php?ticket_id=". $ticket_id);
}