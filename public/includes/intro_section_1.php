<section class="intro-section">
    <div class="intro-section-content">
        <h2>
            <?php

            if ($filename == 'login.php') {
                echo " It's never too late to start";
            } elseif ($filename == 'categories.php') {
                echo "latest Posts";
            }

            ?>
        </h2>
        <?php
            if($filename == 'categories.php'){
                echo '';
            } else{
                ?><div class='navigation'>
                        <h3><a href='../index.php'>Home</a></h3>
                        <i class='fas fa-chevron-right'></i>
                        <h3> 
                        <?php 
                            if ($filename == 'login.php') {
                                echo 'Login / Register';
                            }
                        ?>
                        </h3>
                     </div> 
                 <?php    
            } 
        ?>      
    </div>
</section>