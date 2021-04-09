<?php

if (!isset($_GET['category']) && !isset($_GET['id'])) {
    echo "error 404. File not found! Please look check your url and try again";
} else if (isset($_GET['category']) && isset($_GET['id'])) {

    $category = str_replace(' ', '-', $_GET['category']);
    $category_without_dash = str_replace('-', ' ', $category);
    $blog_id = $_GET['id'];

    // Include connection file
    include_once '../assets/connection.php';

    // Include Header
    include './includes/header.php';

    // Include file to fetch post data from the database
    include '../assets/handle_fetch_post.php';


    // Get post details
    $post_title = $posts['BLOG_TITLE'];
    $post_username = $posts['USER_FNAME'] . " " . $posts['USER_LNAME'];
    $post_date = $posts['BLOG_POST_DATE'];
    $post_image = $posts['BLOG_IMAGE'];
    $post_content = $posts['BLOG_CONTENT'];

    // Include Intro-Section
    include './includes/intro_section_2.php';

?>
    <main>
        <section class="single-post-setion">
            <h1>
                <?php echo $post_title; ?>
            </h1>
            <div class="post-details">
                <h2 class="author"><a href="#"><?php echo $post_username; ?></a></h2>
                <span>&nbsp;|&nbsp</span>
                <h2 class="post-date"><?php echo $post_date; ?></h2>
            </div>
            <div class="post-image">
                <img src="<?php echo '../uploads/'. $post_image; ?>">
            </div>
            <p class="post-content"><?php echo $post_content; ?></p>
        </section>
    </main>
    </body>

    </html>

<?php
}
?>