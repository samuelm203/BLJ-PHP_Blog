<?php

require_once __DIR__ . '/../core/database.php';

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        $title = htmlspecialchars(trim($_POST['title'] ?? ''));
        $content = htmlspecialchars(trim($_POST['content'] ?? ''));

        $image = filter_var(trim($_POST['image'] ?? ''), FILTER_SANITIZE_URL);

        //Todo: Muss mit UserID aus Session ersetzt werden

        $userID = 1;

        if (empty($title) || empty($content)) {
            throw new Exception('Titel und Inhalt dürfen nicht leer sein.');
        }

        $pdo = connectToLocalDatabase();

        $stmt = $pdo->prepare("
            INSERT INTO post (Titel, Content, Image, UserID, Timestamp) 
            VALUES (:title, :content, :image, :userID, NOW())
        ");

        $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':image' => $image,
            ':userID' => $userID
        ]);

        header('Location: write');
        exit;

    } catch (Exception $e) {
        $message = 'Fehler beim Speichern des Beitrags: ' . $e->getMessage();
        $messageType = 'error';
    }
}

