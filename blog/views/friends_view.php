<?php
    require "views/templates/header.php"
?>

<div class="container">
    <section class="friends">
        <div class="friends-title-banner">BLJ-Kollegen</div>

        <div class="friends-filters">
            <button class="chip active" type="button" aria-pressed="true">Alle</button>
            <button class="chip" type="button" aria-pressed="false">CSS</button>
            <button class="chip" type="button" aria-pressed="false">Richi</button>
        </div>

        <div class="friends-grid">
            <div class="friend-card">Richi</div>
            <div class="friend-card">Neville</div>
            <div class="friend-card">Damir</div>
            <div class="friend-card">Nik</div>
            <div class="friend-card">Romeo</div>

            <div class="friend-card">Dario W.</div>
            <div class="friend-card">Manuel</div>
            <div class="friend-card">Urs</div>
            <div class="friend-card">Bryan</div>
            <div class="friend-card">...</div>

            <div class="friend-card">...</div>
            <div class="friend-card">...</div>
            <div class="friend-card">...</div>
            <div class="friend-card">...</div>
            <div class="friend-card">...</div>


        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var chips = document.querySelectorAll('.friends-filters .chip');
                chips.forEach(function (chip) {
                    chip.addEventListener('click', function () {
                        chips.forEach(function (c) {
                            c.classList.remove('active');
                            c.setAttribute('aria-pressed', 'false');
                        });
                        chip.classList.add('active');
                        chip.setAttribute('aria-pressed', 'true');
                    });
                });
            });
        </script>
    </section>

    <footer>
        <?php require "views/templates/footer.php" ?>
    </footer>
</div>