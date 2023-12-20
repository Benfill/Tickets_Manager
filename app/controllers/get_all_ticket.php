<?php
require_once "../config/config.php";
require_once "../../app/libraries/ticket.php";
require_once "../../app/libraries/tag.php";
require_once "../../app/libraries/assignment.php";
require_once "../../app/models/tagModel.php";

$tag = new tag();
$tagModel = new tagModel();
$ticket = new ticket();
$assign = new assignment();
$tickets = $ticket->displayAllTickets($conn);

$tags = $tag->GetSpecificTags($conn, 17, $tagModel);
$assignment = $assign->getAssignment($conn, 17);


foreach ($tickets as $oneTicket) {
    $ticketTag = $tag->GetSpecificTags($conn, $oneTicket["ticket_id"], $tagModel);
    $ticketAssign = $assign->getAssignment($conn, $oneTicket["ticket_id"]);

$ticketsData[] = [
    "subject" => $oneTicket["subject"],
    "description" => $oneTicket["description"],
    "status" => $oneTicket["status"],
    "priority" => $oneTicket["priority"],
    "tags" => $ticketTag,
    "assign" => $ticketAssign,
    "creator" => $oneTicket["username"],
    "picture" => $oneTicket["picture"],
];
}
echo json_encode($ticketsData);
