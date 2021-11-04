<!-- 検索バー -->
<form class="p-mv-blog__form p-search-form" role="search" method="get" action="<?php echo esc_url('/'); ?>">
  <!-- the_search_query()...検索ワード出力する。 -->
  <input class="p-search-form__input" type="text" name="s" placeholder="検索" value="<?php the_search_query(); ?>">

  <button class="p-search-form__btn">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/search.png" alt="">
  </button>
</form>

<!-- 運営者情報 -->
<div class="p-sidebar__administrator p-administrator">
  <figure class="p-administrator__img">
    <?php if(get_field('image', 12)): ?>
      <img src="<?php the_field('image', 12); ?>" alt="わたる">
    <?php else: ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/wall03.jpg" alt="">
    <?php endif; ?>
  </figure>
  <div class="p-administrator__name"><?php the_field('name', 12); ?></div>
  <div class="p-administrator__job"><?php the_field('job', 12); ?></div>
  <div class="p-administrator__text">
    <?php the_field('text', 12); ?>
  </div>

  <figure class="p-administrator__painting">
    <?php if(get_field('painting', 12)): ?>
      <img src="<?php the_field('painting', 12); ?>" alt="">
    <?php else: ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/wall03.jpg" alt="">
    <?php endif; ?>
    </figure>

  <div class="p-administrator__btn">
    <a class="c-btn-normal" href="<?php echo home_url('/'); ?>#contact">お問い合わせはこちら</a>
  </div>
</div><!-- 運営者情報 -->

<!-- よく見られている記事 -->
<div class="p-sidebar__popular p-popular">
  <div class="p-popular__header">
    <h2 class="p-popular__title">よく見られている記事</h2>
  </div>
  <ul class="p-popular__items">
    <?php
      $args = [
        'post_type' => 'post',
        'posts_per_page' => 5,
        'meta_key' => 'post_views_count', //カスタムフィールドのキーを指定。functions.phpでキーを設定している。
        'orderby' => 'meta_value_num', //カスタムフィールドの数値順で並び替え。
        'order'=>'DESC',
      ];
      $wp_query = new WP_Query($args);
    ?>
    <?php if($wp_query->have_posts()): ?>
      <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
        <li class="p-popular__item p-card-blog">
          <a class="p-card-blog__img" href="<?php the_permalink(); ?>">
            <?php if(has_post_thumbnail()): ?>
              <?php the_post_thumbnail(); ?>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/rose.jpg" alt="">
            <?php endif; ?>
            <span class="c-category--absolute" style="background-color: <?php the_field('background', 'category_' . get_the_category()[0]->cat_ID); ?> ">
              <?php
              $category = get_the_category();
              // var_dump($category);
              $category_name = $category[0]->cat_name;

              echo $category_name;
              ?>
            </span>
          </a>
          <div class="p-card-blog__body">
            <div class="p-blog__box">
              <h3 class="p-card-blog__title--black"><?php the_title(); ?></h3>
            </div>
            <time class="p-card-blog__time--black" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>
          </div>

          <!-- 閲覧数を表示する -->
          <!-- <?php echo getPostViews($post->ID); ?> -->
        </li>
      <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </ul>
</div><!-- よく見られている記事 -->

<!-- カテゴリー一覧 -->
<div class="p-sidebar_category p-category">
  <div class="p-category__header">
    <h2 class="p-category__title">カテゴリー</h2>
  </div>
  <ul class="p-category__items">
    <?php
      $args = [
        'orderby' => 'id',
        'order' => 'ASC'
      ];
      $categories = get_categories($args);
      // var_dump($categories);
    ?>
    <?php foreach($categories as $category): ?>
      <li class="p-category__item">
        <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?>（<?php echo $category->count; ?>）</a>
      </li>
    <?php endforeach; ?>

  </ul>
</div><!-- カテゴリー一覧 -->