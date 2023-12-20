<?php
class assignment {
    function getAssignment($conn, $ticket_id) {
        $assign = new assignmentModel();
        return $assign->getAssignments($conn, $ticket_id);
    }
}