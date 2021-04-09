<?php
// include connection file
include '../assets/connection.php';

// Include Header
include './includes/header.php';


if (isset($_GET['category'])) {
    $category = str_replace('-', ' ', $_GET['category']);

    // Include Intro-Section
    include './includes/intro_section_2.php';

    // Join users and blogs tables and select blog id, blog title, user first name and last name, ad blog post date
    $query = "SELECT BLOG_ID, BLOG_TITLE, BLOG_IMAGE, USER_FNAME, USER_LNAME, BLOG_POST_DATE FROM USERS INNER JOIN BLOGS ON BLOGS.BLOG_USER_ID = USERS.USER_ID WHERE BLOG_CATEGORY = '$category'";
    $result = mysqli_query($db, $query);

    // fetch the result of the query
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // check for number of row; if 0, print 'nothing to display' else print the data
    $numrows = mysqli_num_rows($result);

    if ($numrows <= 0) {
?>
        <!-- Posts on chosen category -->
        <section class="featured-tenders">
            <h1>Featured Posts on <span class="cat"><?php echo $category; ?></span></h1>
            <div class="short-details">
                <h4 style="font-weight:normal;">Oops!&nbsp; Currently no blogs to display</h4>
            </div>
        </section>

    <?php
    } else {
    ?>
        <!-- Main Section -->
        <main>
            <!-- Posts on chosen category -->
            <section class="featured-tenders">
                <h1>Featured Posts on <span class="cat"><?php echo $category; ?></span></h1>
                <?php
                foreach ($categories as $db_category) {
                ?>
                    <div class="tender">
                        <div class="company-logo">
                            <img src="<?php echo '../uploads/' . $db_category['BLOG_IMAGE']; ?>">
                        </div>
                        <div class="short-details">
                            <!-- <a class="blog-category" href="#"><?php echo $category; ?></a> -->
                            <h3><?php echo $db_category['BLOG_TITLE'] ?></h3>
                            <h4>Posted on <span class="post-date"><?php echo $db_category['BLOG_POST_DATE'] ?></span></h4>
                            <h4>Author: <span class="owner"><?php echo $db_category['USER_FNAME'] . " " . $db_category['USER_LNAME'] ?></span></h4>
                        </div>
                        <button class="browse-tender" onclick="browsePost(<?php echo $db_category['BLOG_ID'] ?>)">Read More</button>
                    </div>

                <?php
                }
                ?>

            </section>
        </main>
<?php
    }
}

?>

<script>
    const browsePost = (blog_id) => {
        const blogId = blog_id;
        document.location.href = `./single_post.php?category=<?php echo str_replace(' ', '-', $category); ?>&id=${blogId}`;
    }
</script>
</body>

</html>