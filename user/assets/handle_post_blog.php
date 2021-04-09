<?php
// session
if (!isset($_SESSION)) {
    session_start();
}


// Check if user is logged in, else send to login page
if (isset($_SESSION['user_name'])) {
    $user_id = $_SESSION['user_id'];
    $user_fname = $_SESSION['user_name'];
    $user_lname = $_SESSION['user_lname'];
    $user_full_name = $user_fname . ' ' . $user_lname;
} else {
    header("Location: ../public/login.php");
}

// Include connection file
include '../assets/connection.php';
include  '../assets/fetch_categories.php';

// POST BLOG
if (isset($_POST['post-blog-button'])) {
    // echo "<script>alert('HEY NOW BROWN COW')</script>";

    // Get all user inputs 
    $blog_title = $_POST['blog-title'];
    $blog_category = $_POST['category'];
    $blog_content = $_POST['blog-content'];
    $image_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $folder = '../uploads/' . $image_name;

    // Check existence of the blog under user's name,
    $query = "SELECT * FROM BLOGS WHERE BLOG_TITLE = '$blog_title' AND BLOG_USER_ID = $user_id";
    $result = mysqli_query($db, $query);
    $numrows = mysqli_num_rows($result);

    // If blog exists alert user
    if ($numrows > 0) {
        echo "<script>alert('You already posted a blog under this title')</script>";
    }
    // If blog does not exist, insert data to blogs table
    else {
        $category_id = '';

        foreach ($categories as $category) {
            $category_name = $category['CATEGORY_NAME'];

            if ($blog_category == $category_name) {
                $category_id = $category['CATEGORY_ID'];
                $category_post = $category['CATEGORY_NO_OF_POSTS'];

                // Check if image name is empty, if true, assign default image
                if ($image_name == '') {
                    $image_name = $category['CATEGORY_DEFAULT_IMAGE'];
                }

                // Update number of posts in the categories table
                $sql = "UPDATE CATEGORIES SET CATEGORY_NO_OF_POSTS = $category_post + 1 WHERE CATEGORY_ID = $category_id";
                mysqli_query($db, $sql);
            }
        }

        $insert_into_blogs_query = "INSERT INTO BLOGS (BLOG_CATEGORY,
                                                       BLOG_TITLE,
                                                       BLOG_AUTHOR,
                                                       BLOG_IMAGE,
                                                       BLOG_CONTENT,
                                                       BLOG_USER_ID,
                                                       BLOG_CATEGORY_ID)
                                                       VALUES('$blog_category',
                                                              '$blog_title',
                                                              '$user_full_name',
                                                              '$image_name',
                                                              '$blog_content',
                                                              $user_id,
                                                              $category_id)";



        // If adding to database was successful, upload image
        if (mysqli_query($db, $insert_into_blogs_query)) {
            move_uploaded_file($tmp_name, $folder);
            echo "<script>alert('successfully uploaded')</script>";
        } else {
            echo "<script>alert('There was an error uploading the post. Contact admin')</script>";
        }
    }
}
