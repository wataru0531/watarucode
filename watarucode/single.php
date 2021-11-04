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
  // var_dump($id = get_the_ID());
?>

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

<!-- <?php var_dump($post); ?> -->
<!-- <?php var_dump($wp_query); ?> -->

<!-- l-container -->
<div class="l-container p-container">
  <div class="p-container__inner l-inner">
    <main class="l-main">
      <article class="l-single p-single">

        <?php if(have_posts()): ?>
          <?php while(have_posts()): the_post(); ?>
            <div class="p-single__header">
              <h1 class="p-single__title"><?php the_title(); ?></h1>
              <div class="p-single__box">
                <div class="p-single__category">
                  <span class="c-category" style="background-color: <?php the_field('background', 'category_' . get_the_category()[0]->cat_ID); ?>">
                    <?php
                      $category = get_the_category();
                      // var_dump($category);
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
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/rose.jpg" alt="">
              <?php endif; ?>
            </figure>
        
            <div class="p-single__content">
              <?php the_content(); ?>
            </div>

          <?php endwhile; ?>
        <?php endif; ?>

      </article>
      
    </main>


    <!-- l-sidebar -->
    <aside class="l-sidebar p-sidebar">
      <?php get_sidebar(); ?>
    </aside><!-- l-sidebar -->
  </div>
  

  

</div><!-- l-container -->

<?php get_footer(); ?>