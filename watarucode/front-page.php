<?php get_header(); ?>

<!-- l-mv -->
<div class="l-mv p-mv" id='top'>
  <h1 class="p-mv__title">wataru&nbsp;design</h1>

  <?php $slider_images = SCF::get('slider_images', 10); ?>
  <?php if($slider_images[0]['image']): ?>
    <div class="swiper-container swiper-mv">
      <div class="swiper-wrapper">
        <?php foreach($slider_images as $slider_image): ?>
          <div class="swiper-slide">
            <div class="slide-img">
              <img src="<?php echo wp_get_attachment_url($slider_image['image']); ?>" alt="">
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php else: ?>
  <!-- swiper画像が登録されていなかった場合に表示 -->
    <?php if(get_field('mv_image')): ?>
    <!-- 画像が登録されていれば表示 -->
      <div class="p-mv__img">
        <img src="<?php the_field('mv_image', 10); ?>" alt="">
      </div>
    <?php endif; ?>
  <?php endif; ?>

</div><!-- l-mv -->

<main>
  <!-- l-concept -->
  <section class="l-concept p-concept" id="concept">
    <div class="p-concept__inner l-inner">
      <div class="p-concept__background-text">
        <span class="c-background-text">concept</span>
      </div>
      <div class="p-concept__header">
        <div class="c-section-title">concept</div>
        <h2 class="c-section-subtitle">コンセプト</h2>
      </div>
      <div class="p-concept__contents">
        <p class="p-concept__text">
          ポートフォリオサイトをご覧いただきありがとうございます。<br>
          WEB制作の実装者（コーダー）として活動しています。<br>
          以下の考え方のもと制作に取り組んでいます。
        </p>

        <p class="p-concept__text">
          デザインを忠実に再現<br>
          保守性を考えた実装<br>
          ものづくりを楽しむ<br>
        </p>
        
        <p class="p-concept__text">
          WEB制作の実装をするにあたって最も難しく時間がかかる部分はデザイン通りに実装する部分だと思います。<br>
          初めてピクセルパーフェクトでの実装を試みたときにずれが生じてしまい、実装し終えるまでに想像以上の時間を費やしたからです。
          それからいくつかのサイトを実装していく中で、ピクセルパーフェクトで実装できないとうことは、デザインを忠実に再現できていないということ、大体の場合自身のスキル不足であるということを自覚するようになりました。
          柔軟にレイアウトが組めるCSSプロパティが数多くあり、また実際にデザインを忠実に再現されている実装者の方たちがいるからです。<br>
          デザインの意図や構成を見極め、ゴールまでの最適解を見つけてデザインを再現することが実装者の役割であると考えるようになりました。
        </p>

        <p class="p-concept__text">
          基本的にですが、デザインの再現が最優先だと考えています。<br>
          ですので実装者側の判断のみでデザインを変更することや、ソースコードの保守性を優先するあまりデザインの再現を無視することはあってはならないと考えています。
          ただし現実的にですが、パーツごとにコードを共通化させた方がいいケースがあるなどの理由から、デザインを再現することよりも保守性を優先させた方がいい場合もあります。
          デザインは再現されていてもソースコードに保守性がなければ今後のWEBサイトの運用に支障をきたてしまうからです。<br>
          デザインの再現を最大限担保しつつ保守性の高い実装を施す。その完成度を高めていくことが目標です。
        </p>

      </div>
    </div>
  </section><!-- l-concept -->

  <!-- l-works -->
  <section class="l-works p-works" id="works">
    <div class="p-works__inner l-inner">
      <div class="p-works__background-text">
        <span class="c-background-text--gray">works</span>
      </div>
      <div class="p-works__header">
        <div class="c-section-title">works</div>
        <h2 class="c-section-subtitle">制作実績</h2>
      </div>
      <div class="p-works__contents">
        <div class="swiper-container swiper-works">
          <div class="swiper-pagination"></div>
          <ul class="swiper-wrapper">
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
                <li class="swiper-slide p-card-works">
                  <a class="p-card-works__img" href="<?php the_permalink(); ?>">
                    <img src="<?php the_field('image'); ?>" alt="">
                  </a>
                  <div class="p-card-works__body">
                    <h3 class="p-card-works__title"><?php the_title(); ?></h3>
                  </div>
                </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
      <div class="p-works__btn">
        <a class="c-btn-view" href="<?php echo esc_url(home_url('works')); ?>">view&nbsp;more</a>
      </div>
    </div>
  </section><!-- l-works -->

  <!-- l-top-blog -->
  <section class="l-top-blog p-top-blog" id="blog">
    <div class="p-top-blog__background-text l-inner">
      <span class="c-background-text--gray">blog</span>
    </div>
    <div class="p-top-blog__header l-inner">
      <div class="c-section-title">blog</div>
      <h2 class="c-section-subtitle">ブログ</h2>
    </div>
    <div class="p-top-blog__over-inner">
      <div class="p-top-blog__inner l-inner">
        <div class="swiper-container swiper-blog p-top-blog__swiper">
          <ul class="swiper-wrapper p-top-blog__items">
            <?php
              $args = [
                'post_type' => 'post',
                'posts_per_page' => 6,
                'orderby' => 'date',
                'order' => 'DESC'
              ];
              $wp_query = new WP_Query($args);
            ?>
            <?php if($wp_query->have_posts()): ?>
              <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
                <li class="swiper-slide p-top-blog__item p-card-blog">
                  <a class="p-card-blog__img" href="<?php the_permalink(); ?>">
                    <?php if(has_post_thumbnail()): ?>
                      <?php the_post_thumbnail(); ?>
                    <?php else: ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/rose.jpg" alt="">
                    <?php endif; ?>
                    <span class="p-card-blog__category" style="background-color: <?php the_field('background', 'category_' . get_the_category()[0]->cat_ID); ?>">
                        <?php
                          $category = get_the_category();
                          $category_name = $category[0]->cat_name;
                          echo $category_name;
                        ?>
                    </span>
                  </a>
                  <div class="p-card-blog__body">
                    <div class="p-blog__box">
                      <h3 class="p-card-blog__title"><?php the_title(); ?></h3>
                      <div class="p-card-blog__content"><?php echo get_flexible_content(80); ?></div>
                    </div>
                    <time class="p-card-blog__time" datetime="<?php the_time(get_option('date_format')); ?>"><?php the_time(get_option('date_format')); ?></time>
                  </div>
                </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </ul>
          <!-- ページネーション -->
          <div class="swiper-pagination"></div>
        </div>

        <div class="p-top-blog__box">
          <p class="p-top-blog__description">
            主に制作過程で学んだことをブログにストックしていきます。<br>
            ご覧いただけると幸いです。
          </p>
          <div class="p-top-blog__btn">
            <a class="c-btn-blog" href="<?php echo esc_url(home_url('blog')); ?>">WATARU&nbsp;LOGへ</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- l-top-blog -->

  <!-- l-price -->
  <!-- スマートカスタムフィールド繰り返しフィールド -->
  <!-- 固定ページでgetする場合は必ずIDを第２パラメータに指定する。 -->
  <section class="l-price p-price" id="price">
    <div class="p-price__inner l-inner">
      <div class="price__background-text">
        <span class="c-background-text--gray">price</span>
      </div>
      <div class="p-price__header">
        <div class="c-section-title">price</div>
        <h2 class="c-section-subtitle">価格</h2>
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
  <section class="l-about p-about" id="about">
    <div class="p-about__inner l-inner">
      <div class="p-about__background-text">
        <span class="c-background-text">about</span>
      </div>
      <div class="p-about__header">
        <div class="c-section-title">about</div>
        <h2 class="c-section-subtitle">制作者について</h2>
      </div>
      <div class="p-about__contents">
        <figure class="p-about__img">
          <?php if(get_field('face_image', 10)): ?>
            <img src="<?php the_field('face_image', 10); ?>" alt="">
          <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/green-apples.jpeg" alt="">
          <?php endif; ?>
        </figure>
        <div class="p-about__profiles">
          <div class="p-about__profile p-profile">
            <h3 class="p-profile__title">profile</h3>
            <div class="p-profile__contents">
              <p class="p-profile__resident"><?php the_field('resident', 10); ?></p>
              <p class="p-profile__hobby">趣味：<?php the_field('hobby', 10); ?></p>
            </div>
          </div>
          <div class="p-about__skill p-skill">
            <h3 class="p-skill__title">skill</h3>
            <div class="p-skill__skills">
              <?php the_field('skill', 10); ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- l-about -->

  <!-- l-contact -->
  <section class="l-contact p-contact" id="contact">
    <div class="p-contact__inner l-inner">
      <div class="p-contact__background-text">
        <span class="c-background-text--gray">contact</span>
      </div>
      <div class="p-contact__header">
        <div class="c-section-title">contact</div>
        <h2 class="c-section-subtitle">お問い合わせ</h2>
      </div>
      <div class="p-contact__description">
        <p class="p-contact__text">
          制作の依頼、ご質問などお気軽にお問い合わせください。
        </p>
        <p class="p-contact__text">
          必須の項目は必ずご記入お願いします。
        </p>
      </div>

      <!-- コンタクトフォーム7を表示 -->
      <?php echo do_shortcode('[contact-form-7 id="9" title="お問い合わせ"]'); ?>
    </div>
  </section><!-- l-contact -->

</main>

<?php get_footer(); ?>