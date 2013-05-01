<!DOCTYPE html>
<html lang="sv">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="max-age=2592000" />
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
      <meta name='description' property="og:description" content="Programmering är mitt jobb och passion. Jag frilansar, arbetar i Vim och är ständigt på jakt efter spännande uppdrag." />
    <?php
    }
    ?>
    <meta property="og:image" content="http://johndahlstrom.se/blog/wp-content/uploads/2013/01/profil.jpg" />
    <meta name="keywords" content="john dahlström, frilans, webbprogrammerare, responsive design, arch linux, archlinux, linux arch, mobile first, vim, vim a, vim i, blogg hur man gör" />
    <meta name='author' content='John Dahlström' />

  </head>
