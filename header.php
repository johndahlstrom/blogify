<!DOCTYPE html>
<html lang="sv">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="alternate" href="http://johndahlstrom.se/blog/feed" title="<?=bloginfo('name');?>" type="application/atom+xml" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <!-- Google webfont -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <?php
    if (is_single()) {
      $post = get_post($post->ID, false);
      $shortDesc = strip_tags(substr($post->post_content, 0, 200));
      $shortDesc = preg_replace('/[\n\r]/', ' ', $shortDesc);
      $shortDesc = preg_replace('/\.\s+/', '. ', $shortDesc);

    ?>
      <title><?=single_post_title('', true);?></title>
      <meta name='description' property='og:description' content="<?=$shortDesc?>" />
      <meta property="og:title" content="<?=single_post_title('', true);?>" />
    <?php
    }
    else {
    ?>
      <title><?=bloginfo('name');?></title>
      <meta property="og:title" content="<?=bloginfo('name')?>" />
      <meta name='description' property="og:description" content="This blog is using Blogify, a wordpress theme made by John Dahlström." />
    <?php
    }
    ?>
    <meta property="og:type" content="blog" />
    <meta property="og:url" content="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" />
    <meta property="og:image" content="http://johndahlstrom.se/blog/wp-content/uploads/2013/01/profil.jpg" />
    <meta name="keywords" content="john dahlström, blogify, wordpress theme" />
    <meta name='author' content='John Dahlström' />


    <style type="text/css" media="all">
      body {
        color: <?php echo get_option('text') ?>;
      }
      a { 
        color: <?php echo get_option('links') ?>;
      }
      a:hover {
        color: <?php echo get_option('links') ?>;
      }
      .entry-title { 
        background: <?php echo get_option('titles') ?>;
      }
    </style>
  </head>
