<?php get_header(); ?>

<!-- ▼ コンテンツ : 開始-->

<div class="noto">
    <div class="sm_category">
        <h2 class="typo all_pageshadow">サイトマップ</h2>

        <img src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/sm_pp_rule.jpg')); ?>" alt="サイトマップ">
    </div>
</div>

<main>
    <section class="sm_sitemap_container">
        <div class="sm_sitemap">
            <h3 class="sm_sitemap_title typo">サイトマップ</h3>
            <div class="sm_sitemap_box">
                <p class="sm_sitemap_box1">
                    <ul class="sm_sitemap_1 bs">
                        <li><i class="fas fa-circle"></i><a href="<?php echo home_url('/#osusume'); ?>">今のオススメ</a></li>
                        <li><i class="fas fa-circle"></i><a href="<?php echo get_permalink(get_page_by_path('topics')->ID); ?>">特集</a></li>
                        <li><i class="fas fa-circle"></i><a href="<?php echo esc_url(home_url('/#i_body_awash')); ?>">阿波ッシュとは</a></li>
                        <li><i class="fas fa-circle"></i><a href=" <?php echo get_post_type_archive_link('jizake'); ?>">徳島の地酒</a></li>
                        <li><i class="fas fa-circle"></i><a href=" <?php echo get_post_type_archive_link('kura'); ?>">徳島の酒造</a></li>
                        <li><i class="fas fa-circle"></i><a href="<?php echo get_permalink(get_page_by_path('about')->ID); ?>">お酒を知る</a></li>
                        <li><i class="fas fa-circle"></i><a href="<?php echo get_permalink(get_page_by_path('rule')->ID); ?>">利用規約</a></li>
                        <li><i class="fas fa-circle"></i><a href="<?php echo get_permalink(get_page_by_path('privacypolicy')->ID); ?>">プライバシーポリシー</a></li>
                        <li><i class="fas fa-circle"></i><a href="<?php echo get_permalink(get_page_by_path('contact')->ID); ?>">お問い合わせ</a></li>
                    </ul>
                </p>
                <p class="sm_sitemap_box2">
                    <ul class="sm_sitemap_2">
                        <li class="sm_sitemap_title2 bs">SNS</li>
                        <li><i class="fas fa-circle"></i><a href="https://www.facebook.com/"> Facebook</a></li>
                        <li><i class="fas fa-circle"></i><a href="https://twitter.com/login"> Twitter</a></li>
                        <li><i class="fas fa-circle"></i><a href="https://line.me/ja/">LINE</a></li>
                    </ul>
                </p>
            </div>
        </div>
    </section>
</main>
</div>

<!-- ▲ コンテンツ : 終了-->

<?php get_footer(); ?>
