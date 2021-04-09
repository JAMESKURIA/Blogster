<?php
include '../public/includes/header.php';
include './includes/user_menu.php';
?>

<!-- Main -->
<main id='user-other-pages-main'>
    <section class="change-password-section">
        <!-- Old password -->
        <div class="old-password">
            <label for="old-password">Old Password</label>
            <input type="text" name="old-password" id="old-password">
        </div>

        <!-- New password -->
        <div class="new-password">
            <label for="new-password">New Password</label>
            <input type="text" name="new-passsword" id="new-password">
        </div>

        <!-- Confirm password -->
        <div class="confirm-password">
            <label for="confirm-password">Confirm New Password</label>
            <input type="text" name="confirm-password" id="confirm-password">
        </div>

        <!-- Save Changes -->
        <button type="submit">Save Changes</button>
    </section>
</main>