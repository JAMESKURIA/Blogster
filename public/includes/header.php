<!-- Session start -->
<!-- Session -->
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogster</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <?php
    $filepath = $_SERVER["SCRIPT_FILENAME"];
    $filename = basename($filepath);
    $dirname = basename(dirname($filepath));

    // Styles for index.php
    if ($filename == 'index.php') {
        echo "<link rel='stylesheet' href='./public/styles/commons.css'>";
        echo "<link rel='stylesheet' href='./public/styles/index.css'>";
    }

    // Styles for categories.php
    if ($filename == 'categories.php') {
        if ($dirname == 'blogster') {
            echo "<link rel='stylesheet' href='./public/styles/commons.css'>";
            echo "<link rel='stylesheet' href='./public/styles/categories.css'>";
            echo "<link rel='stylesheet' href='./public/styles/featured_blogs.css'>";
        } else {
            echo "<link rel='stylesheet' href='../public/styles/commons.css'>";
            echo "<link rel='stylesheet' href='../public/styles/categories.css'>";
            echo "<link rel='stylesheet' href='../public/styles/featured_blogs.css'>";
        }
    }

    // Styles for login.php
    if ($filename == 'login.php') {
        if ($dirname == 'blogster') {
            echo "<link rel='stylesheet' href='./public/styles/commons.css'>";
            echo "<link rel='stylesheet' href='./public/styles/login.css'>";
        } else {
            echo "<link rel='stylesheet' href='../public/styles/commons.css'>";
            echo "<link rel='stylesheet' href='../public/styles/login.css'>";
        }
    }

    // Styles for single_category.php
    if ($filename == 'single_category.php') {
        if ($dirname == 'blogster') {
            echo "<link rel='stylesheet' href='./public/styles/commons.css'>";
            // echo "<link rel='stylesheet' href='./public/styles/single_category.css'>";
            echo "<link rel='stylesheet' href='./public/styles/featured_blogs.css'>";
        } else {
            echo "<link rel='stylesheet' href='../public/styles/commons.css'>";
            echo "<link rel='stylesheet' href='../public/styles/single_category.css'>";
            echo "<link rel='stylesheet' href='../public/styles/featured_blogs.css'>";
        }
    }

    // Styles for single_post.php
    if ($filename == 'single_post.php') {
        if ($dirname == 'blogster') {
            echo "<link rel='stylesheet' href='./public/styles/commons.css'>";
            echo "<link rel='stylesheet' href='./public/styles/single_post.css'>";
        } else {
            echo "<link rel='stylesheet' href='../public/styles/commons.css'>";
            echo "<link rel='stylesheet' href='../public/styles/single_post.css'>";
        }
    }

    // Styles for user.php
    if ($filename == 'user.php') {
        echo "<link rel='stylesheet' href='../public/styles/commons.css'>";
        echo "<link rel='stylesheet' href='./css/user.css'>";
    }

    // Styles for change_password.php
    if ($filename == 'change_password.php') {
        echo "<link rel='stylesheet' href='../public/styles/commons.css'>";
        echo "<link rel='stylesheet' href='./css/user.css'>";
        echo "<link rel='stylesheet' href='./css/change_password.css'>";
    }

    // Styles for manage_posts.php
    if ($filename == 'manage_posts.php') {
        echo "<link rel='stylesheet' href='../public/styles/commons.css'>";
        echo "<link rel='stylesheet' href='../public/styles/featured_blogs.css'>";
        echo "<link rel='stylesheet' href='./css/user.css'>";
    }

    // Styles for manage_single.php
    if ($filename == 'manage_single.php') {
        echo "<link rel='stylesheet' href='../public/styles/commons.css'>";
        echo "<link rel='stylesheet' href='../public/styles/single_post.css'>";
        echo "<link rel='stylesheet' href='./css/user.css'>";
        echo "<link rel='stylesheet' href='./css/manage_single.css'>";
    }

    // Styles for post_blog.php
    if ($filename == 'post_blog.php') {
        echo "<link rel='stylesheet' href='../public/styles/commons.css'>";
        echo "<link rel='stylesheet' href='./css/user.css'>";
        echo "<link rel='stylesheet' href='./css/post_blog.css'>";
    }

    ?>

    <!-- <body> tag -->
    <?php
    // add class of index to the body if on the index.php
    if ($filename === 'index.php') {
        echo "<body class='index-page'>";
    } else {
        echo '<body>';
    }
    ?>

    <!-- Header -->
    <?php

    if ($dirname == 'user') {
        echo "<header class='user-page'>";
    } else {
        if ($filename !== 'index.php') {
            echo "<header class='other-pages'>";
        } else {
            echo "<header>";
        }
    }
    ?>


    <!-- Logo - Blogster -->
    <h1 class="logo">
        <?php

        if (isset($_SESSION['user_name'])) {
            if ($dirname == 'public') {
                echo "<a href='../user/user.php'>Blogster</a>";
            } else if ($dirname == 'user') {
                echo "<a href='./user.php'>Blogster</a>";
            }
        } else {

            if ($dirname == 'blogster') {
                echo "<a href='./index.php'>Blogster</a>";
            } else if ($dirname == 'public') {
                echo "<a href='../index.php'>Blogster</a>";
            } else if ($dirname == 'user') {
                echo "<a href='./user.php'>Blogster</a>";
            }
        }
        ?>
    </h1>

    <!-- search bar -->
    <?php

    if ($filename !== 'index.php') {
        echo "<div class='hero-buttons'>
                    <input type='text' placeholder='Search for blogposts'>
                    <input type='button' value='Search Now'>
              </div>";
    }
    ?>

    <nav>
        <ul class="navlinks">
            <?php

            // Home
            if ($filename === 'index.php') {
                echo "<li id='home'><a href='./index.php' class='active'>Home</a></li>";
            }


            // Categories
            if ($dirname == 'blogster') {
                if ($filename === 'categories.php') {
                    echo "<li id='categories'><a href='./public/categories.php' class='active'>Categories</a></li>";
                } else {
                    echo "<li id='categories'><a href='./public/categories.php'>Categories</a></li>";
                }
            } else if ($dirname == 'public') {
                if ($filename === 'categories.php') {
                    echo "<li id='categories'><a href='./categories.php' class='active'>Categories</a></li>";
                } else {
                    echo "<li id='categories'><a href='./categories.php'>Categories</a></li>";
                }
            } else if ($dirname == 'user') {
                if ($filename === 'categories.php') {
                    echo "<li id='categories'><a href='../public/categories.php' class='active'>Categories</a></li>";
                } else {
                    echo "<li id='categories'><a href='../public/categories.php'>Categories</a></li>";
                }
            }


            // Login / Register
            if (isset($_SESSION['user_name'])) {
                if ($dirname == 'user') {
                    echo "<li id='login'><a href='./logout.php'>Logout</a></li>";
                } else {
                    echo "<li id='login'><a href='../user/logout.php'>Logout</a></li>";
                }
            } else {
                if ($dirname == 'blogster') {
                    if ($filename === 'login.php') {
                        echo "<li id='login'><a href='./public/login.php' class='active-login'>Login / Register</a></li>";
                    } else {
                        echo "<li id='login'><a href='./public/login.php'>Login / Register</a></li>";
                    }
                } else if ($dirname == 'public') {
                    if ($filename === 'login.php') {
                        echo "<li id='login'><a href='./login.php' class='active-login'>Login / Register</a></li>";
                    } else {
                        echo "<li id='login'><a href='./login.php'>Login / Register</a></li>";
                    }
                }
            }

            ?>

        </ul>
    </nav>
    </header>