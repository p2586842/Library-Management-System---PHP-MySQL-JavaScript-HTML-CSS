<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $borrow_id = $_POST['borrow_id'];

    $stmt = $pdo->prepare("UPDATE borrowed_books SET status = 'returned', return_date = NOW() WHERE id = ?");
    $stmt->execute([$borrow_id]);
    echo "Book returned successfully.";
}
?>
