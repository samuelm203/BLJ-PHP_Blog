<?php
    require "views/templates/header.php";
?>

<div class="login-container">
    <p class="login-card-titel">Login</p>

    <form method="post" action="login">
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <button type="submit">Log in</button>
        </div>
    </form>
</div>