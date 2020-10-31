<?php get_header(); ?>
</div>
<div class="j_category">
    <img class="j_category_img01" src="<?php echo esc_url(get_theme_file_uri('/images/template/jizake.jpg')); ?>" alt="">
    <h2 class="typo all_pageshadow">地酒</h2>
</div>


<div class="ji_container">

    <!-- SNS -1 -->
    <div class="j_sns">
        <?php echo do_shortcode('[addtoany]'); ?>
    </div>

    <!-- お酒の紹介 -->
    <div class="j_sake">
        <!-- <div class="j_minititle typo">
            <?php // echo get_post_meta($post->ID, 'item_jizakecatchcopy', true);
            ?>
        </div> -->
        <h3 class="j_title typo">
            <?php echo get_post_meta($post->ID, 'item_productname', true); ?>
        </h3>
        <!-- いいね表示 -->
        <?php if (function_exists('the_ratings')) {
            the_ratings();
        } ?>
        <!-- いいね表示 ここまで -->
    </div>

    <!-- 画像1 -->
    <div class="j_img1">
        <?php $value = get_post_meta($post->ID, 'item_jizakeimg1', true); ?>
        <?php if (!empty($value)) : ?>
            <img class="j_img1_1" src="<?php echo wp_get_attachment_url($value); ?>" alt="記事画像1">
        <?php endif; ?>
    </div>

    <!-- 記事1 -->
    <?php $value = get_post_meta($post->ID, 'item_jizakearticle1', true); ?>
    <?php if (!empty($value)) : ?>
        <p class="j_bun"><?php echo get_post_meta($post->ID, 'item_jizakearticle1', true); ?></p>
    <?php endif; ?>


    <!-- 単品お酒 -->
    <div class="j_uzu">
        <img class="j_uzu_uzu" src="<?php echo esc_url(get_theme_file_uri('/images/contents/jizake/s_biguzu_img01.png')); ?>" alt="渦">

        <!-- 記事2 -->
        <?php $value = get_post_meta($post->ID, 'item_jizakeimg2', true); ?>
        <?php if (!empty($value)) : ?>
            <img class="j_jizake_img01" src="<?php echo wp_get_attachment_url($value); ?>" alt="記事画像2">
        <?php endif; ?>

        <div class="j_hyouki">
            <!-- 主原料表示 -->
            <?php
            $mainmaterial =  get_post_meta($post->ID, 'item_mainmaterial', true);
            if ($mainmaterial == 1) : ?>
                <img class="j_rice" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/rise_img01.png')); ?>" alt="米">
            <?php elseif ($mainmaterial == 2) : ?>
                <img class="j_rice" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/wheat_img01.png')); ?>" alt="麦">
            <?php elseif ($mainmaterial == 3) : ?>
                <img class="j_rice" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/narutokintoki_img01.png')); ?>" alt="鳴門金時">
            <?php elseif ($mainmaterial == 4) : ?>
                <img class="j_rice" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/sweetpotato_img01.png')); ?>" alt="さつま芋">
            <?php elseif ($mainmaterial == 5) : ?>
                <img class="j_rice" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/grape_img01.png')); ?>" alt="葡萄">
            <?php elseif ($mainmaterial == 6) : ?>
                <img class="j_rice" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/hop_img01.png')); ?>" alt="ホップ">
            <?php elseif ($mainmaterial == 7) : ?>
                <img class="j_rice" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/sudati_img01.png')); ?>" alt="すだち">
            <?php elseif ($mainmaterial == 8) : ?>
                <img class="j_rice" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/citron_img01.png')); ?>" alt="ゆず">
            <?php elseif ($mainmaterial == 9) : ?>
                <img class="j_rice" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/mountpeach_img01.png')); ?>" alt="やまもも">
            <?php elseif ($mainmaterial == 10) : ?>
                <img class="j_rice" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/plum_img01.png')); ?>" alt="梅">
            <?php endif; ?>
            <!-- 主原料表示 ここまで-->

            <!-- 甘辛度表示 -->
            <?php
            $spicy =  get_post_meta($post->ID, 'item_spicy', true);
            if ($spicy == 1) : ?>
                <img class="j_sweet" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/s_verysweet_img01.svg')); ?>" alt="1">
            <?php elseif ($spicy == 2) : ?>
                <img class="j_sweet" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/s_sweet_img01.svg')); ?>" alt="2">
            <?php elseif ($spicy == 3) : ?>
                <img class="j_sweet" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/s_sands_img01.svg')); ?>" alt="3">
            <?php elseif ($spicy == 4) : ?>
                <img class="j_sweet" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/s_spycy_img01.svg')); ?>" alt="4">
            <?php elseif ($spicy == 5) : ?>
                <img class="j_sweet" src="<?php echo esc_url(get_theme_file_uri('/images/contents/share/s_veryspicy_img01.svg')); ?>" alt="5">
            <?php endif; ?>
            <!-- 甘辛度表示 ここまで -->
        </div>
    </div>

    <!-- お酒の紹介 -->
    <div class="j_sake">
        <!-- 記事2 -->
        <?php $value = get_post_meta($post->ID, 'item_jizakearticle2', true); ?>
        <?php if (!empty($value)) : ?>
            <p class="j_bun"><?php echo get_post_meta($post->ID, 'item_jizakearticle2', true); ?></p>
        <?php endif; ?>

        <!-- 画像3 -->
        <?php $value = get_post_meta($post->ID, 'item_jizakeimg3', true); ?>
        <?php if (!empty($value)) : ?>
            <img src="<?php echo wp_get_attachment_url($value); ?>" alt="記事画像3" width="300">
        <?php endif; ?>

        <!-- 記事3 -->
        <?php $value = get_post_meta($post->ID, 'item_jizakearticle3', true); ?>
        <?php if (!empty($value)) : ?>
            <p class="j_bun"><?php echo get_post_meta($post->ID, 'item_jizakearticle3', true); ?></p>
        <?php endif; ?>

        <!-- 画像4 -->
        <?php $value = get_post_meta($post->ID, 'item_jizakeimg4', true); ?>
        <?php if (!empty($value)) : ?>
            <img src="<?php echo wp_get_attachment_url($value); ?>" alt="記事画像4" width="300">
        <?php endif; ?>

        <!-- 記事4 -->
        <?php $value = get_post_meta($post->ID, 'item_jizakearticle4', true); ?>
        <?php if (!empty($value)) : ?>
            <p class="j_bun"><?php echo get_post_meta($post->ID, 'item_jizakearticle4', true); ?></p>
        <?php endif; ?>

        <!-- 画像5 -->
        <?php $value = get_post_meta($post->ID, 'item_jizakeimg5', true); ?>
        <?php if (!empty($value)) : ?>
            <img src="<?php echo wp_get_attachment_url($value); ?>" alt="記事画像5" width="300">
        <?php endif; ?>

        <!-- 記事5 -->
        <?php $value = get_post_meta($post->ID, 'item_jizakearticle5', true); ?>
        <?php if (!empty($value)) : ?>
            <p class="j_bun"><?php echo get_post_meta($post->ID, 'item_jizakearticle5', true); ?></p>
        <?php endif; ?>
    </div>



    <!-- お酒紹介 -->
    <div class="j_wrapper">
        <section class="j_sakeshoukai_all">
            <div class="j_sakeshoukai">
                <div class="j_sakeshoukai_title">
                    <h4><img class="j_sakeshoukai_icon" src="<?php echo esc_url(get_theme_file_uri('/images/contents/jizake/j_tokkurishadow_img01.png')); ?>" alt="徳利"><?php echo get_post_meta($post->ID, 'item_productname', true); ?></h4>
                    <div class="j_rubi"><?php echo get_post_meta($post->ID, 'item_productkana', true); ?></div>
                </div>

                <?php $value = get_post_meta($post->ID, 'item_kuraname', true); ?>
                <?php if (empty($value)) : ?>
                <?php else : ?>
                    <p class="j_indent1">○蔵元：<a href="<?php echo get_post_meta($post->ID, 'item_kurallink', true); ?>"><?php echo get_post_meta($post->ID, 'item_kuraname', true); ?>&nbsp;<i class="fas fa-external-link-alt"></i></a></p>
                <?php endif; ?>

                <?php $value = get_post_meta($post->ID, 'item_polish', true); ?>
                <?php if (empty($value)) : ?>
                <?php else : ?>
                    <p class="j_indent2">○精米歩合：<?php echo get_post_meta($post->ID, 'item_polish', true); ?>%</p>
                <?php endif; ?>

                <?php $value = get_post_meta($post->ID, 'item_alcohol', true); ?>
                <?php if (empty($value)) : ?>
                <?php else : ?>
                    <p class="j_indent3">○度数：<?php echo get_post_meta($post->ID, 'item_alcohol', true); ?>度</p>
                <?php endif; ?>

                <?php $value = get_post_meta($post->ID, 'item_material', true); ?>
                <?php if (empty($value)) : ?>
                <?php else : ?>
                    <p class="j_indent4">○原料：<?php echo get_post_meta($post->ID, 'item_material', true); ?></p>
                <?php endif; ?>

                <p class="j_indent5">
                    <p class="j_indent5">○容量/価格：
                        <?php echo get_post_meta($post->ID, 'item_amount1', true); ?>ml / <?php echo get_post_meta($post->ID, 'item_price1', true); ?>円(税別)&nbsp;

                        <?php $value = get_post_meta($post->ID, 'item_price2', true); ?>
                        <?php if (empty($value)) : ?>
                        <?php else : ?>
                            <?php echo get_post_meta($post->ID, 'item_amount2', true); ?>ml / <?php echo get_post_meta($post->ID, 'item_price2', true); ?>円(税別)&nbsp;
                        <?php endif; ?>

                        <?php $value = get_post_meta($post->ID, 'item_price3', true); ?>
                        <?php if (empty($value)) : ?>
                        <?php else : ?>
                            <?php echo get_post_meta($post->ID, 'item_amount3', true); ?>ml / <?php echo get_post_meta($post->ID, 'item_price3', true); ?>円(税別)&nbsp;
                        <?php endif; ?>

                        <?php $value = get_post_meta($post->ID, 'item_price4', true); ?>
                        <?php if (empty($value)) : ?>
                        <?php else : ?>
                            <?php echo get_post_meta($post->ID, 'item_amount4', true); ?>ml / <?php echo get_post_meta($post->ID, 'item_price4', true); ?>円(税別)
                        <?php endif; ?>
                    </p>
                    <?php $value = get_post_meta($post->ID, 'jizake_spare1_value', true); ?>
                    <?php if (!empty($value)) : ?>
                        <p class="j_indent6">○<?php echo get_post_meta($post->ID, 'jizake_spare1_title', true); ?>
                            ：<?php echo get_post_meta($post->ID, 'jizake_spare1_value', true); ?></a></p>
                    <?php endif; ?>
                    <?php $value = get_post_meta($post->ID, 'jizake_spare2_value', true); ?>
                    <?php if (!empty($value)) : ?>
                        <p class="j_indent7">○<?php echo get_post_meta($post->ID, 'jizake_spare2_title', true); ?>
                            ：<?php echo get_post_meta($post->ID, 'jizake_spare2_value', true); ?></a></p>
                    <?php endif; ?> <?php $value = get_post_meta($post->ID, 'jizake_spare2_value', true); ?>
                    <?php if (!empty($value)) : ?>
                        <p class="j_indent8">○<?php echo get_post_meta($post->ID, 'jizake_spare3_title', true); ?>
                            ：<?php echo get_post_meta($post->ID, 'jizake_spare3_value', true); ?></a></p>
                    <?php endif; ?>
                </p>
            </div>
        </section>

        <!-- ＃タグ -->
        <div class="j_tag">
            <?php echo get_the_term_list($post->ID, 'jizake_tag', '<div class="j_tag_1"><p>', '</p></div><div class="j_tag_1"><p>', '</p></div>'); ?>
        </div>
    </div>
    <!-- コメント欄フォーム -->
    <?php comments_template(); ?>
    <!-- <div class="j_commentform">
    <div class="j_commentform2">
        <p><img class="j_commenthukidashi" src="../images/contents/jizake/j_comment_img.svg" alt="コメント">
            コメントを残す</p>
    </div>
    <div class="j_commentname">お名前 <input name="name" type="text" placeholder=""></div>

    <textarea name="message" cols="100" rows="5" placeholder="コメント入力"></textarea>
    <input type="submit" class="c-button" value="送信">
</div>
</section> -->

    <!-- こちらもオススメ -->
    <section class="j_osusume">
        <h4>こちらもオススメ</h4>
        <?php
        // 同じカテゴリのお酒を検索
        global $post;
        $term = array_shift(get_the_terms($post->ID, 'jizake_cat')); //←ここが追加
        $args = array(
            'numberposts'  => 3, //表示件数
            'post_type'    => 'jizake', //カスタム投稿タイプ名
            'taxonomy'     => 'jizake_cat', //タクソノミー名
            'term' => $term->slug, //ターム名
            'orderby'      => 'rand', //ランダム表示
            'post__not_in' => array($post->ID) //表示中の記事を除外
        );
        ?>
        <?php $myPosts = get_posts($args);
        if ($myPosts) : ?>
            <div class="j_osusumephoto">
                <?php foreach ($myPosts as $post) : setup_postdata($post); ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                <?php endforeach; ?>
            <?php else : ?>
                <p>似たお酒は見つかりませんでした。</p>
            <?php endif; ?>
            </div>
            <?php wp_reset_postdata(); ?>

    </section>
</div>




<!-- /contaiter -->
<!-- ▲ コンテンツ : 終了-->
<?php get_footer(); ?>
