<?php get_header(); ?>

<!-- p-mv-404 -->
<div class="p-mv-404">
  <div class="p-mv-404__inner l-inner">
    <div class="p-mv-404__title">
      <a href="<?php echo esc_url(home_url('/')); ?>">wataru&nbsp;design</a>
    </div>
    <!-- l-breadcrumb -->
    <?php get_template_part('template-parts/content', 'breadcrumb'); ?>
    <!-- l-breadcrumb -->
  </div>
</div><!-- p-mv-404 -->


<!-- l-min-height -->
<main class="l-min-height">

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
        <a class="c-btn-allow-left" href="<?php echo esc_url(home_url('/')); ?>">
          <div class="c-btn-allow-left__circle">
            <span class="c-btn-allow-left__allow">
              <span class="c-btn-allow-left__allow-tip"></span>
              <span class="c-btn-allow-left__allow-line"></span>
            </span>
          </div>
          <div class="c-btn-allow-left__text">to&nbsp;top</div>
        </a>
      </div>
    </div>
  </section><!-- l-404 -->
</main><!-- l-min-height -->

<?php get_footer(); ?>