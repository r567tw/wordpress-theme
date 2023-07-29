<?php

  get_header();

  while(have_posts()) {
    the_post(); 
?>
    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg")?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Event: <?=the_title()?></h1>
      </div>
    </div>
    
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
          <p>
            <a class="metabox__blog-home-link" href="<?=get_post_type_archive_link('event')?>"><i class="fa fa-home" aria-hidden="true"></i> Event Home</a> <span class="metabox__main"><?=the_title()?></span>
          </p>
        </div>
      <div class="generic-content">
        <?=the_content()?>
      </div>
      </div>


  <?php 
  }
  get_footer();

?>