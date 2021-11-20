<?php get_header(); ?>

<!-- p-mv-works -->
<div class="p-mv-works" style="background-image: url(<?php if(get_field('works_image', 255)){ the_field('works_image', 255); } ?>)">
  <div class="p-mv-works__inner l-inner">
    <div class="p-mv-works__header">
        <h1 class="p-mv-works__title-single js-animate-title" style="color: <?php the_field('title_color', 255); ?>"><?php single_post_title(); ?></h1>
    </div>
  </div>
</div><!-- p-mv-works -->

<!-- p-breadcrumb -->
<div class="p-breadcrumb">
  <div class="p-breadcrumb__inner l-inner">
    <?php
      if(function_exists('bcn_display')){
        bcn_display();
      }
    ?>
  </div>
</div><!-- p-breadcrumb -->

<main>
  <!-- p-introduction -->
  <section class="p-introduction">
    <div class="p-introduction__inner l-inner">
      <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>

          <!-- 画像 -->
          <figure class="p-introduction__img">
            <?php if(get_field('image')): ?>
              <img src="<?php the_field('image'); ?>" alt="">
            <?php endif; ?>
          </figure>

          <div class="p-introduction__line"></div>

          <div class="p-introduction__contents">
            <!-- url -->
            <?php if(get_field('url')): ?>
              <div class="p-introduction__url">
                <a href="<?php the_field('url'); ?>" target="_blank"><?php the_field('url'); ?></a>
              </div>
            <?php endif; ?>
            <!-- ユーザー名 -->
            <?php if(get_field('user_name')): ?>
              <div class="p-introduction__user">
                ユーザー名：<?php the_field('user_name'); ?>
              </div>
            <?php endif; ?>
            <!-- パスワード -->
            <?php if(get_field('password')): ?>
              <div class="p-introduction__password">
                パスワード：<?php the_field('password'); ?>
              </div>
            <?php endif; ?>
            <!-- コメント -->
            <?php if(get_field('comment')): ?>
              <div class="p-introduction__comment">
                <?php the_field('comment'); ?>
              </div>
            <?php endif; ?>

            <dl class="p-introduction__list p-introduction-list">
              <!-- 仕様 -->
              <?php if(get_field('specification')): ?>
                <div class="p-introduction-list__block">
                  <dt class="p-introduction-list__title">仕様</dt>
                  <dd class="p-introduction-list__detail"><?php the_field('specification'); ?></dd>
                </div>
              <?php endif; ?>
              <!-- ページ数 -->
              <?php if(get_field('pages')): ?>
                <div class="p-introduction-list__block">
                  <dt class="p-introduction-list__title">ページ数</dt>
                  <dd class="p-introduction-list__detail"><?php the_field('pages'); ?>ページ</dd>
                </div>
              <?php endif; ?>
              <!-- 制作範囲 -->
              <?php if(get_field('range')): ?>
                <div class="p-introduction-list__block">
                  <dt class="p-introduction-list__title">制作範囲</dt>
                  <dd class="p-introduction-list__detail"><?php the_field('range'); ?></dd>
                </div>
              <?php endif; ?>
              <!-- 使用言語 -->
              <?php if(get_field('use_language')): ?>
                <div class="p-introduction-list__block">
                  <dt class="p-introduction-list__title">使用言語</dt>
                  <dd class="p-introduction-list__detail"><?php the_field('use_language'); ?></dd>
                </div>
              <?php endif; ?>
            </dl>
          </div>

          <div class="p-introduction__pagination">
            <?php if(get_next_post()): ?>
              <div class="p-introduction__previous">
                <?php next_post_link('%link', 'PREV'); ?>
              </div>
            <?php endif; ?>

            <?php if(get_previous_post()): ?>
              <div class="p-introduction__next">
                <?php previous_post_link('%link', 'NEXT'); ?>
              </div>
            <?php endif; ?>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </section><!-- p-introduction -->

  </main>
  
<?php get_footer(); ?>