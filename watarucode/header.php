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
  <!-- l-drawer -->
  <div class="l-drawer p-drawer js-drawer">
    <div class="p-drawer__inner">
      <ul class="p-drawer__items">
        <li class="p-drawer__item">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#top">top</a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#top">top</a>
          <?php endif; ?>
        </li>
        <li class="p-drawer__item">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#concept">concept</a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#concept">concept</a>
          <?php endif; ?>
        </li>
        <li class="p-drawer__item">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#works">works</a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#works">works</a>
          <?php endif; ?>
        </li>
        <li class="p-drawer__item">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#blog">blog</a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#blog">blog</a>
          <?php endif; ?>
        </li>
        <li class="p-drawer__item">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#price">price</a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#price">price</a>
          <?php endif; ?>
        </li>
        <li class="p-drawer__item">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#about">about</a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#about">about</a>
          <?php endif; ?>
        </li>
        <li class="p-drawer__item">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#contact">contact</a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#contact">contact</a>
          <?php endif; ?>
        </li>
      </ul>
      <ul class="p-drawer__sns-items">
        <li class="p-drawer__sns-item">
          <a href="https://twitter.com/watarudesign">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/twitter-blue.png" alt="">
          </a>
        </li>
        <li class="p-drawer__sns-item">
          <a href="https://www.instagram.com/watarucode/">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/instagram-multi.png" alt="">
          </a>
        </li>
      </ul>
    </div>
  </div><!-- l-drawer -->

  <!-- l-sns -->
  <div class="l-sns p-sns">
    <ul class="p-sns__items">
      <li class="p-sns__item">
        <a href="https://twitter.com/watarudesign/" target="_black">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/twitter-blue.png" alt="">
        </a>
      </li>
      <li class="p-sns__item">
        <a href="https://www.instagram.com/watarucode/" target="_black">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/instagram-multi.png" alt="">
        </a>
      </li>
    </ul>
  </div><!-- l-sns -->

  <!-- l-header -->
  <header class="l-header p-header js-header">
    <div class="p-header__inner">
      <!-- <?php if(is_front_page()): ?>
        <h1 class="p-header__title">
          <a href="<?php echo esc_url(home_url('/')); ?>">wataru&nbsp;design.</a>
        </h1>
      <?php else: ?>
        <div class="p-header__title">
          <a href="<?php echo esc_url(home_url('/')); ?>">wataru&nbsp;design.</a>
        </div>
      <?php endif; ?> -->

      <!-- p-global-nav -->
      <nav class="p-header__global-nav p-global-nav">
        <ul class="p-global-nav__items">
          <li class="p-global-nav__item">
            <?php if(is_front_page()): ?>
              <a href="#top">top</a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#top">top</a>
            <?php endif; ?>
          </li>
          <li class="p-global-nav__item">
            <?php if(is_front_page()): ?>
              <a href="#concept">concept</a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#concept">concept</a>
            <?php endif; ?>
          </li>
          <li class="p-global-nav__item">
            <?php if(is_front_page()): ?>
              <a href="#works">works</a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#works">works</a>
            <?php endif; ?>
          </li>
          <li class="p-global-nav__item">
            <?php if(is_front_page()): ?>
              <a href="#blog">blog</a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#blog">blog</a>
            <?php endif; ?>
          </li>
          <li class="p-global-nav__item">
            <?php if(is_front_page()): ?>
              <a href="#price">price</a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#price">price</a>
            <?php endif; ?>
          </li>
          <li class="p-global-nav__item">
            <?php if(is_front_page()): ?>
              <a href="#about">about</a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#about">about</a>
            <?php endif; ?>
          </li>
          <li class="p-global-nav__item">
            <?php if(is_front_page()): ?>
              <a href="#contact">contact</a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#contact">contact</a>
            <?php endif; ?>
          </li>
        </ul>
      </nav><!-- p-global-nav -->

      <!-- c-hamburger-btn -->
      <button class="p-header__hamburger-btn c-hamburger-btn js-hamburger-btn">
        <span></span>
        <span></span>
        <span></span>
      </button><!-- c-hamburger-btn -->

    </div>
  </header><!-- l-header -->
  