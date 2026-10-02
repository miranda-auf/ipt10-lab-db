<?php

require_once "config.php";

if (!isset($_GET["id"])) {
    die("Student ID is missing.");
}

$id = $_GET["id"];

$sql = "DELETE FROM students WHERE id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$id]);

header("Location: index.php");

exit;

?>