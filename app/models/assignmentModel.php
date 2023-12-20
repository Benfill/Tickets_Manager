<?php
class assignmentModel {
    private $conn;
    function getAssignments($conn, $ticket_id) {
        $this->conn = $conn;
        $sql = "SELECT user.*, assignment.ticket_id FROM assignment
           JOIN user ON assignment.user_id=user.user_id
           WHERE ticket_id='$ticket_id'";
        $res = $this->conn->query($sql);
        $assignData = [];
        while ($row = $res->fetch_assoc()) {
            $assignData[] = $row;
        }
        return $assignData;
    }
}