<?php get_header(); ?>
<!-- <?php var_dump($post); ?> -->
<!-- <?php var_dump($wp_query); ?> -->
<!-- <?php var_dump($query); ?> -->

  <!-- 各ページのurl -->
  <?php
    $top = esc_url(home_url('/'));
    $works = esc_url(home_url('works'));
    $blog = esc_url(home_url('blog'));
  ?>

  <!-- l-concept -->
  <section class="l-concept p-concept">
    <div class="p-concept__inner l-inner">
      <div class="p-concept__header">
        <h2 class="c-section-title">concept</h2>
        <!-- <div class="c-section-subtitle">concept</div> -->
        <!-- <h2 class="c-section-title">コンセプト</h2> -->
      </div>
      <div class="p-concept__contents">
        <p class="p-concept__text">
          私はWEB制作の実装者です。<br>
          以下の考えのもと制作に取り組んでいます。
          <!-- ポートフォリオサイトをご覧いただきありがとうございます。<br> -->
        </p>
        <p class="p-concept__text">
          デザインを忠実に再現<br>
          予測・再利用・保守・拡張を考えた実装<br>
          最後までやり遂げる<br>
          ものづくりを楽しむ<br>
        </p>
        <!-- <p class="p-concept__text">
          この考え方のもと制作に取り組んでいます。
        </p> -->
        <p class="p-concept__text">
          基本的にですが、<br>
          実装者側の判断のみでデザインを変更することや、<br>デザインの再現を追求するあまり保守性を無視したソースコードはあってはならないと考えています。<br>
          <!-- また現実的にですが、設計や今後の保守を考えたときにコードをパーツごとに共通化する必要があるため、デザインを再現することが難しいケースがあると考えてもいます。 -->
          <!-- "デザインの再現を最大限担保しつつ保守性の高い実装を施す"<br>
          私はそういう実装者を目指しています。 -->
        </p>
        <p class="p-concept__text">
          "デザインの再現を最大限担保しつつ保守性の高い実装を施す"<br>
        </p>
        <p class="p-concept__text">
          私はそういう実装者を目指しています。
        </p>
      </div>
    </div>
  </section><!-- l-concept -->

  <!-- l-works -->
  <section class="l-works p-works">
    <div class="p-works__inner l-inner">
      <div class="p-works__header">
        <h2 class="c-section-title">works</h2>
        <!-- <div class="c-section-subtitle">works</div> -->
        <!-- <h2 class="c-section-title">制作実績</h2> -->
      </div>
      <div class="p-works__description">
        <!-- 制作実績の一部をご紹介いたします。 -->
      </div>
      <div class="p-works__contents">
        <ul class="p-works__items">

          <?php
            $args = [
              'post_type' => 'works',
              'posts_per_page' => 6,
              'orderby' => 'date',
              'order' => 'DESC',
            ];
            $wp_query = new WP_Query($args);
          ?>
          <?php if($wp_query->have_posts()): ?>
            <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
              <li class="p-works__item p-works-card">
                <a class="p-works-card__img" href="<?php the_permalink(); ?>">
                  <img src="<?php the_field('image'); ?>" alt="">
                </a>
                <div class="p-works-card__body">
                  <h3 class="p-works-card__title"><?php the_title(); ?></h3>
                  <!-- <div class="p-works-card__pages"><?php the_field('pages'); ?>ページ</div> -->
                  <!-- <div class="p-works-card__specification"><?php the_field('specification'); ?></div> -->
                </div>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </ul>
      </div>
      <div class="p-works__btn">
        <a class="c-btn-view" href="<?php echo $works; ?>">view&nbsp;more</a>
        <!-- <a class="c-btn" href="<?php echo $works; ?>">view&nbsp;more</a> -->
        <!-- <a class="c-btn" href="<?php echo $works; ?>">制作実績一覧へ</a> -->
        <!-- <a href="<?php echo $works; ?>">制作実績一覧を見る</a> -->
      </div>
    </div>
  </section><!-- l-works -->

  
  

  <!-- l-blog -->
  <section class="l-blog p-blog">
    <div class="p-blog__inner l-inner">
      <div class="p-blog__header">
        <h2 class="c-section-title">blog</h2>
        <!-- <div class="c-section-subtitle">blog</div> -->
        <!-- <h2 class="c-section-title">ブログ</h2> -->
      </div>
      <div class="p-blog__description">
        <!-- 制作や学習の過程で得た知識やスキルなどを記録していきます。 -->
      </div>
      <div class="p-blog__contents">
        <ul class="p-blog__items">
          <?php
            $args = [
              'post_type' => 'post',
              'posts_per_pages' => 6,
              'orderby' => 'date',
              'order' => 'DESC'
            ];
            $wp_query = new WP_Query($args);
          ?>
          <?php if($wp_query->have_posts()): ?>
            <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
              <li class="p-blog__item p-blog-card">
                <a class="p-blog-card__img" href="<?php the_permalink(); ?>">
                  <img src="<?php the_post_thumbnail(); ?>" alt="">
                </a>
                <div class="p-blog-card__body">
                  <div class="p-blog__box">
                    <h3 class="p-blog-card__title"><?php the_title(); ?></h3>
                    <span class="p-blog-card__category" style="background-color: <?php the_field('background', 'category_' . get_the_category()[0]->cat_ID); ?>">
                      <?php
                        $category = get_the_category();
                        // var_dump($category);
                        $category_name = $category[0]->cat_name;

                        echo $category_name;
                      ?>
                    </span>
                  </div>
                  <time class="p-blog-card__time" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>
                </div>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>

        </ul>
      </div>
      <div class="p-blog__btn">
        <a class="c-btn-view" href="<?php echo $blog; ?>">view&nbsp;more</a>
        <!-- <a class="c-btn" href="<?php echo $blog; ?>">view&nbsp;more</a> -->
      </div>
    </div>
  </section><!-- l-blog -->

  <!-- l-price -->
  <!-- スマートカスタムフィールド繰り返しフィールド -->
  <!-- 固定ページでgetする場合は必ずIDを第２パラメータに指定する。 -->
  <section class="l-price p-price">
    <div class="p-price__inner l-inner">
      <div class="p-price__header">
        <h2 class="c-section-title">price</h2>
        <!-- <div class="c-section-subtitle">price</div> -->
        <!-- <h2 class="c-section-title">価格</h2> -->
      </div>
      <div class="p-price__description">
        価格は目安の価格となります。<br>
        詳しい価格については柔軟に対応させていただきます。
      </div>
      <div class="p-price__contents">
        <dl class="p-price__lists p-menu">

          <?php $price_menus = scf::get('price_menus', 10); ?>
          <?php foreach($price_menus as $menu): ?>
            <div class="p-menu__block">
              <dt class="p-menu__title"><?php echo $menu['title']; ?></dt>
              <dd class="p-menu__price"><?php echo $menu['price']; ?>円〜</dd>
            </div>
          <?php endforeach; ?>

        </dl>
      </div>
      <!-- <div class="p-price__btn">
        <a class="c-btn" href="">contact</a>
      </div> -->
    </div>
  </section>

  <!-- l-price -->


  <!-- l-about -->
  <section class="l-about p-about">
    <div class="p-about__inner l-inner">
      <div class="p-about__header">
        <h2 class="c-section-title">about</h2>
        <!-- <div class="c-section-subtitle">about</div> -->
        <!-- <h2 class="c-section-title">制作者について</h2> -->
      </div>
      <div class="p-about__contents">
        <div class="p-about__profile p-profile">
          <h3 class="p-profile__title">profile</h3>
          <div class="p-profile__contents">
            <p class="p-profile__resident">京都府在住</p>
            <p class="p-profile__hobby">趣味：絵画(色鉛筆)、筋トレ、銭湯・サウナ</p>
          </div>
        </div>
        <div class="p-about__skill p-skill">
          <h3 class="p-skill__title">skill</h3>
          <div class="p-skill__skills">
            HTML / CSS / Sass(SCSS) / JavaScript / WordPress / Git(Github) / gulp
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- l-about -->

  <!-- l-contact -->
  <section class="l-contact p-contact">
    <div class="p-contact__inner l-inner">
      <div class="p-contact__header">
        <h2 class="c-section-title">contact</h2>
        <!-- <div class="c-section-subtitle">contact</div> -->
        <!-- <h2 class="c-section-title">お問い合わせ</h2> -->
      </div>
      <div class="p-contact__description">
        <p class="p-contact__text">
          制作の依頼、ご質問などお気軽にお問い合わせください。
        </p>
        <p class="p-contact__text">
          必須の項目は必ずご記入お願いします。
        </p>
      </div>

      <div class="p-contact__contents p-form">
        <div class="p-form__content">
          <div class="p-form__header">
            <div class="p-form__title">お名前</div>
            <span class="p-form__required">必須</span>
          </div>
          <div class="p-form__item">
            <input class="p-form__text" type="text">
          </div>
        </div>
        <div class="p-form__content">
          <div class="p-form__header">
            <div class="p-form__title">貴社名</div>
          </div>
          <div class="p-form__item">
            <input class="p-form__text" type="text">
          </div>
        </div>
        <div class="p-form__content">
          <div class="p-form__header">
            <div class="p-form__title">メールアドレス</div>
            <span class="p-form__required">必須</span>
          </div>
          <div class="p-form__item">
            <input class="p-form__text" type="text">
          </div>
        </div>
        <div class="p-form__content">
          <div class="p-form__header">
            <div class="p-form__title">お問い合わせ内容</div>
            <span class="p-form__required">必須</span>
          </div>
          <div class="p-form__item">
            <textarea class="p-form__textarea" rows="10"></textarea>
          </div>
        </div>

        <div class="p-form__btn">
          <button class="c-btn-contact" type="submit">submit</button>
        </div>
      </div>


    </div>
  </section><!-- l-contact -->





<?php get_footer(); ?>