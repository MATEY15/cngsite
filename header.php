<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
  </head>
  <?php 
      if(get_post_type($post->ID) == 'post') {
         $category = get_the_category($post->ID);
         $cat = $category[0]->cat_ID;
      } else {
         $cat = ''; 
      }
  ?>
  <body class="overflow">
    <div class="overlayer-load"><span class="items-load load-one"></span><span class="items-load load-two"></span><span class="items-load load-three"></span></div>
    <?php if(is_404() and get_field('background','ts')) { $background = get_field('background','ts'); } elseif(is_category() and get_field('background','category_'.$cat)) { $background = get_field('background','category_'.$cat); } elseif(get_field('background')) { $background = get_field('background'); } else { $background = get_bloginfo('template_url').'/img/home.jpg'; } ?>
    <header class="header" style="background-image: url(<?php echo $background; ?>)">
      <div class="right-sidebar">
        <div class="close-sidebar"><span></span><span></span></div>
        <ul class="right-menu">
          <?php wp_nav_menu(array('theme_location'=>'primary', 'fallback_cb'=>'Main menu', 'items_wrap'=>'%3$s', 'container'=>false, 'depth'=>1)); ?>
        </ul>
        <?php if(get_field('link_icon','ts')) { ?>
        <div class="pulse-button--wrapper">
          <a<?php if(get_field('new','ts')) { echo ' target="_blank"'; } ?> class="pulse-button" href="<?php echo get_field('link_icon','ts'); ?>">
            <svg class="icon-pencil" width="40" height="40" viewBox="0 0 40 40">
              <use xlink:href="<?php bloginfo('template_url'); ?>/img/icon/sprite.svg#icon-pencil"></use>
            </svg>
          </a>
        </div>
        <?php } ?>
      </div>
      <div class="container">
        <div class="header-main">
          <div class="logo"><a class="logo-link" href="<?php bloginfo('url'); ?>/"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>"></a><a class="burger-icon" href="#"><span></span><span></span><span></span></a></div>
          <div class="header-content">
            <?php if(is_404()) { ?>
            <h1>Error 404</h1>
            <p>No such page exists</p>
            <?php } elseif(is_category() or get_post_type($post->ID) == 'post') {  ?>
            <?php echo category_description($cat); ?>
            <?php } else { ?>
            <?php echo get_field('header'); ?>
            <?php } ?>
          </div>
          <div class="header-bottom">
            <ul class="link-copy">
              <?php wp_nav_menu(array('theme_location'=>'primary0', 'fallback_cb'=>'Links', 'items_wrap'=>'%3$s', 'container'=>false, 'depth'=>1)); ?>
            </ul>
          </div>
        </div>
      </div>
    </header>