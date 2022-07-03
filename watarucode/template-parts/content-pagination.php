
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