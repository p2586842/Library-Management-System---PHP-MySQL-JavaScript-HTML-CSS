<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

echo "Welcome, User!";
echo "<a href='logout.php'>Logout</a>";
?>
