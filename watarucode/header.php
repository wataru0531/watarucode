<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri();?>/assets/images/favicon/apple-touch-icon.png">

  <?php wp_head(); ?>
</head>
<body>
  <!-- ソースコードをご覧いただきありがとうございます。(人-) -->
  <!-- 何かお気づきのことやご質問ありましたらTwitterの方でDMをいただけたら幸いです。 -->
  <!-- 今後とも宜しくお願いいたします。 -->
  <!--  -->

<!-- l-global-container -->
<div class="l-global-container js-global-container">

  <!-- l-opening -->
  <div class="l-opening p-opening js-opening">
      <div class="p-opening__box">
        <div class="p-opening__title js-opening-title">
          <span>w</span><span>a</span><span>t</span><span>a</span><span>r</span><span>u</span><span>&nbsp;</span><span>d</span><span>e</span><span>s</span><span>i</span><span>g</span><span>n</span>
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

      <!-- c-hamburger-btn -->
      <div class="p-header__hamburger p-hamburger js-hamburger">
        <button class="p-hamburger__btn c-btn-hamburger js-hamburger-btn">
          <span></span>
          <span></span>
        </button>
        <div class="p-hamburger__menus c-menus js-hamburger-menus">
          <span class="c-menus__menu">menu</span>
          <span class="c-menus__close">close</span>
        </div>
      </div><!-- c-hamburger-btn -->

    </div>
  </header><!-- l-header -->
  