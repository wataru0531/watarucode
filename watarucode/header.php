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

  <!-- l-header -->
  <header class="l-header p-header">
    <div class="p-header__inner">
      <?php if(is_front_page()): ?>
        <h1 class="p-header__title">
          <a href="">タイトル</a>
        </h1>
      <?php else: ?>
        <div class="p-header__title">
          <a href="">タイトル</a>
        </div>
      <?php endif; ?>

      <!-- p-global-nav -->
      <nav class="p-header__global-nav p-global-nav">
        <ul class="p-global-nav__items">
          <li class="p-global-nav__item__item">
            <a href="<?php echo $top; ?>">トップ</a>
          </li>
          <li class="p-global-nav__item__item">
            <a href="">グローバルアイテム</a>
          </li>
          <li class="p-global-nav__item__item">
            <a href="">グローバルアイテム</a>
          </li>
        </ul>
      </nav><!-- p-global-nav -->

      <!-- c-hamburger-btn -->
      <button class="p-header__hamburger-btn c-hamburger-btn">
        <span></span>
        <span></span>
        <span></span>
      </button><!-- c-hamburger-btn -->

      <!-- p-drawer -->
      <div class="p-header__drawer p-drawer">
        <ul class="p-drawer__items">
          <li class="p-drawer__item">
            <a href="<?php echo $top; ?>">トップ</a>
          </li>
          <li class="p-drawer__item">
            <a href="">ドロワーアイテム</a>
          </li>
          <li class="p-drawer__item">
            <a href="">ドロワーアイテム</a>
          </li>
        </ul>
      </div><!-- p-drawer -->
    </div>
  </header><!-- l-header -->

  <?php if(is_front_page()): ?>
    <!-- l-mv -->
    <div class="l-mv p-mv">
    </div><!-- l-mv -->
  <?php else: ?>
    <!-- l-sub-mv -->
    <div class="l-sub-mv">
    </div><!-- </div>l-sub-mv -->
  <?php endif; ?>

  <main>
  