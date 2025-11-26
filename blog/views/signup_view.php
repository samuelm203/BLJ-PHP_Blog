<?php
require "views/templates/header.php";
?>
<div class="signup-container">
    <p class="signup-card-titel">Sign up</p>

    <form method="post" action="signup">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <div>
            <button type="submit">Create account</button>
        </div>
    </form>
</div>