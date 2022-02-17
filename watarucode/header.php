<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri();?>/assets/img/favicon/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri();?>/assets/img/favicon/apple-touch-icon.png">

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Oswald:wght@400;700&display=swap" rel="stylesheet">
  
  <?php wp_head(); ?>
</head>
<body>
  <!-- ソースコードをご覧いただきありがとうございます。(人-) -->
  <!-- 何かお気づきのことやご質問ありましたらTwitterの方でDMをいただけたら幸いです。 -->
  <!-- 今後とも宜しくお願いいたします。 -->
  <!--  -->

<!-- l-global-container -->
<div class="l-global-container">
  
  <!-- l-opening -->
  <div class="l-opening p-opening js-opening">
      <div class="p-opening__box">
        <div class="p-opening__title js-opening-title">
          <span class="char">w</span><span class="char">a</span><span class="char">t</span><span class="char">a</span><span class="char">r</span><span class="char">u</span><span class="char">&nbsp;</span><span class="char">d</span><span class="char">e</span><span class="char">s</span><span class="char">i</span><span class="char">g</span><span class="char">n</span>
        </div>
        <div class="p-opening__lines">
          <span class="p-opening__line-gray js-opening-line"></span>
          <span class="p-opening__line-coral js-opening-line"></span>
        </div>
      </div>
  </div>
  <!-- l-opening -->

  <!-- l-drawer -->
  <div class="l-drawer p-drawer js-drawer">
    <div class="p-drawer__inner">
      <ul class="p-drawer__items">
        <li class="p-drawer__item">
          <a href="<?php echo esc_url(home_url('/')); ?>">top</a>
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
          <a href="https://twitter.com/watarudesign" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter-blue.png" alt="">
          </a>
        </li>
        <li class="p-drawer__sns-item">
          <a href="https://www.instagram.com/watarudesign/" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram-multi.png" alt="">
          </a>
        </li>
      </ul>
    </div>
  </div><!-- l-drawer -->

  <!-- l-sns -->
  <div class="l-sns p-sns">
    <ul class="p-sns__items">
      <li class="p-sns__item">
        <a href="https://twitter.com/watarudesign/" target="_blank">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter-blue.png" alt="">
        </a>
      </li>
      <li class="p-sns__item">
        <a href="https://www.instagram.com/watarudesign/" target="_blank">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram-multi.png" alt="">
        </a>
      </li>
    </ul>
  </div><!-- l-sns -->

  <!-- l-page-top -->
  <div class="l-page-top p-page-top js-page-top">
    <button class="c-arrow"></button>
  </div>
  <!-- l-page-top -->

  <!-- l-header -->
  <header class="l-header p-header js-header">
    <div class="p-header__inner">

      <!-- p-global-nav -->
      <nav class="p-header__global-nav p-global-nav">
        <ul class="p-global-nav__items">
          <li class="p-global-nav__item">
            <a href="<?php echo esc_url(home_url('/')); ?>">top</a>
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
  