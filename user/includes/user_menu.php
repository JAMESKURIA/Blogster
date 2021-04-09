<!-- Session -->
<?php
if (!isset($_SESSION)) {
    session_start();
}

$filepath = $_SERVER["SCRIPT_FILENAME"];
$filename = basename($filepath);
$dirname = basename(dirname($filepath));


// Check if user is logged in, else send to login page
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
    $profession = $_SESSION['profession'];
} else {
    header("Location: ../public/login.php");
}

?>

<aside class="aside-section">
    <!-- card -->
    <section class="profile-card">
        <!-- image -->
        <div class="profile-card-image">
            <img src="../images//pexels-luriko-yamaguchi-2804282.jpg" alt="Photo by Luriko Yamaguchi from Pexels">
        </div>
        <div class="text">
            <!-- user name -->
            <h2 class="user-name">Hi&nbsp;<span><?php echo $user_name; ?></span>,</h2>
            <!-- user profession -->
            <h3 class="user-profession"><?php echo $profession; ?></h3>
        </div>
    </section>

    <!-- Links -->
    <ul class="user-navlinks">
        <!-- Dashboard -->
        <?php
        if ($filename == 'user.php') {
            echo "<li class='active'><a href='./user.php'>Dashboard</a></li>";
        } else {
            echo "<li><a href='./user.php'>Dashboard</a></li>";
        }
        ?>

        <li><a href="#">Profile</a></li>
        <li><a href="#">Portfolio</a></li>
        <!-- Post Blog -->
        <?php
        if ($filename == 'post_blog.php') {
            echo "<li class='active'><a href='./post_blog.php'>Post Blog</a></li>";
        } else {
            echo "<li><a href='./post_blog.php'>Post Blog</a></li>";
        }
        ?>

        <!-- Manage Posts -->
        <?php
        if ($filename == 'manage_posts.php') {
            echo "<li class='active'><a href='./manage_posts.php'>Manage Posts</a></li>";
        } else {
            echo "<li><a href='./manage_posts.php'>Manage Posts</a></li>";
        }
        ?>

        <!-- Change Password -->
        <?php
        if ($filename == 'change_password.php') {
            echo "<li class='active'><a href='./change_password.php'>Change Password</a></li>";
        } else {
            echo "<li><a href='./change_password.php'>Change Password</a></li>";
        }
        ?>
        <li><a href="./logout.php">Logout</a></li>
    </ul>
</aside>