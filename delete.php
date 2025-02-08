<?php
include 'connectvalues.php';

if (!isset($_GET['id'])) {
    die("ID not provided.");
}

$id = intval($_GET['id']);
$sql = "DELETE FROM todos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit;
} else {
    die("Error deleting record: " . $conn->error);
}
?>
