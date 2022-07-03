<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/favicon.ico">
  <!-- アップルタッチアイコン -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/apple-touch-icon.png">
  <!-- Androidアイコン -->
  <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/android-touch-icon.png">

  <?php wp_head(); ?>
</head>
<body>
  <!-- カーソル -->
  <div class="c-cursor" id="js-cursor"></div>
  <!-- カーソル -->


<!-- l-global-container -->
<div class="l-global-container" id="js-global-container">
  
  <!-- l-opening -->
  <div class="l-opening p-opening" id="js-opening">
      <div class="p-opening__block">
        <div class="p-opening__title" id="js-opening-title">
          <span>w</span><span>a</span><span>t</span><span>a</span><span>r</span><span>u</span><span>&nbsp;</span><span>d</span><span>e</span><span>s</span><span>i</span><span>g</span><span>n</span>
        </div>
        <div class="p-opening__line p-opening-line">
          <span class="p-opening-line__coral" id="js-opening-line"></span>
        </div>
      </div>
  </div>
  <!-- l-opening -->

  <!-- l-page-top -->
  <div class="l-page-top c-btn-page-top" id="js-page-top">
    <button class="c-btn-page-top__allow">
      <span class="c-btn-page-top__allow-tip"></span>
      <span class="c-btn-page-top__allow-line"></span>
    </button>
  </div>
  <!-- l-page-top -->

  <!-- l-sns -->
  <div class="l-sns p-sns">
    <ul class="p-sns__items">
      <li class="p-sns__item">
        <a href="https://twitter.com/watarudesign/" target="_blank">
          <picture>
            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/webp/twitter-blue.webp" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-blue.png" alt="twitterのアイコン">
          </picture>
        </a>
      </li>
      <li class="p-sns__item">
        <a href="https://www.instagram.com/watarudesign/" target="_blank">
          <picture>
            <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/webp/instagram-multi.webp" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-multi.png" alt="instagramのアイコン">
          </picture>
        </a>
      </li>
    </ul>
  </div><!-- l-sns -->
  
  <!-- l-drawer -->
  <div class="l-drawer p-drawer" id="js-drawer">
    <div class="p-drawer__inner">
      <ul class="p-drawer__items">
        <li class="p-drawer__item <?php if(is_front_page()){ echo 'is-current'; } ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>">
              <span>top</span>
            </a>
        </li>
        <li class="p-drawer__item">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#concept">
              <span>concept</span>
            </a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#concept">
              <span>concept</span>
            </a>
          <?php endif; ?>
        </li>
        <li class="p-drawer__item <?php if(is_post_type_archive('works') || is_singular('works')){ echo 'is-current'; } ?>">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#works">
              <span>works</span>
            </a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#works">
              <span>works</span>
            </a>
          <?php endif; ?>
        </li>
        <li class="p-drawer__item <?php if(is_home() || is_category() || is_search() || is_singular('post')){ echo 'is-current'; } ?>">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#blog">
              <span>blog</span>
            </a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#blog">
              <span>blog</span>
            </a>
          <?php endif; ?>
        </li>
        <li class="p-drawer__item">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#price">
              <span>price</span>
            </a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#price">
              <span>price</span>
            </a>
          <?php endif; ?>
        </li>
        <li class="p-drawer__item">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#about">
              <span>about</span>
            </a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#about">
              <span>about</span>
            </a>
          <?php endif; ?>
        </li>
        <li class="p-drawer__item">
          <?php if(is_front_page()): ?>
            <a class="js-link" href="#contact">
              <span>contact</span>
            </a>
          <?php else: ?>
            <a href="<?php echo esc_url(home_url('/')); ?>#contact">
              <span>contact</span>
            </a>
          <?php endif; ?>
        </li>
      </ul>
      <ul class="p-drawer__sns p-sns-drawer">
        <li class="p-sns-drawer__item">
          <a href="https://twitter.com/watarudesign" target="_blank">
            <picture>
              <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/webp/twitter-white.webp" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-white.png" alt="twitterのアイコン">
            </picture>
          </a>
        </li>
        <li class="p-sns-drawer__item">
          <a href="https://www.instagram.com/watarudesign/" target="_blank">
            <picture>
              <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/webp/instagram-white.webp" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-white.png" alt="instagramのアイコン">
            </picture>
          </a>
        </li>
      </ul>
    </div>
  </div><!-- l-drawer -->

  <!-- l-header -->
  <header class="l-header p-header" id="js-header">
    <div class="p-header__inner">

      <!-- p-global-nav -->
      <nav class="p-header__global-nav p-global-nav">
        <ul class="p-global-nav__items">
          <li class="p-global-nav__item <?php if(is_front_page()){ echo 'is-current'; }; ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>">
              <span>
                <span>
                  <span>t</span><span>o</span><span>p</span>
                </span>
              </span>
            </a>
          </li>
          <li class="p-global-nav__item">
            <?php if(is_front_page()): ?>
              <a href="#concept">
                <span>
                  <span>
                    <span>c</span><span>o</span><span>n</span><span>c</span><span>e</span><span>p</span><span>t</span>
                  </span>
                </span>
              </a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#concept">
                <span>
                  <span>
                    <span>c</span><span>o</span><span>n</span><span>c</span><span>e</span><span>p</span><span>t</span>
                  </span>
                </span>
              </a>
            <?php endif; ?>
          </li>

          <li class="p-global-nav__item <?php if(is_post_type_archive('works') || is_singular('works')){ echo 'is-current'; } ?>">
            <?php if(is_front_page()): ?>
              <a href="#works">
                <span>
                  <span>
                    <span>w</span><span>o</span><span>r</span><span>k</span><span>s</span>
                  </span>
                </span>
              </a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#works">
                <span>
                  <span>
                    <span>w</span><span>o</span><span>r</span><span>k</span><span>s</span>
                  </span>
                </span>
              </a>
            <?php endif; ?>
          </li>
          <li class="p-global-nav__item <?php if(is_home() || is_category() || is_search() || is_singular('post')){ echo 'is-current'; }; ?> ">
            <?php if(is_front_page()): ?>
              <a href="#blog">
                <span>
                  <span>
                    <span>b</span><span>l</span><span>o</span><span>g</span>
                  </span>
                </span>
              </a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#blog">
                <span>
                  <span>
                    <span>b</span><span>l</span><span>o</span><span>g</span>
                  </span>
                </span>
              </a>
            <?php endif; ?>
          </li>
          <li class="p-global-nav__item">
            <?php if(is_front_page()): ?>
              <a href="#price">
                <span>
                  <span>
                    <span>p</span><span>r</span><span>i</span><span>c</span><span>e</span>
                  </span>
                </span>
              </a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#price">
                <span>
                  <span>
                    <span>p</span><span>r</span><span>i</span><span>c</span><span>e</span>
                  </span>
                </span>
            </a>
            <?php endif; ?>
          </li>
          <li class="p-global-nav__item">
            <?php if(is_front_page()): ?>
              <a href="#about">
                <span>
                  <span>
                    <span>a</span><span>b</span><span>o</span><span>u</span><span>t</span>
                  </span>
                </span>
              </a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#about">
                <span>
                  <span>
                    <span>a</span><span>b</span><span>o</span><span>u</span><span>t</span>
                  </span>
                </span>
              </a>
            <?php endif; ?>
          </li>
          <li class="p-global-nav__item">
            <?php if(is_front_page()): ?>
              <a href="#contact">
                <span>
                  <span>
                    <span>c</span><span>o</span><span>n</span><span>t</span><span>a</span><span>c</span><span>t</span>
                  </span>
                </span>
              </a>
            <?php else: ?>
              <a href="<?php echo esc_url(home_url('/')); ?>#contact">
                <span>
                  <span>
                    <span>c</span><span>o</span><span>n</span><span>t</span><span>a</span><span>c</span><span>t</span>
                  </span>
                </span>
              </a>
            <?php endif; ?>
          </li>
        </ul>
      </nav><!-- p-global-nav -->

      
      <div class="p-header__hamburger p-hamburger" id="js-hamburger">
        <!-- c-hamburger-btn -->
        <button class="p-hamburger__btn c-btn-hamburger" id="js-hamburger-btn">
          <span></span>
          <span></span>
        </button><!-- c-hamburger-btn -->
        <!-- c-menus -->
        <div class="p-hamburger__menus c-menus" id="js-hamburger-menus">
          <span class="c-menus__menu">menu</span>
          <span class="c-menus__close">close</span>
        </div><!-- c-menus -->
      </div>

    </div>
  </header><!-- l-header -->
  