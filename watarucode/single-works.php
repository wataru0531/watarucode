<?php get_header(); ?>
<!-- <?php var_dump($post); ?> -->

<!-- l-sub-mv -->
<div class="l-mv-works p-mv-works" style="background-image: url(<?php if(get_field('single_image', 220)){ the_field('single_image', 220); } ?>)">
  <div class="p-mv-works__inner l-inner">
    <div class="p-mv-works__header">
        <h1 class="p-mv-works__title--single"><?php single_post_title(); ?></h1>
    </div>
  </div>
</div><!-- l-sub-mv -->

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

<main>
  <section class="l-introduction p-introduction">
    <div class="p-introduction__inner l-inner">

      <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>



          <figure class="p-introduction__img">
            <img src="<?php the_field('image'); ?>" alt="">
          </figure>

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
  </section>

  </main>
  
<?php get_footer(); ?>