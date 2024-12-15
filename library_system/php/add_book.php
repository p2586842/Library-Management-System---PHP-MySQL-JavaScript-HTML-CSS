<?php
require 'config.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    $stmt = $pdo->prepare("INSERT INTO books (title, author, category) VALUES (?, ?, ?)");
    if ($stmt->execute([$title, $author, $category])) {
        echo "Book added successfully.";
    } else {
        echo "Error adding book.";
    }
}
?>
