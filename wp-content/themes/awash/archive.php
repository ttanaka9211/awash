<?php get_header(); ?>
<?php //print_r($wp_query);
?>
<?php if (in_category('about')) : ?>
    <div class="tl_h2">
        <h2 class="typo all_pageshadow">特集</h2>
        <img src="../images/contents/share/jl_pagetitle_img.png" alt="特集">
    </div>
<?php else : ?>
    <div class="tl_h2">
        <h2 class="typo all_pageshadow">特集</h2>
        <img src="../images/contents/share/jl_pagetitle_img.png" alt="特集">
    </div>
<?php endif; ?>



<main class="main">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <article>
                <a class="" href="<?php the_permalink(); ?>">
                    <?php echo get_the_post_thumbnail(); ?>
                    <p class="tl_article_title"><?php the_title(); ?></p>
                    <p class="tl_article_date"><?php the_time('Y-n-j'); ?></p>
                    <p class="tl_article_text"><?php the_excerpt(); ?></p>
                    <p class="tl_article_good"><?php if (function_exists('the_ratings')) {
                                                    the_ratings();
                                                } ?></p>
                </a>
                <?php the_tags('<div class="tl_article_tag"><p>', '</p></div><div class="tl_article_tag"><p>', '</p></div>'); ?>
            </article>
        <?php endwhile; ?>
</main>
<div class="kl_pager">
    <ul class="kl_pagenation">
        <?php echo the_posts_pagination(
            array(
                'prev_next' => true,
                // 'prev_text'          => __('&laquo; Previous'),
                'prev_text'      => '<li class="pre"><span>&laquo;</span></li>',
                'next_text'          => '<li class="next"><span>&raquo;</span></li>',
                'before_page_number' => '<li><span>',
                'after_page_number'  => '<span></span></li>',
                'screen_reader_text' => ' ',
            )
        );
        ?>
    </ul>
</div>
<?php else : ?>
    <p>当てはまる情報はまだありません。</p>
<?PHP endif; ?>
<?php wp_reset_postdata(); ?>


<!-- ページネーションはじめ -->
<!-- <div class="kl_pager">
    <ul class="kl_pagenation">
        <li class="pre"><a href="#"><span>«</span></a></li>
        <li><a href="#" class="active"><span>1</span></a></li>
        <li><a href="#"><span>2</span></a></li>
        <li><a href="#"><span>3</span></a></li>
        <li><a href="#"><span>4</span></a></li>
        <li><a href="#"><span>5</span></a></li>
        <li class="next"><a href="#"><span>»</span></a></li>
    </ul>
</div> -->
<!-- ページネーションおわり -->

<?php get_footer(); ?>
