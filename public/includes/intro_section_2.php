<?php
$basename = basename($filepath, ".php");

?>
<section class="intro_section_2">
    <div class="content">
        <h1>
            <?php
            if (isset($_SESSION['user_name'])) {
                echo "";
            } else if ($basename == 'index') {
                echo "";
            } else {
                echo "<a href='../index.php'>Home</a>";
                echo "<i class='fas fa-chevron-right'></i>";
            }
            ?>
        </h1>

        <h3>
            <?php


            if ($basename == 'login') {

                echo $basename . " / Register";
            } else if ($basename == 'single_category') {

                echo "<a href='./categories.php'>Categories</a>" . "<i class='fas fa-chevron-right'></i>" .
                    $category;
            } else if ($basename == 'single_post') {

                echo "<a href='./categories.php'>Categories</a>" . "<i class='fas fa-chevron-right'></i>" .
                    "<a href='./single_category.php?category=" . $category . "'>" . $category_without_dash . "</a>" . "<i class='fas fa-chevron-right'></i>"
                .$post_title;
            } else if ($basename == 'index') {
                echo "  <div class='hero-buttons'>
                            <input type='text' placeholder='Search for blogposts'>
                            <input type='button' value='Search'>
                        </div>";
            } else {
                echo  $basename;
            }

            ?>
        </h3>
    </div>
</section>