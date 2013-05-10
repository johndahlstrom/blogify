<?php
if ( function_exists('register_sidebar') )
  register_sidebar(1, array(
    'before_widget' => '<li>',
    'after_widget' => '</li>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  ));

function remove_nofollow($link) {
	return str_replace(' nofollow', '', $link);
}

function add_nofollow($link) {
	$link = preg_replace('/href="(.+)"/', 'href="$1" rel="nofollow"', $link );
	$link = preg_replace('/href=\'(.+)\'/', 'href=\'$1\' rel="nofollow"', $link );
	return $link;
}

function add_meta_nofollow($link) {
	$link = preg_replace( '/(.+)/', '$1" rel="nofollow', $link );
	return $link;
}

remove_filter('pre_comment_content', 'wp_rel_nofollow');
add_filter('get_comment_author_link', 'remove_nofollow'); 
add_filter('edit_comment_link', 'add_nofollow');
add_filter('comment_reply_link', 'add_nofollow' );
add_filter('get_comment_class', 'add_meta_nofollow');

// Clean up our header
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' ); 

//action to display the menu
add_action('admin_menu', 'themeoptions_admin_menu'); 
function themeoptions_admin_menu() {
  add_theme_page('Theme colors', 'Theme colors', 'read', 'color_picker_option', 'color_picker_option_page');
}


add_action('init', 'load_theme_scripts');
function load_theme_scripts() {
  wp_enqueue_style( 'farbtastic' );
  wp_enqueue_script( 'farbtastic' );
}

function color_picker_option_page() {
  $titles = get_option('titles');
  if (empty($titles) || $titles == '') {
    add_option('titles', '#13A7EC');
  }
  
  $links = get_option('links');
  if (empty($links) || $links == '') {
    add_option('links', '#13A7EC');
  }
  
  $text = get_option('text');
  if (empty($text) || $text == '') {
    add_option('text', '#666');
  }
  
  
  /*The admin page*/
  if ( isset($_POST['update_options'])) { color_picker_option_update(); }
  ?>
  <div class="wrap">
    <div id="icon-themes" class="icon32"><br /></div>
    <h2>Theme colors</h2>
  
    <form method="POST" action="">  
      <table class="widefat color_picker_options">
        <thead><tr><th colspan="2">&nbsp;</th></tr></thead>
        <tbody>
        <tr valign="top">
          <th width="200px" scope="row">Titles</th>
          <td>  
            <input type="text" id="titles" value="<?php echo get_option('titles'); ?>" name="titles" />
            <div id="titles_color"></div>
          </td>
        </tr>
        <tr valign="top">
          <th width="200px" scope="row">Links</th>
          <td>  
            <input type="text" id="links" value="<?php echo get_option('links'); ?>" name="links" />
            <div id="links_color"></div>
          </td>
        </tr>
        <tr valign="top">
          <th width="200px" scope="row">Text</th>
          <td>  
            <input type="text" id="text" value="<?php echo get_option('text'); ?>" name="text" />
            <div id="text_color"></div>
          </td>
        </tr>
        </tbody>
  
        <tfoot><tr><th>&nbsp;</th><th>&nbsp;</th></tr></tfoot>
      </table>
      <p><input type="submit" name="update_options" value="Update Options" class="button-primary" /></p>
    </form>
  </div>
  <script type="text/javascript">
    jQuery(document).ready(function($){
      $('#titles_color').farbtastic('#titles');
      $('#links_color').farbtastic('#links');
      $('#text_color').farbtastic('#text');      
    });
  </script>
<?php 
}


function color_picker_option_update()
{
  update_option('titles', $_POST['titles']);
  update_option('links', $_POST['links']);
  update_option('text', $_POST['text']);
}
