<?php
$post_query = "SELECT BLOG_TITLE, USER_FNAME, USER_LNAME, BLOG_POST_DATE, BLOG_IMAGE, BLOG_CONTENT
             FROM USERS INNER JOIN BLOGS ON BLOGS.BLOG_USER_ID = USERS.USER_ID WHERE BLOG_ID = $blog_id";

$post_result = mysqli_query($db, $post_query);

$posts = mysqli_fetch_assoc($post_result);
