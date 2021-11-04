<?php get_header(); ?>
<!-- <?php var_dump($post); ?> -->
<!-- <?php var_dump($wp_query); ?> -->

<!-- l-mv-blog -->
<div class="l-mv-blog p-mv-blog">
  <div class="p-mv-blog__inner">
    <div class="p-mv-blog__title">
      <a href="<?php echo esc_url(home_url('blog')); ?>">wataru&nbsp;log</a>
    </div>
  </div>
</div><!-- l-mv-blog -->

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

<!-- <?php
var_dump($wp_query);
?> -->
<!-- <?php
  var_dump($post);
?> -->
<!-- <?php
  $category = get_categories();
  var_dump($category);
?> -->
<!-- <?php
  $category = get_category($cat);
  var_dump($category);
?> -->

<!-- l-container -->
<div class="l-container p-container">
  <div class="p-container__inner l-inner">
    <main class="l-main">
      <section class="l-blog p-blog">
        <div class="p-blog__header">
          <h1 class="p-blog__category-title">
            <?php
              // category.phpでは、変数$catには現在表示されているカテゴリーのIDが自動的に入る
              $category = get_category($cat);
              // var_dump($category);
              $category_name = $category->cat_name;
              echo $category_name;
            ?>
            <span>-&nbsp;category&nbsp;-</span>
          </h1>
        </div>
        <ul class="p-blog__items">
          <?php $paged = get_query_var('paged')? get_query_var('paged') : 1; ?>
          <!-- <?php var_dump($paged); ?> -->
          <?php
            $category = get_category($cat);
            // var_dump($category);
            $cat_id = $category->cat_ID;
          ?>
          <?php
            $args = [
              'post_type' => 'post',
              'paged' => $paged,
              'cat' => $cat_id,
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
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/rose.jpg" alt="">
                  <?php endif; ?>
                  <span class="c-category--absolute" style="background-color: <?php the_field('background', 'category_' . get_the_category()[0]->cat_ID); ?>">
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
                    <h2 class="p-card-blog__title--black"><?php the_title(); ?></h2>
                    <div class="p-card-blog__content--black"><?php echo get_flexible_content(80); ?></div>
                  </div>
                  <time class="p-card-blog__time--black" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>
                </div>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>

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
                // var_dump($page);

                $num = get_query_var($paged);
                // var_dump($num);

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
      </section>
    </main>
  
    <!-- l-sidebar -->
    <aside class="l-sidebar p-sidebar">
      <?php get_sidebar(); ?>
    </aside><!-- l-sidebar -->
  </div>
  
</div><!-- l-container -->

<?php get_footer(); ?>