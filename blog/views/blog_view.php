<?php
require 'views/templates/header.php';
require __DIR__ . '/../models/blog_model.php';

if (!isset($posts) || !is_array($posts)) {
    $posts = [];
}

if (empty($Image))

?>

<div class="read">
    <div class="read-titel-banner">Read</div>

    <?php foreach ($posts as $post) : ?>
        <div class="post-card">
            <h2 class="post-card-title"><?= htmlspecialchars($post["Titel"]) ?></h2>

            <div class="img-p-container">
                <p class="post-card-text"><?= htmlspecialchars($post["Content"]) ?></p>
                <img src="<?= htmlspecialchars($post["Image"])?>" class="post-card-img" alt="User input Image">
            </div>

            <p>Geschrieben von:
                <span class="post-card-creator"><?= htmlspecialchars($post["Autor"]) ?></span>
                am
                <span class="post-card-date"><?= htmlspecialchars($post["Timestamp"]) ?></span>
            </p>

            
<!--            <div class="reactions-bar" role="group" aria-label="Reactions">-->
<!--                <button type="button" class="reaction-btn" data-emoji="👍" aria-label="Thumbs up">-->
<!--                    <span class="emoji">👍</span>-->
<!--                    <span class="count" aria-live="polite">0</span>-->
<!--                </button>-->
<!--                <button type="button" class="reaction-btn" data-emoji="❤️" aria-label="Heart">-->
<!--                    <span class="emoji">❤️</span>-->
<!--                    <span class="count" aria-live="polite">0</span>-->
<!--                </button>-->
<!--                <button type="button" class="reaction-btn" data-emoji="😂" aria-label="Funny">-->
<!--                    <span class="emoji">😂</span>-->
<!--                    <span class="count" aria-live="polite">0</span>-->
<!--                </button>-->
<!--                <button type="button" class="reaction-btn" data-emoji="😮" aria-label="Surprised">-->
<!--                    <span class="emoji">😮</span>-->
<!--                    <span class="count" aria-live="polite">0</span>-->
<!--                </button>-->
<!--                <button type="button" class="reaction-btn" data-emoji="👋" aria-label="Wave">-->
<!--                    <span class="emoji">👋</span>-->
<!--                    <span class="count" aria-live="polite">0</span>-->
<!--                </button>-->
<!--            </div>-->

<!--            <div class="comments-section">-->
<!--                <h3>Comments</h3>-->
<!--                <ul class="comments-list"></ul>-->
<!--                <form class="comment-form">-->
<!--                    <div>-->
<!--                        <label class="visually-hidden">Name</label>-->
<!--                        <input type="text" name="name" placeholder="Your name" required>-->
<!--                    </div>-->
<!--                    <div>-->
<!--                        <label class="visually-hidden">Comment</label>-->
<!--                        <input type="text" name="comment" placeholder="Write a comment" required>-->
<!--                    </div>-->
<!--                    <div>-->
<!--                        <button type="submit" class="btn primary">Add comment</button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
        </div>
    <?php endforeach; ?>

</div>

<footer>
    ©2025 by Samuel Ming
</footer>


