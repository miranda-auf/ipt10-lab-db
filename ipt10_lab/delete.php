<?php
require_once "db_connect.php";

$id = $_GET["id"] ?? "";

if ($id === "") {
    die("Student ID is required.");
}

$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

header("Location: index.php");
exit;
?>