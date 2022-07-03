<?php get_header(); ?>

<!-- p-mv-works -->
<div class="p-mv-works" style="background-image: url(<?php if(get_field('works_image', 220)){ the_field('works_image', 220); } ?>)">
  <div class="p-mv-works__inner l-inner">
    <div class="p-mv-works__header">
        <div class="p-mv-works__subtitle" style="color: <?php the_field('sub_color', 220); ?>">works</div>
        <h1 class="p-mv-works__title" style="color: <?php the_field('title_color', 220); ?>">
          <span class="p-mv-works__circle" style="background-color: <?php the_field('background_color', 220); ?>"></span>
          制作実績
        </h1>
    </div>
    <!-- l-breadcrumb -->
    <?php get_template_part('template-parts/content', 'breadcrumb'); ?>
    <!-- l-breadcrumb -->
  </div> 
</div><!-- p-mv-works -->

<!-- l-min-height -->
<main class="l-min-height">

  <!-- p-works-archive -->
  <section class="p-works-archive">
    <div class="p-works-archive__inner l-inner">
      <div class="p-works-archive__contents">

        <div class="p-works-archive__items p-cards-list-03">
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
              
              <a class="p-cards-list-03__card p-card-works" href="<?php the_permalink(); ?>">
                <figure class="p-card-works__img">
                  <?php if(get_field('image')): ?>
                    <img src="<?php the_field('image'); ?>" alt="<?php the_title_attribute(); ?>">
                  <?php else: ?>
                    <picture>
                      <source type="image/webp" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/webp/works-no-image.webp" />
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/works-no-image.jpg" alt="">
                    </picture>
                  <?php endif ?>
                </figure>
                <div class="p-card-works__body">
                  <h2 class="p-card-works__title"><?php the_title(); ?></h2>
                </div>
              </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>

        </div>
      </div>
    </div>
    
    <!-- l-pagination -->
    <?php get_template_part('template-parts/content', 'pagination'); ?>
    <!-- l-pagination -->

  </section><!-- p-works-archive -->

  </main><!-- l-min-height -->
  
<?php get_footer(); ?>