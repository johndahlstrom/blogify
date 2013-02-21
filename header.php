<html lang="sv">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="max-age=2592000" />
    <link rel="alternate" href="/feed" title="<?=bloginfo('name');?>" type="application/atom+xml" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <? wp_head(); ?>
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <!-- Google webfont -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <?
    if (is_single()) {
      $post = get_post($post->ID, false);
      $shortDesc = strip_tags(substr($post->post_content, 0, 200));
      $shortDesc = preg_replace('/[\n\r]/', ' ', $shortDesc);
      $shortDesc = preg_replace('/\.\s+/', '. ', $shortDesc);

    ?>
      <title><?=single_post_title('', true);?></title>
      <meta name='description' property='og:description' content="<?=$shortDesc?>" />
      <meta property="og:title" content="<?=single_post_title('', true);?>" />
    <?
    }
    else {
    ?>
      <title><?=bloginfo('name');?></title>
      <meta property="og:title" content="<?=bloginfo('name')?>" />
      <meta name='description' property="og:description" content="This blog is using Blogify, made by John Dahlström." />
    <?
    }
    ?>
    <meta name="keywords" content="john dahlström, blogify, wordpress theme" />
    <meta name='author' content='John Dahlström' />

  </head>
