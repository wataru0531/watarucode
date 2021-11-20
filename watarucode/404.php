<?php get_header(); ?>

<!-- p-mv-404 -->
<div class="p-mv-404">
  <div class="p-mv-404__inner">
    <div class="p-mv-404__title">wataru&nbsp;design</div>
  </div>
    
</div><!-- p-mv-404 -->

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

<main>
  <!-- l-404 -->
  <section class="l-404 p-404">
    <div class="p-404__inner l-inner">
      <h1 class="p-404__title">お探しのページが見つかりません。</h1>
      <div class="p-404__texts">
        <p class="p-404__text">当サイトをご覧いただきありがとうございます。</p>
        <p class="p-404__text">申し訳ありませんが、お探しのページは移動または削除された可能性があります。</p>
        <p class="p-404__text">ヘッダーよりメニューを選択されるか、トップページにお戻りください。</p>
      </div>
      
      <div class="p-404__btn">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="c-btn-top">トップページへ</a>
      </div>
    </div>
  </section><!-- l-404 -->
</main>

<?php get_footer(); ?>