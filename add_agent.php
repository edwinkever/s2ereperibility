<?php
include 'config.php';

$name = $_POST['name'];
$extension = $_POST['extension'];

$sql = "INSERT INTO agents (name, extension) VALUES ('$name', '$extension')";

if ($conn->query($sql) === TRUE) {
    echo "New agent added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
