<?php
include './includes/header.php';
include '../assets/fetch_categories.php';
?>

<!-- Main section -->
<main>
    <?php include './includes/intro_section_2.php' ?>

    <!-- categories -->
    <section class="categories">
        <div class="section-title">
            <h3 class="pre-heading">Start Exploring with our</h3>
            <h1 class="heading">Common Categories</h1>
            <p class="post-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam sed voluptates qui aut culpa cupiditate amet nemo perferendis odio laboriosam.</p>
        </div>

        <div class="section-content">
            <?php

            foreach ($categories as $category) {
            ?>
                <div class="job-card">
                    <?php echo $category['CATEGORY_ICON'] ?>
                    <h3 class="job-title"><?php echo $category['CATEGORY_NAME'] ?></h3>
                    <h4 class="position"><?php echo $category['CATEGORY_NO_OF_POSTS'] ?> posts</h4>
                    <input type="hidden" value="<?php echo $category['CATEGORY_NAME'] ?>">
                    <button>Show more</button>
                </div>

            <?php

            }
            ?>
        </div>
    </section>

    <!-- Include Intro-section -->
    <?php include './includes/intro_section_1.php'; ?>

    <!-- Featured tenders -->
    <section class="featured-tenders">
        <h1>Latest Posts</h1>
        <div class="tender">
            <img class="company-logo" src="../images/pexels-fauxels.jpg">
            <div class="short-details">
                <a class="blog-category" href="#">Finance</a>
                <h3>General Ledger Accountant</h3>
                <h4>Posted on <span class="post-date">23 August</span> by <span class="owner">Michael Bronson</span></h4>
            </div>
            <button class="browse-tender">Read More</button>
        </div>

        <div class="tender">
            <img class="company-logo" src="../images//pexels-fauxels.jpg">
            <div class="short-details">
                <a class="blog-category" href="#">Finance</a>
                <h3>School Reconstruction</h3>
                <h4>Posted on <span class="post-date">20 May</span> by <span class="owner">George Kariuki</span></h4>
            </div>
            <button class="browse-tender">Read More</button>
        </div>

        <div class="tender">
            <img class="company-logo" src="../images//pexels-fauxels.jpg">
            <div class="short-details">
                <a class="blog-category" href="#">Finance</a>
                <h3>Road building</h3>
                <h4>Posted on <span class="post-date">12 July</span> by <span class="owner">Jane Nafula</span></h4>
            </div>
            <button class="browse-tender">Read More</button>
        </div>

    </section>
</main>
<script>
    const cards = document.querySelectorAll('.job-card');

    // function to redirect to another single category page on button click


    // Listen for a click event
    cards.forEach(card => {
        const showMoreBtn = card.querySelector('button');

        showMoreBtn.addEventListener('click', (e) => {
            let category_name = e.target.previousElementSibling.value;
            category_name = category_name.replace(/ /gi, '-');
            category_name = category_name.replace(/ /gi, '&amp;');
            category_name = category_name.toLowerCase();

            document.location.href = "./single_category.php?category=" + category_name;
        });
    })
</script>
</body>

</html>