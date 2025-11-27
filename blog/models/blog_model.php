<?php

require_once 'core/database.php';

$pdo = connectToLocalDatabase();

$stmt = $pdo->prepare("
    SELECT post.Titel, post.Content, post.Image, post.Timestamp, user.Name AS Autor
    FROM post
    INNER JOIN user ON post.UserID = user.UserID
    ORDER BY post.Timestamp DESC
");

$stmt->execute();
$posts = $stmt->fetchAll();

