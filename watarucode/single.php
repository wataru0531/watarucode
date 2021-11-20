<?php get_header(); ?>

<!-- 記事ページであるsingle.phpで、「get_the_ID()」で記事IDを取得したらそれを引数として、
setPostViews()に渡して呼び出すとその記事で設定しているメタデータ(カスタムフィールド)のPV数が+1され、
PV数のカウントが行われる。 -->
<?php
  // 記事のビュー数を更新(ログイン中・クローラーは除外)
  // ユーザー(自分自身)も入れたい場合は!is_usr_logged_in()を削除する。
  if (!is_robots()) {
    setPostViews(get_the_ID());
  }
?>

<!-- p-mv-blog -->
<div class="p-mv-blog" style="background-color: <?php the_field('background_color', 12); ?>; background-image: url(<?php the_field('background_image', 12); ?>)">
  <div class="p-mv-blog__inner">
    <div class="p-mv-blog__title" style="color: <?php the_field('title_color', 12); ?>">
      <a href="<?php echo esc_url(home_url('blog')); ?>">wataru&nbsp;log</a>
    </div>
  </div>
</div><!-- p-mv-blog -->

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

<!-- l-container -->
<div class="l-container p-container">
  <div class="p-container__inner l-inner">
    <main class="l-main">
      <article class="l-single p-single">
        <div class="p-single__post">
          <?php if(have_posts()): ?>
            <?php while(have_posts()): the_post(); ?>
              <div class="p-single__header">
                <h1 class="p-single__title"><?php the_title(); ?></h1>
                <div class="p-single__box">
                  <div class="p-single__category">
                    <span class="c-category" style="background-color: <?php the_field('background_color', 'category_' . get_the_category()[0]->cat_ID); ?>">
                      <?php
                        $category = get_the_category();
                        $category_name = $category[0]->cat_name;

                        echo $category_name;
                      ?>
                    </span>
                  </div>
                  <time class="p-single__time" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>
                </div>
              </div>
              <figure class="p-single__img">
                <?php if(has_post_thumbnail()): ?>
                  <?php the_post_thumbnail(); ?>
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog-no-image.jpeg" alt="">
                <?php endif; ?>
              </figure>
              <div class="p-single__contents">
                <?php the_content(); ?>
              </div>

            <?php endwhile; ?>
          <?php endif; ?>
        </div>

        <div class="p-single__relation p-relation">
          <div class="p-relation__header">
            <h2 class="p-relation__title">関連記事</h2>
          </div>

          <div class="p-relation__items">
            <ul class="p-blog__items">
              <?php
                $categories = get_the_categorY($post->ID);
                $category_id = [];
                
                foreach($categories as $category):
                  array_push($category_id, $category->cat_ID);
                endforeach;
              ?>

              <?php
                $args = [
                  'post__not_in' => array($post->ID), //現在の投稿を関連記事から除外、
                  'posts_per_page' => 4,
                  'category__in' => $category_id, //カテゴリーIDの配列を指定。
                  'orderby' => 'rand',
                ];
                $wp_query = new WP_Query($args);
              ?>
              <?php if($wp_query->have_posts()): ?>
                <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
                  <li class="p-blog__item p-card-blog">
                    <a class="p-card-blog__img" href="<?php the_permalink(); ?>">
                      <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(); ?>
                      <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog-no-image.jpeg" alt="">
                      <?php endif; ?>
                      <span class="c-category--absolute" style="background-color: <?php the_field('background_color', 'category_' . get_the_category()[0]->cat_ID); ?>">
                          <?php
                            $category = get_the_category();
                            $category_name = $category[0]->cat_name;
                            echo $category_name;
                          ?>
                      </span>
                    </a>
                    <div class="p-card-blog__body">
                      <div class="p-blog__box">
                        <h3 class="p-card-blog__title--black"><?php the_title(); ?></h3>
                        <div class="p-card-blog__content--black"><?php echo get_flexible_content(80); ?></div>
                      </div>
                      <time class="p-card-blog__time--black" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>
                    </div>
                  </li>
                <?php endwhile; ?>
              <?php else: ?>
                <p class="p-blog__not-found">該当する記事はありません。</p>
              <?php endif; ?>
              <?php wp_reset_postdata(); ?>
            </ul>
          </div>
          
        </div>
      </article>
    </main>

    <!-- l-sidebar -->
    <aside class="l-sidebar p-sidebar">
      <?php get_sidebar(); ?>
    </aside><!-- l-sidebar -->
  </div>
  
</div><!-- l-container -->

<?php get_footer(); ?>