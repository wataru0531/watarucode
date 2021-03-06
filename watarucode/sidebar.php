<div class="p-sidebar__sticky">

    <!-- 検索バー -->
    <div class="p-sidebar__search-form">
      <form class="c-search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <!-- the_search_query()...検索ワード出力する。 -->
        <input class="c-search-form__input" type="text" name="s" placeholder="検索" value="<?php the_search_query(); ?>">

        <button type="submit" class="c-search-form__btn">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.png" alt="">
        </button>
      </form>
    </div>

    <!-- 運営者情報 -->
    <div class="p-sidebar__administrator p-administrator">
      <figure class="p-administrator__img">
        <?php if(get_field('image', 12)): ?>
          <img src="<?php the_field('face_image', 12); ?>" alt="わたる">
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
        <?php endif; ?>
        </figure>

      <div class="p-administrator__btn">
        <a class="c-btn-normal" href="<?php echo home_url('/'); ?>#contact">お問い合わせはこちら</a>
      </div>
    </div><!-- 運営者情報 -->

    <!-- よく読まれている記事 -->
    <div class="p-sidebar__popular p-popular">
      <div class="p-popular__header">
        <h2 class="p-popular__title">よく読まれている記事</h2>
      </div>
      <div class="p-popular__items">
        <?php
          $args = [
            'post_type' => 'post',
            'posts_per_page' => 3,
            'meta_key' => 'post_views_count', //カスタムフィールドのキーを指定。functions.phpでキーを設定している。
            'orderby' => 'meta_value_num', //カスタムフィールドの数値順で並び替え。
            'order'=>'DESC',
          ];
          $wp_query = new WP_Query($args);
        ?>
        <?php if($wp_query->have_posts()): ?>
          <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
            
            <a class="p-popular__item p-card-blog" href="<?php the_permalink(); ?>">
                <figure class="p-card-blog__img">
                  <?php 
                    $attach_id = get_post_thumbnail_id($post->ID);
                    $image = wp_get_attachment_image_src($attach_id, 'full');
                  ?>
                  <?php if($image): ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>">
                  <?php else: ?>
                    <picture>
                      <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/webp/blog-no-image.webp" />
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-no-image.jpeg" alt="">
                    </picture>
                  <?php endif; ?>
                </figure>
                <div class="p-card-blog__body">
                  <div class="p-card-blog">
                    <h3 class="p-card-blog__title"><?php the_title(); ?></h3>
                  </div>
                  <div class="p-card-blog__meta">
                    <span class="c-category-blog" style="background-color: <?php the_field('background_color', 'category_' . get_the_category()[0]->cat_ID); ?>">
                        <?php
                          $category = get_the_category();
                          $category_name = $category[0]->cat_name;
                          echo $category_name;
                        ?>
                    </span>
                    <time class="p-card-blog__time" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>
                  </div>
                </div>

                <!-- 閲覧数を表示する -->
                <!-- <?php echo getPostViews($post->ID); ?> -->
            </a>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div><!-- よく読まれている記事 -->

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
        ?>
        <?php foreach($categories as $category): ?>
          <li class="p-category__item">
            <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?>（<?php echo $category->count; ?>）</a>
          </li>
        <?php endforeach; ?>

      </ul>
    </div><!-- カテゴリー一覧 -->
  
</div>
