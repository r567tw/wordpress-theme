<?php 
    while (have_posts()) {
        the_post();
        echo "<a href='";
        echo the_permalink();
        echo "'>";
        echo the_title();
        echo "</a>";

        echo the_content();
    }
?>