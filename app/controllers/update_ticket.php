<?php
require_once "../config/config.php";
require_once "../libraries/ticket.php";
if (isset($_POST["update"])) {
    header("Content-Type: text/plain");

    $subject = filter_input(INPUT_POST, "subject", FILTER_SANITIZE_SPECIAL_CHARS);
    $assignment = $_POST['assignment'];
    $tag = $_POST['tag'];
    $priority = filter_input(INPUT_POST, "priority", FILTER_SANITIZE_SPECIAL_CHARS);
    $status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
    $date = date("U");
    $creator = $_SESSION["user_id"];
    $ticket_id = $_GET['ticket_id'];


    $deadline = filter_input(INPUT_POST, "deadline", FILTER_SANITIZE_NUMBER_INT);
    $deadlineObject = DateTime::createFromFormat('dmY', $deadline);
    $deadline = $deadlineObject->getTimestamp();
    $ticket = new ticket;
    $ticket_id = $ticket->updateTicket($ticket_id, $creator, $subject, $deadline, $assignment, $tag, $priority, $status, $description, $date, $conn);

    header("Location: " . $url . "public/pages/ticket.php?ticket_id=". $ticket_id);
} if (isset($_GET["ticket_id"])) {
    $ticket_id = $_GET['ticket_id'];
    $sql = "UPDATE ticket SET is_deleted=1 WHERE ticket_id='$ticket_id'";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    header("Location: " . $url . "public/");
} else header("Location: " . $url . "public/");