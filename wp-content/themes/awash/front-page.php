<?php get_header(); ?>
<!-- ====================↓ファーストビュー==================== -->
<h1 class="i_body_top">
    <div class="i_animation">
        <div class="i_body_topphoto img1"></div>
        <div class="i_body_topphoto img2"></div>
        <div class="i_body_topphoto img3"></div>
        <div class="i_body_topphoto img4"></div>
        <div class="i_body_topphoto img5"></div>
        <div class="i_body_topphoto img6"></div>
        <div class="i_body_logo"></div>
    </div>
</h1>
<!-- ====================↑ファーストビュー==================== -->

<!-- ====================↓ナビゲーション==================== -->
<nav class="i_gnav">
    <div class="i_gnav_pc">
        <div class="i_gnav_all">
            <a class="i_gnav_a" href="<?php echo get_post_type_archive_link('jizake'); ?>">
                <img src="<?php echo esc_url(get_theme_file_uri('images/template/header_jizake_icon.svg')); ?>" alt="酒">
                <p class="ten">
                    徳島の地酒
                </p>
            </a>
            <a class="i_gnav_a" href="<?php echo get_post_type_archive_link('kura'); ?>">
                <img src="<?php echo esc_url(get_theme_file_uri('images/template/header_kuralist_icon.svg')); ?>" alt="蔵">
                <p class="ten">
                    徳島の酒造
                </p>
            </a>
            <a class="i_gnav_a" href="<?php echo get_permalink(get_page_by_path('topics')->ID); ?>">
                <img src="<?php echo esc_url(get_theme_file_uri('images/template/header_topiclist_icon.svg')); ?>" alt="得">
                <p class="ten">
                    特集ページ
                </p>
            </a>
            <a class="i_gnav_a" href="<?php echo get_permalink(get_page_by_path('about')->ID); ?>">
                <img class="gnav_icon_h" src="<?php echo esc_url(get_theme_file_uri('images/template/header_aboutlist_icon.svg')); ?>" alt="知">
                <p class="ten">
                    お酒を知る
                </p>
            </a>
            <a class="i_gnav_a" href="<?php echo get_permalink(get_page_by_path('contact')->ID); ?>">
                <img src="<?php echo esc_url(get_theme_file_uri('images/template/header_contact_icon.svg')); ?>" alt="問">
                <p class="ten">
                    お問い合わせ
                </p>
            </a>
        </div>
    </div>
</nav>
<!-- ====================↑ナビゲーション==================== -->
<main class="main">
    <!-- ====================↓イベント情報==================== -->
    <div class="i_event">
        <div class="i_kumo css_fade fade_up">
            <img class="i_kumo_white1" src="<?php echo esc_url(get_theme_file_uri('images/template/kumo1_img01.png')); ?>" alt="">
            <img class="i_kumo_black1" src="<?php echo esc_url(get_theme_file_uri('images/template/kumo2_img02.png')); ?>" alt="">
        </div>

        <div class="i_event_content">
            <h2 class="i_event_title">
                <img src="<?php echo esc_url(get_theme_file_uri('images/contents/index/i_lineuzu_img01.png')); ?>" alt="">
                <p class="typo">
                    イベント情報
                </p>
            </h2>

            <!-- <div class="i_event_text">
                <ul>
                    <li><img src="./images/contents/share/i_tokkuri_img01.svg" alt="お猪口アイコン"> 2019年4月1日 <a href="./html/topics.html"> 第2回　徳島池田/四国酒祭り </a></li>
                    <li><img src="./images/contents/share/i_tokkuri_img01.svg" alt="お猪口アイコン"> 2020年1月1日 <a href="./html/topics.html"> 第11回　美濃梅酒祭り </a></li>
                    <li><img src="./images/contents/share/i_tokkuri_img01.svg" alt="お猪口アイコン"> 2020年5月1日 <a href="./html/topics.html"> 第30回　徳島地ビールフェスタ2019 </a></li>
                </ul>
            </div> -->

            <!-- イベント記事の表示 -->
            <div class="i_event_text">
                <?php
                $topics_posts = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_status'    => 'pubish',
                    'no_found_rows'  => true,
                    'post_type'      => 'post',
                    'orderby'        => 'modefied',
                    'order'          => 'DESC',
                    'category_name'  => 'events',
                ));
                ?>

                <?php if ($topics_posts->have_posts()) : ?>
                    <?php while ($topics_posts->have_posts()) : ?>
                        <?php $topics_posts->the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url(get_theme_file_uri('images/contents/share/i_tokkuri_img01.svg')); ?>" alt="">
                            <p>
                                <?php the_time('Y-n-j'); ?><br>
                                <?php the_title(); ?>
                            </p>
                        </a>
                    <?php endwhile; ?>
                <?php else : ?>
                    <li>
                        <p>当てはまる情報はまだありません。</p>
                    </li>
                <?PHP endif; ?>

                <div class="i_event_more">
                    <a href="<?php echo esc_url(home_url('/archives/category/topics/events')); ?>" class="i_event_more_border">
                        <p>
                            もっと
                            <i class="fas fa-angle-double-right"></i>
                        </p>
                    </a>
                </div>
            </div>
        </div>

        <div class="i_kumo css_fade fade_up">
            <img class="i_kumo_black2" src="<?php echo esc_url(get_theme_file_uri('images/template/kumo2_img04.png')); ?>" alt="">
            <img class="i_kumo_white2" src="<?php echo esc_url(get_theme_file_uri('images/template/kumo1_img03.png')); ?>" alt="">
        </div>
    </div>
    <!-- ====================↑イベント情報==================== -->

    <!-- ====================↓今のオススメと特集==================== -->
    <div class="i_body_osusumetotokusyu">
        <div class="i_body_osusume" id="osusume">
            <?php
            $args = array(
                'post_type'      => 'jizake',
                'orderby'        => 'rand',
                'posts_per_page' => 1,
            );

            $wp_query = new WP_Query($args);
            if (have_posts()) :
                while (have_posts()) :
                    the_post(); ?>

                    <a href="<?php the_permalink() ?>">
                        <h2>
                            <img src="<?php echo esc_url(get_theme_file_uri('images/contents/share/top_osusume_image.png')); ?>" alt="今のオススメ">
                        </h2>
                    </a>
            <?php
                endwhile;
            endif;
            $_SESSION["osusume"] = $wp_query;
            ?>
        </div>
        <div class="i_body_tokushu">
            <a href="./html/topics.html">
                <h2>
                    <img src="<?php echo esc_url(get_theme_file_uri('images/contents/share/t_tokussyu_img01.png')); ?>" alt="特集">
                </h2>
            </a>
        </div>
    </div>
    <!-- ====================↑今のオススメと特集==================== -->

    <!-- ====================↓阿波ッシュとは==================== -->
    <section id="i_body_awash">
        <div class="i_body_overview">
            <!-- <img class="i_body_nami2" src="./images/contents/index/i_lineuzu_img01.png" alt=""> -->
            <div class="i_body_overviewtitle typo css_fade fade-down">
                <h3>
                    WHAT'S AWASHU？
                </h3>
                <div>
                    ー阿波ッシュとは何かー
                </div>
            </div>

            <div class="i_body_overviewcomment">
                <div class="i_body_overviewcomment_j css_fade fade_lr">
                    <p>
                        四国・徳島県の地酒や酒造など<br>
                        お酒に関する情報が満載の、徳島地酒紹介サイトです。<br>
                        日本酒・焼酎・ビール・ワインなどなど...<br>
                        このサイトを通じてさまざまな徳島の地酒<br>
                        を知ってもらいたい！楽しんでもらいたい！<br>
                        そんな思いがこめられています。<br>
                        『阿波ッシュ』の情報で、たくさん酔いしれて下さい！
                    </p>
                </div>
                <div class="i_body_overviewcomment_j_sp">
                    <p>
                        四国・徳島県の地酒や酒造などお酒に関する
                        情報が満載の、徳島地酒紹介サイトです。
                        日本酒・焼酎・ビール・ワインなどなど...。
                        このサイトを通じてさまざまな徳島の地酒を
                        知ってもらいたい！楽しんでもらいたい！
                        そんな思いがこめられています。
                        『阿波ッシュ』の情報で、
                        たくさん酔いしれて下さい！
                    </p>
                </div>

                <div class="i_border"></div>
                <div class="i_body_overviewcomment_e css_fade fade_rl">
                    <p>
                        This is a Tokushima local sake introduction site <br>
                        that is full of information on local sake, <br>
                        sake brewing and sake in Shikoku and Tokushima prefecture.<br>
                        Sake, shochu, beer, wine, etc ...<br>
                        We want you to know various local sake of Tokushima through <br>
                        this site! I want you to have fun!<br>
                        Such thoughts have been made.<br>
                        Get drunk a lot with the information on "Awash"!!
                    </p>
                </div>
                <div class="i_body_overviewcomment_e_sp">
                    <p>
                        This is a Tokushima local sake
                        introduction site that is full of information
                        on local sake, sake brewing and sake
                        in Shikoku and Tokushima prefecture.
                        Sake, shochu, beer, wine, etc ...
                        We want you to know various local
                        sake of Tokushima through this site!
                        I want you to have fun!
                        Such thoughts have been made.
                        Get drunk a lot with the information on "Awash"!!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ====================↑阿波ッシュとは==================== -->

    <!-- ====================↓徳島の地酒==================== -->
    <section class="i_jizake">
        <div class="i_body_jizake">
            <a class="i_body_jizakephoto_m css_fade fade_lr" href="<?php echo esc_url(home_url('archives/jizake')); ?>">
                <img class="i_body_jizakephoto" src="<?php echo esc_url(get_theme_file_uri('images/contents/index/i_sub_img1.jpg')); ?>" alt="徳島の地酒">
            </a>

            <div class="i_body_jizakecomment">
                <h3 class="typo">
                    徳
                    <span class="i_body_bigfont">
                        島
                    </span>
                    の地酒
                </h3>

                <p class="i_body_jizakecomment_p">
                    徳島県は海の幸や山の幸に恵まれた、自然豊かな地域です。県をあげて日本酒のブランド化が推進され、個性際立つ蔵元と地酒が数多く存在します。良質な水と食材に育まれた徳島の日本酒の魅力を、人気の銘柄とともに見てみましょう。
                </p>

                <div class="i_body_usagi">
                    <img src="<?php echo esc_url(get_theme_file_uri('images/template/usagi1.jpg')); ?>" alt="">
                    <img src="<?php echo esc_url(get_theme_file_uri('images/template/usagi2.jpg')); ?>" alt="">
                </div>
            </div>
        </div>

        <img class="i_body_sakeicon" src="<?php echo esc_url(get_theme_file_uri('images/template/header_jizake_icon.png')); ?>" alt="">
    </section>
    <!-- ====================↑徳島の地酒==================== -->

    <!-- ====================↓徳島の酒造==================== -->
    <section class="i_kura">
        <div class="i_body_kura">
            <a class="i_body_kuraphoto_m css_fade fade_rl" href="<?php echo esc_url(home_url('archives/kura')); ?>">
                <img class="i_body_kuraphoto" src="<?php echo esc_url(get_theme_file_uri('images/contents/index/i_sub_img2.jpg')); ?>" alt="徳島の地酒">
            </a>

            <div class="i_body_kuracomment">
                <h3 class="typo">
                    徳島の
                    <span class="i_body_bigfont">
                        酒
                    </span>
                    造
                </h3>

                <p class="i_body_kuracomment_p">
                    徳島県は海の幸や山の幸に恵まれた、自然豊かな地域です。県をあげて日本酒のブランド化が推進され、個性際立つ蔵元と地酒が数多く存在します。良質な水と食材に育まれた徳島の日本酒の魅力を、人気の銘柄とともに見てみましょう。
                </p>

                <div class="i_body_taru">
                    <img src="<?php echo esc_url(get_theme_file_uri('images/template/taru.jpg')); ?>" alt="">
                </div>
            </div>
        </div>

        <img class="i_body_kuraicon" src="<?php echo esc_url(get_theme_file_uri('images/template/header_kuralist_icon.png')); ?>" alt="">
    </section>
    <!-- ====================↑徳島の酒造==================== -->

    <!-- ====================↓お酒を知る==================== -->
    <section class="i_body_osakewoshiru">
        <a href="<?php echo esc_url(home_url('archives/category/about')); ?>">
            <h3 class="i_body_osakewoshirutitle typo">
                <p>
                    お酒を
                    <span class="i_body_bigfont">
                        知
                    </span>
                    る
                </p>

                <p>
                    SAKE
                </p>
            </h3>

            <img class="i_body_osakewoshiruphoto css_fade fade_rl" src="<?php echo esc_url(get_theme_file_uri('images/contents/index/top_aboutlist_img.jpg')); ?>" alt="お酒を知る">
        </a>
    </section>
    <!-- ====================↑お酒を知る==================== -->

    <!-- ====================↓写真スライド==================== -->
    <div class="i_photoslide">
        <!-- 写真ローリング -->
        <?php $count = 1; ?>
        <ul class="tanakatensai">
            <!-- 地酒アイキャッチ -->
            <?php
            $args = array(
                'post_type'      => 'jizake',
                'orderby'        => 'rand',
                'posts_per_page' => 3,
            );
            $wp_query = new WP_Query($args);
            if (have_posts()) :
                while (have_posts()) :
                    the_post(); ?>
                    <li class="tanakatensai<?php echo $count ?>">
                        <!-- <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> -->
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                    </li>
                    <?php $count++; ?>
            <?php endwhile;
            endif;
            $_SESSION["osusume"] = $wp_query;
            ?>

            <!-- 酒造アイキャッチ -->
            <?php
            $args = array(
                'post_type'      => 'kura',
                'orderby'        => 'rand',
                'posts_per_page' => 3,
            );
            $wp_query = new WP_Query($args);
            if (have_posts()) :
                while (have_posts()) :
                    the_post(); ?>
                    <li class="tanakatensai<?php echo $count ?>">
                        <!-- <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> -->
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                    </li>
                    <?php $count++; ?>
            <?php endwhile;
            endif;
            $_SESSION["osusume"] = $wp_query;
            ?>

            <!-- 特集アイキャッチ -->
            <?php
            $args = array(
                'post_type'      => 'post',
                'orderby'        => 'rand',
                'category_name'  => 'topics',
                'posts_per_page' => 3,
            );

            $wp_query = new WP_Query($args);
            if (have_posts()) :
                while (have_posts()) :
                    the_post(); ?>
                    <li class="tanakatensai<?php echo $count ?>">
                        <!-- <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> -->
                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                    </li>
                    <?php $count++; ?>
            <?php
                endwhile;
            endif;
            $_SESSION["osusume"] = $wp_query;
            ?>
        </ul>
    </div>
    <!-- ====================↑写真スライド==================== -->
</main>
<?php get_footer('top'); ?>
