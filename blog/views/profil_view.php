<?php
require 'views/templates/header.php';

require_once 'models/seemyblogpost_model.php';

require_once 'models/resetpassword_model.php';

if (!isset($posts) || !is_array($posts)) {
    $posts = [];
}

require_once 'core/database.php';
$userID = $_SESSION['user_id'] ?? 0;

if (empty($userID)) {
    header('Location: login');
    exit;
}

$userName = '';
$userEmail = '';
$userPasswordDisplay = '*****';

try {
    $pdo = connectToLocalDatabase();

    $stmt = $pdo->prepare("SELECT Name, Email FROM user WHERE UserId = :id");
    $stmt->execute([':id' => $userID]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $userName = htmlspecialchars($user['Name']);
        $userEmail = htmlspecialchars($user['Email']);
    } else {
        header('Location: logout');
        exit;
    }

} catch (Exception $e) {
    echo '<div class="error-message">Error connecting to the database.</div>';
}

?>

<div class="profil">
    <div class="profil-titel-banner">Your Profil</div>

    <div class="profil-card-informations" id="profile-info-box">
    <p class="profil-card-informations-p">Your Username: <?= $userName ?></p>
        <p class="profil-card-informations-p">Your Email: <?= $userEmail ?></p>
        <p class="profil-card-informations-p">Your Password: <?= $userPasswordDisplay ?></p>
    </div>

    <div class="profil-card-informations password-box visually-hidden">
        <form action="" method="post">
            <div class="floating-group">
                <input type="password" id="password-old" name="old_password" required placeholder=" ">
                <label for="password-old">Old Password</label>
            </div>

            <div class="floating-group">
                <input type="password" id="password-new" name="new_password" required placeholder=" ">
                <label for="password-new">New Password</label>
            </div>

            <button type="submit" class="password-submit-btn">Save Password</button>
        </form>
    </div>

    <div class="visually-hidden"
        <?php foreach ($posts as $post) : ?>
            <div class="post-card">
                <h2 class="post-card-title"><?= htmlspecialchars($post["Titel"]) ?></h2>

            <div class="img-p-container">
                <p class="post-card-text"><?= htmlspecialchars($post["Content"]) ?></p>
                <?php
                if (empty($post["Image"])) {
                    echo "";
                } else {
                    echo '<img src="' . htmlspecialchars($post["Image"]) . '" class="post-card-img" alt="User input Image">';
                }
                ?>
            </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="profil-card-options">
        <a href="logout" class="nav-link">Log out</a>

        <a href="503" class="nav-link change-password-box">Change Password</a>

        <a href="503" class="nav-link">See my post's</a>

        <a href="503" class="nav-link">Change Email</a>

        <a href="503" class="nav-link">Delete your Account</a>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const changePasswordLink = document.querySelector(".change-password-box");
        const passwordBox = document.querySelector(".password-box");
        const profileInfoBox = document.getElementById("profile-info-box");

        if (!changePasswordLink || !passwordBox || !profileInfoBox) {
            console.error("Element not found:", changePasswordLink, passwordBox, profileInfoBox);
            return;
        }

        changePasswordLink.addEventListener("click", function(e) {
            e.preventDefault();

            passwordBox.classList.toggle("visually-hidden");

            profileInfoBox.classList.toggle("visually-hidden");
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const seePostsLink = document.querySelector(".nav-link[href='503']:not(.change-password-box)");
        const postsBox = document.querySelector(".visually-hidden:not(.password-box)");
        const profileInfoBox = document.getElementById("profile-info-box");
        const passwordBox = document.querySelector(".password-box");

        if (!seePostsLink || !postsBox || !profileInfoBox) {
            console.error("Element not found:", seePostsLink, postsBox, profileInfoBox);
            return;
        }

        seePostsLink.addEventListener("click", function(e) {
            e.preventDefault();

            postsBox.classList.toggle("visually-hidden");

            profileInfoBox.classList.add("visually-hidden");
            passwordBox.classList.add("visually-hidden");
        });
    });
</script>

<footer>
    <?php require "views/templates/footer.php" ?>
</footer>
