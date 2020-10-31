<?php get_header(); ?>
<div class="a_category">
    <img class="a_category_img01" src="<?php echo esc_url(get_theme_file_uri('/images/template/about.jpg')); ?>" alt="">
    <h2 class="typo all_pageshadow">お酒を知る</h2>
</div>


    <div class="a_wrap_wrap">
        <p class="a_sns">
            <?php echo do_shortcode('[addtoany]'); ?>
        </p>

        <!-- 記事の読込 -->
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>

                <article>
                    <!-- お酒についてタイトル -->
                    <h3 class="a_title typo"><?php the_title(); ?></h3>

                    <!-- お酒について内容 -->
                    <div class="a_bun">
                        <?php the_content(); ?>
                    </div>

                    <!-- ＃タグ -->
                    <div class="a_tag">
                        <?php the_tags('<div class="a_tag_1">', '</div><div class="a_tag_2">', '</div>'); ?>
                    </div>
                <?php endwhile; ?>

                <!-- ページネーション -->
                <section class="a_pagenation">
                    <div class="a_page_left"><?php previous_post_link('&lsaquo;&nbsp;%link', '前の記事<br>%title'); ?></div>
                    <div class="a_page_right"><?php next_post_link('%link ', '次の記事&nbsp;&rsaquo;<br>%title'); ?></div>
                </section>
                </article>
            <?php endif; ?>


            <!-- 関連記事(同じタグの記事) -->
            <article class="a_kanren">
                <h3 class="typo">関連記事</h3>
                <div class="a_kanrenbox">
                    <div class="a_kanren_kiji">
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
                                <article class="a_kanren_kiji">
                                    <a href="<?php the_permalink(); ?>">
                                        <p class="a_kanren_img"><?php echo get_the_post_thumbnail(); ?></p>
                                        <p class="a_kanren_kijititle typo"><?php the_title(); ?></p>
                                        <p class="a_kanren_kijibun">
                                            <?php the_time('Y/m/d'); ?><br>
                                            <?php the_excerpt(); ?>
                                        </p>
                                    </a>
                                    <!-- 関連記事タグ -->
                                    <?php the_tags('<div class="a_article_tag">', '</div><div class="a_article_tag">', '</div>'); ?>
                                </article>
                            <?php } // while文ここまで
                            ?>
                    </div>
                </div>
            <?php
                        } ?>
            <!-- IF文ここまで -->
            </aticle>
    </div>


<!-- ▲ コンテンツ : 終了-->
<?php get_footer(); ?>
