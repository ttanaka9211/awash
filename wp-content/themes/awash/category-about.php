<?php get_header(); ?>

</div>
<div class="al_h2">
    <h2 class="typo all_pageshadow">お酒を知る</h2>
    <img src="<?php echo esc_url(get_theme_file_uri('/images/template/about.jpg')); ?>" alt="">
</div>

<main>

    <!-- ====================↓記事一覧==================== -->
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <article>
                <!-- 記事個別エリア -->
                <a class="" href="<?php the_permalink(); ?>">
                    <!-- 記事画像 -->
                    <?php echo get_the_post_thumbnail(); ?>
                    <!-- 記事内容 -->
                    <p class="al_article_title"><?php the_title(); ?></p>
                    <p class="al_article_date"><?php the_time('Y-n-j'); ?></p>
                    <p class="al_article_text"><?php the_excerpt(); ?></p>
                </a>
                <p class="al_article_good"><?php if (function_exists('the_ratings')) {
                                                the_ratings();
                                            } ?></p>
                <!-- 子カテゴリタグ -->
                <?php $cats = get_the_category(); ?>
                <?php foreach ($cats as $cat) :
                    if ($cat->parent) : ?>
                        <div class="al_article_tag">
                            <p><a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <!-- タグ -->
                <?php the_tags('<div class="al_article_tag"><p>', '</p></div><div class="al_article_tag"><p>', '</p></div>'); ?>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p>当てはまる情報はまだありません。</p>
    <?PHP endif; ?>
</main>
<?php wp_reset_postdata(); ?>


<?php get_footer(); ?>
