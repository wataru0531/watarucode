<?php get_header(); ?>
  <!-- 各ページのurl -->
  <?php
    $top = esc_url(home_url('/'));

  ?>

  <!-- l-service -->
  <section class="l-service p-service">
    <div class="p-service__inner">
      <div class="p-service__header">
        <div class="c-section-subtitle">サブタイトル</div>
        <h2 class="c-section-title">サービス</h2>
      </div>

      <div class="p-service__btn">
        <a class="c-btn" href="">サービス一覧へ</a>
      </div>
    </div>
  </section><!-- l-service -->


<?php get_footer(); ?>