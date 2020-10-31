<?php get_header(); ?>
</div>
<!-- ページタイトル -->
<div class="kl_top">
    <img src="<?php echo esc_url(get_theme_file_uri('./images/template/kura.jpg')); ?>" alt="酒造">
    <h2 class="typo all_pageshadow">酒造</h2>
</div>

<!-- ページタイトルここまで -->

<main>
    <div class="">

        <!-- SNS -1 -->
        <p class="k_sns"><?php echo do_shortcode('[addtoany]'); ?> </p>

        <!-- タイトル -->
        <div class="k_sake">
            <h3 class="k_title typo">
                <?php the_title(); ?>
            </h3>
            <?php if (function_exists('the_ratings')) {
                the_ratings();
            } ?>

            <!-- 記事文章１ -->
            <?php $value = get_post_meta($post->ID, 'item_kuraarticle1', true); ?>
            <?php if (!empty($value)) : ?>
                <p class="k_bun"><?php echo get_post_meta($post->ID, 'item_kuraarticle1', true); ?></p>
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'item_kuraimg1', true); ?>
            <?php if (!empty($value)) : ?>
                <div class="k_jizake_imagebox">
                    <img class="k_jizake_img01" src="<?php echo wp_get_attachment_url($value); ?>" alt="徳島の酒">
                <?php endif; ?>
                </div>
        </div>

        <!-- 看板商品 -->
        <div class="k_uzu">
            <img class="k_uzuuzu" src="<?php echo esc_url(get_theme_file_uri('./images/contents/jizake/s_biguzu_img01.png')); ?>" alt="渦">
            <?php $value = get_post_meta($post->ID, 'item_kuraimg2', true); ?>
            <?php if (!empty($value)) : ?>
                <a href="<?php echo get_post_meta($post->ID, 'item_productlink1', true); ?>">
                    <img class="k_jizake_img01" src="<?php echo wp_get_attachment_url($value); ?>" alt="徳島のお酒">
                </a>
            <?php endif; ?>
            <!-- アイコン表記 -->
            <div class="k_hyouki">
                <!-- 主原料表示 -->
                <?php $mainmaterial =  get_post_meta($post->ID, 'item_product1_mainmaterial', true); ?>
                <?php if (!empty($mainmaterial)) : ?>
                    <?php if ($mainmaterial == 1) : ?>
                        <img class="k_rice" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/rise_img01.png')); ?>" alt="米">
                    <?php elseif ($mainmaterial == 2) : ?>
                        <img class="k_rice" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/wheat_img01.png')); ?>" alt="麦">
                    <?php elseif ($mainmaterial == 3) : ?>
                        <img class="k_rice" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/narutokintoki_img01.png')); ?>" alt="鳴門金時">
                    <?php elseif ($mainmaterial == 4) : ?>
                        <img class="k_rice" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/sweetpotato_img01.png')); ?>" alt="さつま芋">
                    <?php elseif ($mainmaterial == 5) : ?>
                        <img class="k_rice" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/grape_img01.png')); ?>" alt="葡萄">
                    <?php elseif ($mainmaterial == 6) : ?>
                        <img class="k_rice" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/hop_img01.png')); ?>" alt="ホップ">
                    <?php elseif ($mainmaterial == 7) : ?>
                        <img class="k_rice" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/sudati_img01.png')); ?>" alt="すだち">
                    <?php elseif ($mainmaterial == 8) : ?>
                        <img class="k_rice" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/citron_img01.png')); ?>" alt="ゆず">
                    <?php elseif ($mainmaterial == 9) : ?>
                        <img class="k_rice" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/mountpeach_img01.png')); ?>" alt="やまもも">
                    <?php elseif ($mainmaterial == 10) : ?>
                        <img class="k_rice" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/plum_img01.png')); ?>" alt="梅">
                    <?php endif; ?>
                <?php endif; ?>

                <!-- 甘辛度 -->
                <?php $spicy =  get_post_meta($post->ID, 'item_product1_spicy', true); ?>
                <?php if (!empty($spicy)) : ?>
                    <?php if ($spicy == 1) : ?>
                        <img class="j_sweet" src="<?php echo esc_url(get_theme_file_uri('images/contents/jizake/s_verysweet_img01.svg')); ?>" alt="極甘">
                    <?php elseif ($spicy == 2) : ?>
                        <img class="j_sweet" src="<?php echo esc_url(get_theme_file_uri('images/contents/jizake/s_sweet_img01.svg')); ?>" alt="甘">
                    <?php elseif ($spicy == 3) : ?>
                        <img class="j_sweet" src="<?php echo esc_url(get_theme_file_uri('images/contents/jizake/s_sands_img01.svg')); ?>" alt="中">
                    <?php elseif ($spicy == 4) : ?>
                        <img class="j_sweet" src="<?php echo esc_url(get_theme_file_uri('images/contents/jizake/s_spycy_img01.svg')); ?>" alt="辛">
                    <?php elseif ($spicy == 5) : ?>
                        <img class="j_sweet" src="<?php echo esc_url(get_theme_file_uri('images/contents/jizake/s_veryspicy_img01.svg')); ?>" alt="極辛">
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- 記事文章2 -->
        <?php if (!empty($value)) : ?>
            <p class="k_bun"><?php echo get_post_meta($post->ID, 'item_kuraarticle2', true); ?></p>
        <?php endif; ?>
        <!-- 記事文章3 -->
        <?php $value = get_post_meta($post->ID, 'item_kuraarticle3', true); ?>
        <?php if (!empty($value)) : ?>
            <p class="k_bun"><?php echo get_post_meta($post->ID, 'item_kuraarticle3', true); ?></p>
        <?php endif; ?>
        <!-- 記事文章4 -->
        <?php $value = get_post_meta($post->ID, 'item_kuraarticle4', true); ?>
        <?php if (!empty($value)) : ?>
            <p class="k_bun"><?php echo get_post_meta($post->ID, 'item_kuraarticle4', true); ?></p>
        <?php endif; ?>
        <!-- 記事文章5 -->
        <?php $value = get_post_meta($post->ID, 'item_kuraarticle5', true); ?>
        <?php if (!empty($value)) : ?>
            <p class="k_bun"><?php echo get_post_meta($post->ID, 'item_kuraarticle5', true); ?></p>
        <?php endif; ?>

        <!-- お酒紹介 -->
        <section class="k_sakeshoukai_all">
            <div class="k_sakeshoukai">
                <!-- 蔵元名 -->
                <div class="k_sakeshoukai_title">
                    <div class="k_rubi"><?php echo get_post_meta($post->ID, 'item_kuramotokana', true); ?></div>
                    <h4>
                        <img class="k_sakeshoukai_icon" src="<?php echo esc_url(get_theme_file_uri('./images/contents/jizake/j_tokkurishadow_img01.png')); ?>" alt="徳利">
                        <?php echo get_post_meta($post->ID, 'item_kuramotoname', true); ?>
                    </h4>
                    <!--  -->
                    <p class="k_indent1">○蔵元：斎藤酒造</p>
                    <!-- 取扱商品 -->
                    <p class="k_indent2">○取扱い製品：<?php get_post_meta($post->ID, 'item_product2', true); ?>
                        <?php $value = get_post_meta($post->ID, 'item_product2', true); ?>
                        <?php if (!empty($value)) :
                            echo get_post_meta($post->ID, 'item_product2', true); ?>
                        <?php endif; ?>
                        <?php $value = get_post_meta($post->ID, 'item_product3', true); ?>
                        <?php if (!empty($value)) :
                            echo '、' . get_post_meta($post->ID, 'item_product3', true); ?>
                        <?php endif; ?>
                        <?php $value = get_post_meta($post->ID, 'item_product4', true); ?>
                        <?php if (!empty($value)) :
                            echo '、' . get_post_meta($post->ID, 'item_product4', true); ?>
                        <?php endif; ?>
                        <!-- 見学 -->
                        <?php $value = get_post_meta($post->ID, 'item_tour', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent3">○見学：<?php echo get_post_meta($post->ID, 'item_tour', true); ?></p>
                        <?php endif; ?>
                        <!-- 試飲 -->
                        <?php $value = get_post_meta($post->ID, 'item_taste', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent4">○試飲：<?php echo get_post_meta($post->ID, 'item_taste', true); ?></p>
                        <?php endif; ?>
                        <!-- 住所/googleマップリンク -->
                        <?php $value = get_post_meta($post->ID, 'item_zip', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent5">○住所：
                                <a href="<?php echo get_post_meta($post->ID, 'item_maplink', true); ?>" target="_blank">
                                    <?php echo get_post_meta($post->ID, 'item_address', true); ?><?php echo get_post_meta($post->ID, 'item_zip', true); ?>&nbsp;<i class="fas fa-map-marker-alt"></i>
                                </a>
                            </p>
                        <?php endif; ?>
                        <!-- 電話番号 -->
                        <?php $value = get_post_meta($post->ID, 'item_tel1', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent7">○電話番号：<?php echo get_post_meta($post->ID, 'item_tel1', true); ?></p>
                        <?php endif; ?>
                        <?php $value = get_post_meta($post->ID, 'item_tel2', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent7">○電話番号2：<?php echo get_post_meta($post->ID, 'item_tel2', true); ?></p>
                        <?php endif; ?>
                        <?php $value = get_post_meta($post->ID, 'item_tel3', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent7">○電話番号3：<?php echo get_post_meta($post->ID, 'item_tel3', true); ?></p>
                        <?php endif; ?>
                        <!-- FAX番号 -->
                        <?php $value = get_post_meta($post->ID, 'item_fax', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent7">○FAX番号：<?php echo get_post_meta($post->ID, 'item_fax', true); ?></p>
                        <?php endif; ?>
                        <!-- 営業時間 -->
                        <?php $value = get_post_meta($post->ID, 'item_open', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent8">○営業時間：<?php echo get_post_meta($post->ID, 'item_open', true); ?></p>
                        <?php endif; ?>
                        <!-- 定休日 -->
                        <?php $value = get_post_meta($post->ID, 'item_holiday', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent9">○定休日：<?php echo get_post_meta($post->ID, 'item_holiday', true); ?></p>
                        <?php endif; ?>
                        <!-- HP -->
                        <?php $value = get_post_meta($post->ID, 'item_externallink', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent10">○HP：<a href="<?php echo get_post_meta($post->ID, 'item_externallink', true); ?>" target="_blank">
                                    <?php echo get_post_meta($post->ID, 'item_externallink', true); ?></a></p>
                        <?php endif; ?>
                        <!-- SNS -->
                        <?php $value = get_post_meta($post->ID, 'item_twitterlink', true);
                        $value2 = get_post_meta($post->ID, 'item_twitterlink', true);
                        $value3 = get_post_meta($post->ID, 'item_twitterlink', true); ?>
                        <?php if (!empty($value) || !empty($value2) || !empty($value3)) : ?>
                            <p class="k_indent10">○SNS：
                                <?php if (!empty($value)) : ?>
                                    <a href="<?php echo get_post_meta($post->ID, 'item_twitterlink', true); ?>" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($value2)) : ?>
                                    <a href="<?php echo get_post_meta($post->ID, 'item_facebooklink', true); ?>" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($value3)) : ?>
                                    <a href="<?php echo get_post_meta($post->ID, 'item_linelink', true); ?>" target="_blank">
                                        <i class="fab fa-line"></i>
                                    </a>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>
                        <?php $value = get_post_meta($post->ID, 'kura_spare1_value', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent11">○<?php echo get_post_meta($post->ID, 'kura_spare1_title', true); ?>
                                ：<?php echo get_post_meta($post->ID, 'kura_spare1_value', true); ?></a></p>
                        <?php endif; ?>
                        <?php $value = get_post_meta($post->ID, 'kura_spare2_value', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent12">○<?php echo get_post_meta($post->ID, 'kura_spare2_title', true); ?>
                                ：<?php echo get_post_meta($post->ID, 'kura_spare2_value', true); ?></a></p>
                        <?php endif; ?>
                        <?php $value = get_post_meta($post->ID, 'kura_spare1_value', true); ?>
                        <?php if (!empty($value)) : ?>
                            <p class="k_indent13">○<?php echo get_post_meta($post->ID, 'kura_spare3_title', true); ?>
                                ：<?php echo get_post_meta($post->ID, 'kura_spare3_value', true); ?></a></p>
                        <?php endif; ?>

                </div>
            </div>
        </section>

        <!-- ＃タグ -->
        <div class="k_tag">
            <?php echo get_the_term_list($post->ID, 'kura_tag', '<div class="k_tag_1"><p>', '</p></div><div class="k_tag_1"><p>', '</p></div>'); ?>
        </div>

        <!-- コメント欄 -->
        <?php comments_template(); ?>


        <!-- こちらもオススメ -->
        <section class="k_osusume">
            <h4>お取り扱い製品</h4>
            <div class="k_osusumephoto">
                <?php $value = get_post_meta($post->ID, 'item_kuraimg3', true); ?>
                <?php if (!empty($value)) : ?>
                    <a href="<?php echo get_post_meta($post->ID, 'item_productlink2', true); ?>">
                        <img src="<?php echo wp_get_attachment_url($value); ?>">
                    </a>
                <?php endif; ?>
                <?php $value = get_post_meta($post->ID, 'item_kuraimg4', true); ?>
                <?php if (!empty($value)) : ?>
                    <a href="<?php echo get_post_meta($post->ID, 'item_productlink3', true); ?>">
                        <img src="<?php echo wp_get_attachment_url($value); ?>"> </a>
                <?php endif; ?>
                <?php $value = get_post_meta($post->ID, 'item_kuraimg5', true); ?>
                <?php if (!empty($value)) : ?>
                    <a href="<?php echo get_post_meta($post->ID, 'item_productlink4', true); ?>">
                        <img src="<?php echo wp_get_attachment_url($value); ?>" ?>
                    </a>
                <?php endif; ?>
            </div>
        </section>


</main>
</div>
<?php get_footer(); ?>
