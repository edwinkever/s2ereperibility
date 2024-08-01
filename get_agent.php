<?php
include 'config.php';

$today = date('Y-m-d');
$current_time = date('H:i:s');

$sql = "SELECT a.name, a.extension FROM shifts s
        JOIN agents a ON s.agent_id = a.id
        WHERE s.shift_date = '$today' AND s.shift_time <= '$current_time'
        ORDER BY s.shift_time DESC LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $agent = $result->fetch_assoc();
    echo json_encode($agent);
} else {
    echo json_encode(["error" => "No agent on duty"]);
}

$conn->close();
?>
