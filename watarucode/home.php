<?php get_header(); ?>

<!-- p-mv-blog -->
<div class="p-mv-blog" style="background-color: <?php the_field('background_color', 12); ?>; background-image: url(<?php the_field('background_image', 12); ?>)">
  <div class="p-mv-blog__inner">
    <h1 class="p-mv-blog__title" style="color: <?php the_field('title_color', 12); ?>">
      <a href="<?php echo esc_url(home_url('blog')); ?>">wataru&nbsp;log</a>
    </h1>
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
      <section class="l-blog p-blog">
        <div class="p-blog__inner">
          <ul class="p-blog__items">

            <?php $paged = get_query_var('paged')? get_query_var('paged') : 1; ?>
            <?php
              $args = [
                'post_type' => 'post',
                'paged' => $paged,
                'posts_per_page' => 10,
                'order' =>  'DESC',
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
                      <h2 class="p-card-blog__title--black"><?php the_title(); ?></h2>
                      <div class="p-card-blog__content--black"><?php echo get_flexible_content(80); ?></div>
                    </div>
                    <time class="p-card-blog__time--black" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>
                  </div>
                </li>
              <?php endwhile; ?>
            <?php else: ?>
              <p class="p-blog__not-write">記事はありませんでした。</p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </ul>

          <!-- l-pagination -->
          <div class="l-pagination p-pagination">
            <div class="p-pagination__inner">

            <!-- str_replace(検索文字列, 置換文字列, 対象文字列) -->
            <!-- get_pagenum_link()...引数で与えられた数字を元にページ番号のリンクを返す。 -->
            <!-- 例：http://hogehoge.com/?paged=9999999999/ -->

              <?php if($wp_query->max_num_pages > 1): ?>
                <?php
                  $big = 999999999;
                  $page = get_pagenum_link($big);
                  $num = get_query_var($paged);

                  echo paginate_links([
                    'base'         => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format'       => '',
                    'current'      => max(1, get_query_var('paged')),
                    'total'        => $wp_query->max_num_pages,
                    'prev_next'    => true,
                    'prev_text'    => 'PREV',
                    'next_text'    => 'NEXT',
                    'type'         => 'plain',
                    'end_size'     => 1, //端の数字
                    'mid_size'     => 1  //currentの左右
                  ]);
                ?>
              <?php endif; ?>
            </div>
          </div><!-- l-pagination -->

        </div>
      </section>
    </main>

    <!-- l-sidebar -->
    <aside class="l-sidebar p-sidebar">
      <?php get_sidebar(); ?>
    </aside><!-- l-sidebar -->
  </div>
  

  

</div><!-- l-container -->

<?php get_footer(); ?>