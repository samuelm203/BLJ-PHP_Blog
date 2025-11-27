<?php
require "views/templates/header.php";

$pdo = new PDO(
        'mysql:host=10.10.20.188;dbname=urs',
        'bljuser',
        'hallo123',
        [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]
);

$stmt = $pdo->prepare('SELECT * FROM bljblogs');
$stmt->execute();
$bloggers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <section class="friends">
        <div class="friends-title-banner">BLJ</div>

        <div class="friends-grid">
            <?php foreach ($bloggers as $blogger): ?>
                <div class="friend-card">
                    <a class="friend-card-name" target="_blank"
                       href="<?= htmlspecialchars($blogger["blog_url"]) ?>"
                       class="friend-name-link">
                        <?= htmlspecialchars($blogger["name_lernender"]) ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <?php require "views/templates/footer.php" ?>
    </footer>
</div>
