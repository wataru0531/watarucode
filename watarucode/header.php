<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Oswald:wght@400;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>
<body>

  <!-- 各ページのurl -->
  <?php
    $top = esc_url(home_url('/'));
  ?>

  <!-- l-sns -->
  <div class="l-sns p-sns">
    <ul class="p-sns__items">
      <li class="p-sns__item">
        <a href="">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/twitter-blue.png" alt="">
        </a>
      </li>
      <li class="p-sns__item">
        <a href="">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/instagram-multi.png" alt="">
        </a>
      </li>
    </ul>
  </div><!-- l-sns -->

  <!-- l-header -->
  <header class="l-header p-header">
    <div class="p-header__inner">

      <!-- p-global-nav -->
      <nav class="p-header__global-nav p-global-nav">
        <ul class="p-global-nav__items">
          <li class="p-global-nav__item">
            <a href="<?php echo $top; ?>">top</a>
          </li>
          <li class="p-global-nav__item">
            <a href="">concept</a>
          </li>
          <li class="p-global-nav__item">
            <a href="">works</a>
          </li>
          <li class="p-global-nav__item">
            <a href="">blog</a>
          </li>
          <li class="p-global-nav__item">
            <a href="<?php echo $top; ?>">price</a>
          </li>
          <li class="p-global-nav__item">
            <a href="">about</a>
          </li>
          <li class="p-global-nav__item">
            <a href="">contact</a>
          </li>
        </ul>
      </nav><!-- p-global-nav -->

      <!-- c-hamburger-btn -->
      <button class="p-header__hamburger-btn c-hamburger-btn js-hamburger-btn">
        <span></span>
        <span></span>
        <span></span>
      </button><!-- c-hamburger-btn -->

      <!-- p-drawer -->
      <div class="p-header__drawer p-drawer js-drawer">
          <ul class="p-drawer__items">
            <li class="p-drawer__item">
              <a href="<?php echo $top; ?>">top</a>
            </li>
            <li class="p-drawer__item">
              <a href="">concept</a>
            </li>
            <li class="p-drawer__item">
              <a href="">works</a>
            </li>
            <li class="p-drawer__item">
              <a href="">blog</a>
            </li>
            <li class="p-drawer__item">
              <a href="">price</a>
            </li>
            <li class="p-drawer__item">
              <a href="">about</a>
            </li>
            <li class="p-drawer__item">
              <a href="">contact</a>
            </li>
          </ul>
          <ul class="p-drawer__sns-items">
            <li class="p-drawer__sns-item">
              <a href="">
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/twitter-white.png" alt=""> -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/twitter-blue.png" alt="">
              </a>
            </li>
            <li class="p-drawer__sns-item">
              <a href="">
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/instagram-white.png" alt=""> -->
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/instagram-multi.png" alt="">
              </a>
            </li>
          </ul>
      </div><!-- p-drawer -->

      <!-- <div class="p-header__layer p-layer js-layer"></div> -->

    </div>
  </header><!-- l-header -->

  <?php if(is_front_page()): ?>

    <!-- l-mv -->
    <div class="l-mv p-mv">
      <h1 class="p-mv__title">watarucode.</h1>
    </div><!-- l-mv -->

  <?php else: ?>

    <!-- l-sub-mv -->
    <div class="l-sub-mv p-sub-mv">
      <div class="p-sub-mv__inner l-inner">
        <div class="p-mv__header">

          <?php if(is_post_type_archive('works')): ?>
            <h1 class="p-sub-mv__title">works</h1>
          <?php elseif(is_singular('works')): ?>
            <h1 class="p-sub-mv__title--single"><?php single_post_title(); ?></h1>
            
          <?php elseif(is_home()): ?>
            <h1 class="p-sub-mv__title">blog</h1>
          <?php else: ?>
          <?php endif; ?>

        </div>
      </div> 
    </div><!-- </div>l-sub-mv -->

    <!-- l-breadcrumb -->
    <div class="l-breadcrumb p-breadcrumb">
      <div class="p-breadcrumb__inner l-inner">
        <?php
          if(function_exists('bcn_display')){
            bcn_display();
          }
        ?>
      </div>
    </div><!-- l-breadcrumb -->

  <?php endif; ?>

  <main>
  