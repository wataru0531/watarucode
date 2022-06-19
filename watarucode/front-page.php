<?php get_header(); ?>

<!-- p-mv -->
<div class="p-mv">
  <h1 class="p-mv__title js-inview" style="color: <?php the_field('title_color', 10); ?>">wataru<br>design</h1>

  <a class="p-mv__scroll c-scroll-down" href="#concept" style="color: <?php the_field('scroll_color', 10); ?>">
    scroll
    <span class="c-scroll-down__circle" style="background-color: <?php the_field('line_color', 10); ?>"></span>
  </a>
  <?php $slider_images = SCF::get('slider_images', 10); ?>
  <?php if($slider_images[0]['image']): ?>
    <div class="swiper swiper-mv">
      <div class="swiper-wrapper">
        <?php foreach($slider_images as $slider_image): ?>
          <div class="swiper-slide">
            <div class="slide-img">
              <img src="<?php echo wp_get_attachment_url($slider_image['image']); ?>" alt="">
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php else: ?>
  <!-- swiper画像が登録されていなかった場合に表示 -->
    <?php if(get_field('mv_image')): ?>
    <!-- ACFに画像が登録されていれば表示 -->
      <div class="p-mv__img">
        <img src="<?php the_field('mv_image', 10); ?>" alt="">
      </div>
    <?php endif; ?>
  <?php endif; ?>
</div><!-- p-mv -->

<!-- l-min-height -->
<main class="l-min-height">

  <!-- p-concept -->
  <section class="p-concept js-inview" id="concept">
    <div class="p-concept__inner l-inner">
      <div class="p-concept__header">
        <div class="p-concept__background-text">
          <span class="c-background-text">concept</span>
        </div>
        <div class="c-section-subtitle">concept</div>
        <h2 class="c-section-title">コンセプト</h2>
      </div>
      <div class="p-concept__contents">
        <p class="p-concept__text">
          当サイトをご覧いただきありがとうございます。<br>
          WEB制作の実装者（コーダー）として活動しています。<br>
          主にデザインカンプからのコーディングのお仕事を承っております。<br>
          以下の考え方のもと制作に取り組んでいます。
        </p>
        <p class="p-concept__text">
          デザインを忠実に再現<br>
          保守性を考えた実装<br>
          ものづくりを楽しむ<br>
        </p>
        <p class="p-concept__text">
          デザインの再現と保守を両立させ、完成度の高い実装を施していくことを目標としています。
        </p>
      </div>
    </div>
  </section><!-- p-concept -->

  <!-- l-works -->
  <section class="l-works p-works js-inview" id="works">
    <div class="p-works__inner l-inner">
      <div class="p-works__background-text">
        <span class="c-background-text--gray">works</span>
      </div>
      <div class="p-works__header">
        <div class="c-section-subtitle">works</div>
        <h2 class="c-section-title">制作実績</h2>
      </div>
      <div class="p-works__contents">
        <div class="swiper swiper-works">
          <div class="swiper-pagination"></div>
          <ul class="swiper-wrapper">
            <?php
              $args = [
                'post_type' => 'works',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC',
              ];
              $wp_query = new WP_Query($args);
            ?>
            <?php if($wp_query->have_posts()): ?>
              <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
                
                <li class="swiper-slide p-card-works">
                  <a class="p-card-works__img" href="<?php the_permalink(); ?>">
                    <?php if(get_field('image')): ?>
                      <img src="<?php the_field('image'); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php else: ?>
                      <picture>
                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/webp/works-no-image.webp" />
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/works-no-image.jpg" alt="">
                      </picture>
                    <?php endif; ?>
                  </a>
                  <div class="p-card-works__body">
                    <h3 class="p-card-works__title"><?php the_title(); ?></h3>
                  </div>
                </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
      <div class="p-works__btn">
        <a class="c-btn-view" href="<?php echo esc_url(home_url('works')); ?>">view&nbsp;more</a>
      </div>
    </div>
  </section><!-- l-works -->

  <!-- l-blog -->
  <section class="l-blog p-blog js-inview" id="blog">
    <div class="p-blog__background-text l-inner">
      <span class="c-background-text--gray">blog</span>
    </div>
    <div class="p-blog__header l-inner">
      <div class="c-section-subtitle">blog</div>
      <h2 class="c-section-title">ブログ</h2>
    </div>
    <div class="p-blog__over-inner">
      <div class="p-blog__inner l-inner">
        <div class="swiper swiper-blog p-blog__swiper">
          <ul class="swiper-wrapper p-blog__items">
            <?php
              $args = [
                'post_type' => 'post',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC'
              ];
              $wp_query = new WP_Query($args);
            ?>
            <?php if($wp_query->have_posts()): ?>
              <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
                <li class="swiper-slide p-blog__item p-card-blog">
                  <a class="p-card-blog__img" href="<?php the_permalink(); ?>">
                    <?php 
                      $attach_id = get_post_thumbnail_id($post->ID);
                      // var_dump($attach_id);
                      $image = wp_get_attachment_image_src($attach_id, 'full');
                      // var_dump($image);
                    ?>
                    <?php if($image): ?>
                      <img src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>">
                    <?php else: ?>
                      <picture>
                        <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/webp/blog-no-image.webp" />
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-no-image.jpeg" alt="">
                      </picture>
                    <?php endif; ?>
                    <span class="p-card-blog__category" style="background-color: <?php the_field('background_color', 'category_' . get_the_category()[0]->cat_ID); ?>">
                        <?php
                          $category = get_the_category();
                          $category_name = $category[0]->cat_name;
                          echo $category_name;
                        ?>
                    </span>
                  </a>
                  <div class="p-card-blog__body">
                    <div class="p-card-blog__box">
                      <h3 class="p-card-blog__title"><?php the_title(); ?></h3>
                      <div class="p-card-blog__content"><?php echo get_flexible_content(60); ?></div>
                    </div>
                    <time class="p-card-blog__time" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>
                  </div>
                </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </ul>
          <!-- swiperページネーション -->
          <div class="swiper-pagination"></div>
        </div>
        <div class="p-blog__box">
          <p class="p-blog__description">
            実装の過程や学習で学んだことについて発信します。
          </p>
          <div class="p-blog__btn">
            <a class="c-btn-blog" href="<?php echo esc_url(home_url('blog')); ?>">WATARU&nbsp;LOGへ</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- l-blog -->

  <!-- l-price -->
  <section class="l-price p-price js-inview" id="price">
    <div class="p-price__inner l-inner">
      <div class="price__background-text">
        <span class="c-background-text--gray">price</span>
      </div>
      <div class="p-price__header">
        <div class="c-section-subtitle">price</div>
        <h2 class="c-section-title">価格</h2>
      </div>
      <div class="p-price__description">
        価格は目安となります。<br>
        詳しい価格については柔軟に対応させていただきます。
      </div>
      <div class="p-price__contents">
        <dl class="p-price__lists p-menu">
          <!-- スマートカスタムフィールド繰り返しフィールド -->
          <?php $price_menus = scf::get('price_menus', 10); ?>
          <?php foreach($price_menus as $menu): ?>
            <div class="p-menu__block">
              <dt class="p-menu__title"><?php echo $menu['title']; ?></dt>
              <dd class="p-menu__price"><?php echo $menu['price']; ?>円〜</dd>
            </div>
          <?php endforeach; ?>
        </dl>
      </div>
    </div>
  </section>
  <!-- l-price -->

  <!-- l-about -->
  <section class="l-about p-about js-inview" id="about">
    <div class="p-about__inner l-inner">
      <div class="p-about__header">
        <div class="p-about__background-text">
          <span class="c-background-text">about</span>
        </div>
        <div class="c-section-subtitle">about</div>
        <h2 class="c-section-title">制作者について</h2>
      </div>
      <div class="p-about__contents">
        <figure class="p-about__img">
          <?php if(get_field('face_image', 10)): ?>
            <img src="<?php the_field('face_image', 10); ?>" alt="">
          <?php else: ?>
            <picture>
              <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/webp/face-no-image.webp" />
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/face-no-image.jpg" alt="">
            </picture>
          <?php endif; ?>
        </figure>
        <div class="p-about__profiles">
          <div class="p-about__profile p-profile">
            <h3 class="p-profile__title">profile</h3>
            <div class="p-profile__contents">
              <?php if(get_field('resident', 10)): ?>
                <p class="p-profile__resident"><?php the_field('resident', 10); ?></p>
              <?php endif; ?>
              <?php if(get_field('hobby', 10)): ?>
                <p class="p-profile__hobby"><?php the_field('hobby', 10); ?></p>
              <?php endif; ?>
            </div>
          </div>
          <div class="p-about__skill p-skill">
            <h3 class="p-skill__title">skill</h3>
            <div class="p-skill__skills">
              <?php the_field('skill', 10); ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- l-about -->

  <!-- l-contact -->
  <section class="l-contact p-contact js-inview" id="contact">
    <div class="p-contact__inner l-inner">
      <div class="p-contact__background-text">
        <span class="c-background-text--gray">contact</span>
      </div>
      <div class="p-contact__header">
        <div class="c-section-subtitle">contact</div>
        <h2 class="c-section-title">お問い合わせ</h2>
      </div>
      <div class="p-contact__description">
        <p class="p-contact__text">
          制作の依頼、ご質問などお気軽にお問い合わせください。
        </p>
        <p class="p-contact__text">
          必須の項目は必ずご記入お願いします。
        </p>
      </div>
      <!-- コンタクトフォーム7をショートコードで表示 -->
      <?php echo do_shortcode('[contact-form-7 id="9" title="お問い合わせ"]'); ?>
    </div>
  </section><!-- l-contact -->

</main><!-- l-min-height -->

<?php get_footer(); ?>