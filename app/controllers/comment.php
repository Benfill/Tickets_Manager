<?php
require_once "../config/config.php";
require_once "../libraries/ticket.php";

$ticket = new ticket;
$ticket_id = $_SESSION["ticket_id"];
if(isset($_POST["comment"])) {
    // Form was submitted, process the data
    $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_SPECIAL_CHARS);
    $user_id = $_POST["user_id"];
    $ticket_id = $_POST["ticket_id"];
    if ($comment !== "")
        $ticket->insertComment($conn, $comment, $user_id, $ticket_id);
    // Send a response back to the client (this is just an example)
}


$comments = $ticket->displayComments($conn, $ticket_id);

foreach ($comments as $oneComment)
$commentsData[] = array (
    "comment" => $oneComment["comment"],
    "user" => $oneComment["username"],
    "picture" => $oneComment["picture"],
);
echo (json_encode($commentsData));




