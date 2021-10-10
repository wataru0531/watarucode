  </main>
  <!-- 各ページのurl -->
  <?php
    $top = esc_url(home_url('/'));

  ?>
  
<footer class="l-footer p-footer">
  <div class="p-footer__inner">

    <!-- p-footer-nav -->
    <div class="p-footer__footer-nav p-footer-nav">
      <ul class="p-footer-nav__items">
        <li class="p-footer-nav__item">
          <a href="<?php echo $top ?>">トップ</a>
        </li>
        <li class="p-footer-nav__item">
          <a href="">フッターアイテム</a>
        </li>
        <li class="p-footer-nav__item">
          <a href="">フッターアイテム</a>
        </li>
      </ul>
    </div><!-- p-footer-nav -->

  </div>
  <div class="p-footer__copyright">
    <small>
      <p>Copyright &copy; ALL Rights Reserved.</p>
    </small>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>