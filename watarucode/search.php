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
<?php get_template_part('template-parts/content', 'breadcrumb'); ?>
<!-- p-breadcrumb -->


<!-- l-container -->
<div class="l-container p-container l-min-height">
  <div class="p-container__inner l-inner">
    <!-- l-main -->
    <main class="l-main">

      <!-- l-search -->
      <section class="l-search p-search">
        <div class="p-search__header">
          <!-- the_search_query()...検索ワード出力する。 -->
          <h1 class="p-search__title">
            「<?php the_search_query(); ?>」の検索結果

            <!-- 検索キーワードがあれば表示 -->
            <?php if(get_search_query()): ?>
              <span class="p-search__posts">-&nbsp;全<?php echo $wp_query->found_posts; ?>件&nbsp;-</span>
            <?php endif; ?>
          </h1> 
        </div>
        <div class="p-search__contents">
          
          <!-- get_search_query()...検索された文字列を取得する。 -->
          <?php if(have_posts() && get_search_query()): ?>
            <ul class="p-search__items p-cards-list-02">
              <?php while(have_posts()): the_post(); ?>
                
                <li class="p-cards-list-02__card p-card-blog">
                  <a class="p-card-blog__img" href="<?php the_permalink(); ?>">
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
                    <span class="c-category--absolute" style="background-color: <?php the_field('background_color', 'category_' . get_the_category()[0]->cat_ID); ?>">
                        <?php
                          $category = get_the_category();
                          $category_name = $category[0]->cat_name;
                          echo $category_name;
                        ?>
                    </span>
                  </a>
                  <div class="p-card-blog__body">
                    <div class="p-card-blog__box">
                      <h2 class="p-card-blog__title--black"><?php the_title(); ?></h2>
                      <div class="p-card-blog__content--black"><?php echo get_flexible_content(80); ?></div>
                    </div>
                    <time class="p-card-blog__time--black" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>
                  </div>
                </li>
              <?php endwhile; ?>
            </ul>

            <!-- l-pagination -->
            <div class="l-pagination p-pagination">
              <div class="p-pagination__inner">

                <!-- str_replace(検索文字列, 置換文字列(この文字に置き換える), 対象文字列) -->
                <!-- get_pagenum_link()...引数で与えられた数字を元にページ番号のリンクを返す。 -->
                <!-- 例：http://hogehoge.com/?paged=9999999999/ -->

                  <!-- ２ページ以上ある場合ページャーを出力 -->
                  <?php if($wp_query->max_num_pages > 1): ?>
                    <?php
                      $big = 999999999;
                      $page = get_pagenum_link($big);

                      echo paginate_links([
                        'base'         => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format'       => '',
                        'current'      => max(1, get_query_var('paged')), //現在のページを取得
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
            
          <?php elseif(! get_search_query()): ?>
            <p class="p-search__not-keyword">検索キーワードが入力されていません。</p>
          <?php else: ?>
            <p class="p-search__not-found">該当する記事は見つかりませんでした。</p>
          <?php endif; ?>

        </div>
      </section><!-- l-search -->
    </main><!-- l-main -->
    
    <!-- l-sidebar -->
    <aside class="l-sidebar p-sidebar">
      <?php get_sidebar(); ?>
    </aside><!-- l-sidebar -->

  </div>
</div><!-- l-container -->

<?php get_footer(); ?>