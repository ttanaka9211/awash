<?php get_header(); ?>
</div>
<div class="t_category">
    <img class="t_category_img01" src="<?php echo esc_url(get_theme_file_uri('/images/template/topics.jpg')); ?>" alt="">
    <h2 class="typo all_pageshadow">特集</h2>
</div>

<div class="container2 noto">
    <!-- SNS -1 -->
    <div class="t_sns">
        <?php echo do_shortcode('[addtoany]'); ?>
        <!-- <i class="fab fa-facebook"></i> -->
        <!-- <i class="fab fa-twitter"></i> -->
        <!-- <i class="fab fa-line"></i> -->
    </div>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <article class="t_event">
                <h3 class="t_event_title typo"><?php the_title(); ?></h3>

                <p class="t_event_date"><?php the_time('Y年n月j日'); ?></p>

                <?php the_content(); ?>

                <!-- ＃タグ -->
                <div class="t_tag">
                    <?php the_tags('<div class="t_tag_1"><p>', '</p></div><div class="t_tag_1"><p>', '</p></div>'); ?>
                </div>
            <?php endwhile; ?>
            <!-- ページネーション -->
            <section class="t_pagenation">
                <div class="t_page_left"><?php previous_post_link('&lsaquo;&nbsp;%link', '前の記事<br>%title'); ?></div>
                <div class="t_page_right"><?php next_post_link('%link ', '次の記事&nbsp;&rsaquo;<br>%title'); ?></div>
            </section>
            </article>
        <?php endif; ?>

        <!-- 関連記事(同じタグの記事) -->
        <section class="t_kanren">
            <h3 class="typo">関連記事</h3>
            <div class="t_kanrenbox">
                <?php
                $orig_post = $post;
                global $post;
                $tags = wp_get_post_tags($post->ID);

                if ($tags) {
                    $tag_ids = array();

                    foreach ($tags as $individual_tag)
                        $tag_ids[] = $individual_tag->term_id;
                    $args = array(
                        'tag__in' => $tag_ids,
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => 2, // 表示する関連記事の数
                        'caller_get_posts' => 1,
                        'orderby' => 'rand', // 過去記事に内部リンクできるので割と重要
                    );

                    $my_query = new wp_query($args);
                ?>

                    <?php
                    while ($my_query->have_posts()) {
                        $my_query->the_post();

                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail_size');
                        if (!empty($thumb['0'])) {
                            $url = $thumb['0'];
                        } else {
                            $url = "http://design-ec.com/d/e_others_50/l_e_others_500.png";
                        } ?>
                        <article class="t_kanren_kiji">
                            <a href="<?php the_permalink(); ?>">
                                <p class="t_kanren_img"><?php echo get_the_post_thumbnail(); ?></p>
                                <p class="t_kanren_kijititle typo"><?php the_title(); ?></p>
                                <p class="t_kanren_kijibun"><?php the_time('Y/m/d'); ?></p>
                                <p class="t_kanren_kijibun"><?php the_excerpt(); ?></p>
                            </a>
                            <p class="t_kanren_kijibun"><?php if (function_exists('the_ratings')) {
                                                            the_ratings();
                                                        } ?></p>
                            <!-- 関連記事タグ -->
                            <div class="t_tag">
                                <?php the_tags('<div class="t_tag_1"><p>', '</p></div><div class="t_tag_1"><p>', '</p></div>'); ?>
                            </div>
                        </article>

                    <?php } // while文ここまで
                    ?>
            </div>

        <?php
                } ?>
        <!-- IF文ここまで -->
        </section>

        <div class="tl_comment">
            <?php comments_template(); ?>
        </div>
</div><!-- .contaiter -->

</div>
<!-- ▲ コンテンツ : 終了-->
<?php get_footer(); ?>
