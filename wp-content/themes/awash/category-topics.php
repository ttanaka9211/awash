<?php get_header(); ?>

<div class="tl_h2">
    <h2 class="typo all_pageshadow">特集</h2>
    <img src="<?php echo esc_url(get_theme_file_uri('/images/template/topics.jpg')); ?>" alt="特集">
</div>

<main class="main">

    <!-- 記事一覧 -->

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <article>
                <a class="" href="<?php the_permalink(); ?>">
                    <?php echo get_the_post_thumbnail(); ?>
                    <p class="tl_article_title"><?php the_title(); ?></p>
                    <p class="tl_article_date"><?php the_time('Y-n-j'); ?></p>
                    <p class="tl_article_text"><?php the_excerpt(); ?></p>
                </a>
                <p class="tl_article_good">
                    <?php if (function_exists('the_ratings')) {
                        the_ratings();
                    } ?>
                </p>
                <!-- 子カテゴリタグ -->
                <?php $cats = get_the_category(); ?>
                <?php foreach ($cats as $cat) :
                    if ($cat->parent) : ?>
                        <div class="tl_article_tag">
                            <p><a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->cat_name; ?></a></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <!-- タグ -->
                <?php the_tags('<div class="tl_article_tag"><p>', '</p></div><div class="tl_article_tag"><p>', '</p></div>'); ?>
            </article>
        <?php endwhile; ?>

    <?php else : ?>
        <p>当てはまる情報はまだありません。</p>
    <?PHP endif; ?>
</main>
</div>
<?php wp_reset_postdata(); ?>

<!-- ページネーションここから -->
<?php if (function_exists('the_pagination')) : ?>
    <div class="kl_pager">
        <ul class="kl_pagenation">
            <?php echo the_pagination(
                array(
                    'prev_next' => true,
                    'prev_text'      => '<li class="pre"><span>&laquo;</span></li>',
                    'next_text'          => '<li class="next"><span>&raquo;</span></li>',
                    'before_page_number' => '<li><span>',
                    'after_page_number'  => '<span></span></li>',
                    'screen_reader_text' => ' ',
                )
            ); ?>
        </ul>
    </div>
<?php endif; ?>
<!-- ページネーションここまで -->

<?php get_footer(); ?>
