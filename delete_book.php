<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

include "./components/_dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the book ID
    $book_id = intval($_POST['book_id']);

    // Prepare the DELETE statement
    $sql_delete = "DELETE FROM `books` WHERE `id` = ? AND `owner_phone` = ?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param("is", $book_id, $_SESSION['phone']);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
