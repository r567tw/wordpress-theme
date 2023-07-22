<h1><?php bloginfo('name'); ?></h1>
<p><?php bloginfo('description'); ?></p>
<?php get_header(); ?>
<?php 
    while (have_posts()) {
        the_post();
        echo "<a href='";
        echo the_permalink();
        echo "'>";
        echo the_title();
        echo "</a>";
    }
?>

<?php get_footer(); ?>