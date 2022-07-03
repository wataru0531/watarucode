<?php get_header(); ?>

<!-- p-mv-works -->
<div class="p-mv-works" style="background-image: url(<?php if(get_field('works_image', 255)){ the_field('works_image', 255); } ?>)">
  <div class="p-mv-works__inner l-inner">
    <div class="p-mv-works__header">
      <h1 class="p-mv-works__title-single js-animate-title" style="color: <?php the_field('title_color', 255); ?>"><?php single_post_title(); ?></h1>
    </div>

    <!-- l-breadcrumb -->
    <?php get_template_part('template-parts/content', 'breadcrumb'); ?>
    <!-- l-breadcrumb -->
  </div>
</div><!-- p-mv-works -->


<!-- l-min-height -->
<main class="l-min-height">

  <!-- p-works-single -->
  <section class="p-works-single">
    <div class="p-works-single__inner l-inner">
      
      <!-- p-works-single__block -->
      <div class="p-works-single__block-flex">

        <div class="p-works-single__contents">
          <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>

              <!-- 画像 -->
              <figure class="p-works-single__img">
                <?php if(get_field('image')): ?>
                  <picture>
                    <source media="(min-width: 768px)" srcset="<?php the_field('image_large'); ?>" />
                    <img src="<?php the_field('image'); ?>" alt="<?php the_title_attribute(); ?>">
                  </picture>
                <?php else: ?>
                  <picture>
                    <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/webp/works-no-image.webp" />
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/works-no-image.jpg" alt="">
                  </picture>
                <?php endif; ?>
              </figure>

              <div class="p-works-single__line"></div>

              <div class="p-works-single__information">
                <!-- url -->
                <?php if(get_field('url')): ?>
                  <div class="p-works-single__url">
                    <a href="<?php the_field('url'); ?>" target="_blank"><?php the_field('url'); ?></a>
                  </div>
                <?php endif; ?>
                <!-- ユーザー名 -->
                <?php if(get_field('user_name')): ?>
                  <div class="p-works-single__user">
                    ユーザー名：<?php the_field('user_name'); ?>
                  </div>
                <?php endif; ?>
                <!-- パスワード -->
                <?php if(get_field('password')): ?>
                  <div class="p-works-single__password">
                    パスワード：<?php the_field('password'); ?>
                  </div>
                <?php endif; ?>
                <!-- コメント -->
                <?php if(get_field('comment')): ?>
                  <div class="p-works-single__comment">
                    <?php the_field('comment'); ?>
                  </div>
                <?php endif; ?>

                <dl class="p-works-single__list p-list-introduction">
                  <!-- 仕様 -->
                  <?php if(get_field('specification')): ?>
                    <div class="p-list-introduction__block">
                      <dt class="p-list-introduction__title">仕様</dt>
                      <dd class="p-list-introduction__detail"><?php the_field('specification'); ?></dd>
                    </div>
                  <?php endif; ?>
                  <!-- ページ数 -->
                  <?php if(get_field('pages')): ?>
                    <div class="p-list-introduction__block">
                      <dt class="p-list-introduction__title">ページ数</dt>
                      <dd class="p-list-introduction__detail"><?php the_field('pages'); ?>ページ</dd>
                    </div>
                  <?php endif; ?>
                  <!-- 制作範囲 -->
                  <?php if(get_field('range')): ?>
                    <div class="p-list-introduction__block">
                      <dt class="p-list-introduction__title">制作範囲</dt>
                      <dd class="p-list-introduction__detail"><?php the_field('range'); ?></dd>
                    </div>
                  <?php endif; ?>
                  <!-- 使用言語 -->
                  <?php if(get_field('use_language')): ?>
                    <div class="p-list-introduction__block">
                      <dt class="p-list-introduction__title">使用言語</dt>
                      <dd class="p-list-introduction__detail"><?php the_field('use_language'); ?></dd>
                    </div>
                  <?php endif; ?>
                </dl>
              </div>

              <!-- ページネーション -->
              <div class="p-works-single__pagination">
                
                <div class="p-works-single__previous">
                  <?php if(get_next_post()): ?>
                    <!-- %link...aタグで表示させる記述 -->
                    <?php next_post_link('%link', ''); ?>
                  <?php endif; ?>
                </div>

                <div class="p-works-single__next">
                  <?php if(get_previous_post()): ?>
                    <!-- %link...aタグで表示させる記述 -->
                    <?php previous_post_link('%link', ''); ?>
                  <?php endif; ?>
                </div>
              </div>

            <?php endwhile; ?>
          <?php endif; ?>
        </div>

        <!-- stickyコンテナー -->
        <div class="p-works-single__sticky p-works-sticky">
          <div class="p-works-sticky__item">
            <div class="p-works-sticky__btn">
              <a class="c-btn-allow-left" href="<?php echo esc_url(home_url('works')); ?>">
                <div class="c-btn-allow-left__circle">
                  <span class="c-btn-allow-left__allow">
                    <span class="c-btn-allow-left__allow-tip"></span>
                    <span class="c-btn-allow-left__allow-line"></span>
                  </span>
                </div>
                <div class="c-btn-allow-left__text">back&nbsp;to&nbsp;list</div>
              </a>
            </div>
          </div>
        </div><!-- stickyコンテナー -->

      </div><!-- p-works-single__block -->

    </div>
  </section><!-- p-works-single -->

  </main><!-- l-min-height -->
  
<?php get_footer(); ?>