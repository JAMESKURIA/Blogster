<!-- Include Headers -->
<?php
include '../public/includes/header.php';
include './includes/user_menu.php';
include './assets/handle_post_blog.php';
include '../assets/fetch_categories.php';
?>


<!-- Post Blog Main -->
<main id="user-other-pages-main">
    <?php //echo test here
    // var_dump($blog_category);
    ?>
    <!-- Post Tender Section -->
    <form form action="./post_blog.php" method="POST" enctype="multipart/form-data" class="post-section">
        <h1>Share your story with the world</h1>
        <h2>Post a blog and let everyone read it!</h2>

        <div class="inputs">
            <div class="name">
                <label for="blog-title">Blog Title: </label>
                <input type="text" name="blog-title" id="blog-title" placeholder="e.g. General Ledger Accountant" required>
            </div>


            <div class="blog-category">
                <label for="category">Category: </label>
                <select name="category" id="category" required>
                    <option value="category" selected disabled hidden style="color: #757575;">Category</option>

                    <!-- options from the cateories available in the database -->
                    <?php
                    foreach ($categories as $category) {
                        $category_name = $category['CATEGORY_NAME'];
                    ?>
                        <option value="<?php echo $category_name ?>"><?php echo $category_name ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="upload-section">
            <input type="file" name="file" id="file"><span>Upload main blog image</span>
            <!-- <button>+ Upload Image</button>
                <p>Drag & Drop the main post image</p> -->
        </div>

        <!-- <div class="blog-content">
            <label for="blog-content">Blog Content: </label>
            <textarea name="blog-content" id="blog-content" cols="30" rows="10" placeholder="Write a captivating story to get more viewers" required></textarea>
        </div>  -->

        <div class="blog-content">
            <textarea name="blog-content" id="editor"></textarea>
        </div>


        <button type="submit" id="post-blog-button" name="post-blog-button">Post Blog</button>

    </form>
</main>

<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace("editor");
</script>
</body>

</html>