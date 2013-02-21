<? include('header.php'); ?>
<style type="text/css" media="all">
  body {
    color: <? echo get_option('text') ?>;
  }
  a { 
    color: <? echo get_option('links') ?>;
  }
  .entry-title { 
    background: <? echo get_option('titles') ?>;
  }
</style>
<body>
  <div id='wrapper'>
    <? if (is_admin_bar_showing()) { ?>
      <div class="spacer"></div>
    <? } ?>
      <div id='content-wrapper'>
        <div id='content'>
          <div id='post'>
            <? $c = 0; ?>
            <? if (have_posts()) { while (have_posts()) : the_post(); ?>
            <div id='entry-wrapper'>
              <div class='entry'>
                <? if (is_single()) { ?>
                <h1 class='entry-title'><? the_title(); ?></h1>
                <? }
                else {
                  if ($c == 0) { 
                    $c = 1;?>
                <h1 class='entry-title'><a href='<?=post_permalink();?>'><? the_title(); ?></a></h1>
                <? }
                  else { ?> 
                <h2 class='entry-title'><a href='<?=post_permalink();?>'><? the_title(); ?></a></h1>
                <? } 
                } ?>
                <? if (!is_page()) { ?>
                <div class='entry-meta-date'><? the_time('F j, Y'); ?></div>
                <? if (!is_single()) { ?>
                <div class='entry-meta-comments'>
                  <? comments_popup_link('Inga kommentarer', '1 kommentar', '% kommentarer'); ?>
                </div> 
                <? } ?>
                <? } ?>
                <div class="entry-content">
                  <? the_content(); ?> 
                </div>
              </div>
            </div>
            <? endwhile; ?>
            <? if (is_single()) { ?>
            <div class="entry-meta-next-previous">
              <div class='meta'>
                <?
                $next_post = get_next_post();
                if (!empty( $next_post )) { 
                ?>
                <a class='align-left' href="<?php echo get_permalink( $next_post->ID ); ?>">&laquo; <?php echo $next_post->post_title; ?></a>
                <? } ?>
                <?
                $previous_post = get_previous_post();
                if (!empty( $previous_post )) { 
                ?>
                <a class='align-right' href="<?php echo get_permalink( $previous_post->ID ); ?>"><?php echo $previous_post->post_title; ?> &raquo;</a>
                <? } ?>
              </div>
            </div>
            <div class='comments'>
              <?php comments_template(); ?> 
            </div>
            <? } ?>
          </div>
          <? include('sidebar.php'); ?>      
        </div>
          <? if (!is_single() && !is_page()) { ?>
          <div id='meta-wrapper'>
            <div class='meta'>
            <?
            // Get total number of pages
            global $wp_query;
            $total = $wp_query->max_num_pages;
            // Only paginate if we have more than one page
            if ( $total > 1 )  {
              // Get the current page
              if ( !$current_page = get_query_var('paged') )
                $current_page = 1;
              // Structure of “format” depends on whether we’re using pretty permalinks
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
          <? } ?>
          <? } ?>
        </div>
      <div id='footer'>
        <? get_footer(); ?>
      </div>
  </div>
</body>
</html>
