<!-- For General Blog Template -->
<?php get_header(); ?>
    <div class="container container--narrow page-section">
      <!-- Hello world! -->
      <?php
        while (have_posts()){
          the_post();
          echo the_title();
      ?>
      <div class="post-item">
        <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        
        <div class="metabox">
          <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.F'); ?> in <?php echo get_the_category_list(' and '); ?></p>
        </div>

        <div class="generic-content">
          <?php the_content(); ?>
        </div>
      </div>
      <?php
        }
      ?>
    </div>


  <?php get_footer();

?>