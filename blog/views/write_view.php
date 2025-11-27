<?php
    require "views/templates/header.php";
    require __DIR__ . '/../models/write_model.php';
?>

<div class="container">
    <section class="write">
        <div class="write-title-banner">Write your Blog</div>

        <div class="editor-card">
            <form action="" method="post">
                <div class="field-group">
                    <label for="title" class="field-label">Titel</label>
                    <input type="text" id="title" name="title" class="input" placeholder="Lorem Ipsum" required>
                </div>

                <div class="field-group">
                    <label for="content" class="field-label">Content</label>
                    <textarea id="content" name="content" class="textarea" rows="3" placeholder="Write your Blog Entry…" required></textarea>
                </div>

                <div class="actions">
                    <div class="field-group image-field-group">
                        <lael for="image" class="field-label">Picture</lael>
                        <textarea id="text-image" name="image" class="textarea" rows="1" placeholder="Insert an image link here…"></textarea>
                    </div>
                    <button type="submit" class="btn primary">Send it</button>
                </div>
            </form>
        </div>
    </section>
</div>

<footer>
    <?php require "views/templates/footer.php" ?>
</footer>