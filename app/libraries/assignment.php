<?php
class assignment {
    function getAssignment($conn, $ticket_id) {
        require_once "../models/assignmentModel.php";
        $assign = new assignmentModel();
        return $assign->getAssignments($conn, $ticket_id);
    }
}