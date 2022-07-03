<?php get_header(); ?>

<!-- p-mv-blog -->
<div class="p-mv-blog" style="background-color: <?php the_field('background_color', 12); ?>; background-image: url(<?php the_field('background_image', 12); ?>)">
  <div class="p-mv-blog__inner l-inner">
    <h1 class="p-mv-blog__title" style="color: <?php the_field('title_color', 12); ?>">
      <a href="<?php echo esc_url(home_url('blog')); ?>">わたるブログ</a>
    </h1>
    <!-- l-breadcrumb -->
    <?php get_template_part('template-parts/content', 'breadcrumb'); ?>
    <!-- l-breadcrumb -->
  </div>
</div><!-- p-mv-blog -->


<!-- l-container -->
<div class="l-container p-container l-min-height">
  <div class="p-container__inner l-inner">

    <!-- l-main -->
    <main class="l-main">

      <!-- p-blog-archive -->
      <section class="p-blog-archive">
        <div class="p-blog-archive__inner">
          <div class="p-blog-archive__items p-cards-list-02">
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
                <a class="p-cards-list-02__card p-card-blog" href="<?php the_permalink(); ?>">
                  <figure class="p-card-blog__img">
                    <?php 
                      $attach_id = get_post_thumbnail_id($post->id);
                      $image = wp_get_attachment_image_src($attach_id, 'full');
                      // var_dump($image);
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
                    <div class="p-card-blog__box">
                      <h2 class="p-card-blog__title"><?php the_title(); ?></h2>
                      <div class="p-card-blog__content"><?php echo get_flexible_content(80); ?></div>
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
                </a>
              <?php endwhile; ?>
            <?php else: ?>
              <p class="p-blog-archive__not-write">記事はありませんでした。</p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </div>

          <!-- l-pagination -->
          <?php get_template_part('template-parts/content', 'pagination'); ?>
          <!-- l-pagination -->
          
        </div>
      </section><!-- p-blog-archive -->
    </main><!-- l-main -->

    <!-- l-sidebar -->
    <aside class="l-sidebar p-sidebar">
      <?php get_sidebar(); ?>
    </aside><!-- l-sidebar -->

  </div>
</div><!-- l-container -->

<?php get_footer(); ?>