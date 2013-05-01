<?php include('header.php'); ?>
<body>
  <div id='wrapper'>
    <?php if (is_admin_bar_showing()) { ?>
      <div class="spacer"></div>
    <?php } ?>
      <div id="site-title">
        <a id='home-button' href="<?=site_url()?>" alt="<?=bloginfo('name')?>" title="<?=bloginfo('name')?>"><?=bloginfo('name')?></a> 
      </div>
      <div id='content-wrapper'>
        <div id='content'>
          <div id='post'>
            <?php $c = 0; ?>
            <?php if (have_posts()) { while (have_posts()) : the_post(); ?>
            <div class='entry-wrapper'>
              <div class='entry'>
                <?php if (is_single()) { ?>
                <h1 class='entry-title'><?php the_title(); ?></h1>
                <?php }
                else {
                  if ($c == 0) { 
                    $c = 1;
                ?>
                <h1 class='entry-title'><a href='<?=post_permalink();?>'><?php the_title(); ?></a></h1>
                <?php }
                  else { ?> 
                <h2 class='entry-title'><a href='<?=post_permalink();?>'><?php the_title(); ?></a></h1>
                <?php } 
                } ?>
                <?php if (!is_page()) { ?>
                <div class='entry-meta-date'><?php the_time('F j, Y'); ?></div>
                <?php if (!is_single()) { ?>
                <div class='entry-meta-comments'>
                  <?php comments_popup_link('Inga kommentarer', '1 kommentar', '% kommentarer'); ?>
                </div> 
                <?php } ?>
                <?php } ?>
                <div class="entry-content">
                  <?php the_content(); ?> 
                </div>
              </div>
            </div>
            <?php endwhile; ?>
            <?php if (is_single()) { ?>
            <div class="entry-meta-next-previous">
              <div class='meta'>
                <?php
                $next_post = get_next_post();
                if (!empty( $next_post )) { 
                ?>
                <a class='align-left' href="<?php echo get_permalink( $next_post->ID ); ?>">&laquo; <?php echo $next_post->post_title; ?></a>
                <?php } ?>
                <?php
                $previous_post = get_previous_post();
                if (!empty( $previous_post )) { 
                ?>
                <a class='align-right' href="<?php echo get_permalink( $previous_post->ID ); ?>"><?php echo $previous_post->post_title; ?> &raquo;</a>
                <?php } ?>
              </div>
            </div>
            <div class='comments'>
              <?php comments_template(); ?> 
            </div>
            <?php } ?>
          </div>
          <?php include('sidebar.php'); ?>      
        </div>
        <?php if (!is_single() && !is_page()) { ?>
        <div id='meta-wrapper'>
          <div class='meta'>
          <?php
          // Get total number of pages
          global $wp_query;
          $total = $wp_query->max_num_pages;
          // Only paginate if we have more than one page
          if ( $total > 1 )  {
            // Get the current page
            if ( !$current_page = get_query_var('paged') )
              $current_page = 1;
              // Structure of format depends on whether we're using pretty permalinks
              $permalinks = get_option('permalink_structure');
              $format = empty( $permalinks ) ? '&page=%#%' : 'page/%#%/';
              echo paginate_links(array(
              'base' => get_pagenum_link(1) . '%_%',
              'format' => $format,
              'current' => $current_page,
              'total' => $total,
              'mid_size' => 4,
              'type' => 'plain'
            ));
          }?>
          </div>
        </div>
        <?php } ?>
        <?php } ?>
      </div>
      <div id='footer'>
        <?php get_footer(); ?>
      </div>
  </div>
</body>
</html>
