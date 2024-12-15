<?php
require 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("UPDATE books SET availability = FALSE WHERE id = ?");
    if ($stmt->execute([$book_id])) {
        $stmt = $pdo->prepare("INSERT INTO borrowed_books (user_id, book_id, borrow_date) VALUES (?, ?, NOW())");
        $stmt->execute([$user_id, $book_id]);
        echo "Book borrowed successfully.";
    }
}
?>
