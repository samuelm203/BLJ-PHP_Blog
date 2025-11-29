<?php
require_once __DIR__ . '/../core/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        $userID = $_SESSION['user_id'] ?? 0;

        if (empty($userID)) {
            throw new Exception("User not logged in.");
        }

        $pdo = connectToLocalDatabase();

        $stmt = $pdo->prepare("
        SELECT post.Titel, post.Content, post.Image, post.Timestamp
        FROM post
        INNER JOIN user ON post.UserID = user.UserID
        WHERE user.UserID = :userID
        ORDER BY post.Timestamp DESC
");

        $stmt->execute();
        $posts = $stmt->fetchAll();

    } catch (Exception $e) {
        echo '<div class="error-message">' . htmlspecialchars($e->getMessage()) . '</div>';
        exit;
    }
}


