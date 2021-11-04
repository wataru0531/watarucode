<?php get_header(); ?>


<!-- l-blog-mv -->
<div class="l-blog-mv p-blog-mv">
  <div class="p-blog-mv__inner l-inner">
    <div class="p-blog-mv__header">
      <div class="p-blog__title">
        <a href="">
          wataru&nbsp;log
        </a>
      </div>
    </div>

    <form class="l-search__form p-search__form" role="search" method="get" action="<?php echo esc_url('/'); ?>">
      <div class="p-search__form__inner">
        <input class="p-search__input" type="text" name="s" placeholder="検索" value="<?php the_search_query(); ?>">
        <button class="p-search__btn">検索</button>
      </div>
    </form>

  </div>
</div><!-- l-blog-mv -->


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



<section>
  <!-- the_search_query()...検索ワード出力する。 -->
  <h1>「<?php the_search_query(); ?>」の検索結果</h1> 
  <!-- found_posts...現在のクエリ変数に一致する投稿の合計数 -->
  <div class="">全<?php echo $wp_query->found_posts; ?>件</div>
</section>

<div class="">
  <!-- <?php
    $query = get_search_query();
    var_dump($query);
  ?> -->
  <!-- get_search_query()...検索された文字列を取得する。 -->
  <?php if(have_posts() && get_search_query()): ?>
    <?php while(have_posts()): the_post(); ?>

      <h2><?php the_title(); ?></h2>
      <div><?php the_content(); ?></div>

    <?php endwhile; ?>
  <?php elseif(! get_search_query()): ?>
    <p>検索キーワードが入力されていません。</p>
  <?php else: ?>
    <p>該当する記事は見つかりませんでした。</p>
  <?php endif; ?>

</div>


<?php get_footer(); ?>