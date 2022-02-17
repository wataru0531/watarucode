<?php get_header(); ?>

<!-- p-mv-works -->
<div class="p-mv-works" style="background-image: url(<?php if(get_field('works_image', 220)){ the_field('works_image', 220); } ?>)">
  <div class="p-mv-works__inner l-inner">
    <div class="p-mv-works__header">
        <div class="p-mv-works__subtitle" style="color: <?php the_field('sub_color', 220); ?>">works</div>
        <h1 class="p-mv-works__title" style="color: <?php the_field('title_color', 220); ?>">
          <span class="p-mv-works__line" style="background-color: <?php the_field('background_color', 220); ?>"></span>
          制作実績
        </h1>
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

<main class="l-min-height">

  <!-- p-works -->
  <section class="p-works">
    <div class="p-works__inner l-inner">
      <div class="p-works__contents">
        <ul class="p-works__items">
          <?php $paged = get_query_var('paged')? get_query_var('paged') : 1; ?>
          <?php
            $args = [
              'post_type' => 'works',
              'paged' => $paged,
              'posts_per_page' => 6,
              'orderby' => 'date',
              'order' => 'DESC',
            ];
            $wp_query = new WP_Query($args);
          ?>
          <?php if($wp_query->have_posts()): ?>
            <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
              <li class="p-works__item p-card-works">
                <a class="p-card-works__img" href="<?php the_permalink(); ?>">
                  <img src="<?php the_field('image'); ?>" alt="">
                </a>
                <div class="p-card-works__body">
                  <h2 class="p-card-works__title"><?php the_title(); ?></h2>
                </div>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>

        </ul>
      </div>
    </div>
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
    </div>
  </section><!-- p-works -->

  </main>
  
<?php get_footer(); ?>