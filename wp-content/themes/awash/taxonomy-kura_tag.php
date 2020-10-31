<?php
$taxquery_cat = array(
    'taxonomy' => 'kura_tag',
    'terms' => $term, //選択されたタームを取得
    'field' => 'slug',
    'operator' => 'IN' // 演算子'IN','NOT IN','AND','EXISTS'(4.1.0以降),'NOT EXISTS'(4.1.0以降)が利用可能
);

$wp_query = new WP_Query(
    array(
        'post_type'     => 'kura',
        'tax_query' => array(
            'relation' => 'AND',
            $taxquery_cat,
        ),
        'orderby' =>  'meta_value',
        'order' => 'ASC',
        'meta_key' => 'item_kuramotokana',

        'nopaging' => false,
        'posts_per_page'  => 12, //12件表示
        'paged' => get_query_var('paged'),
    )
);
?>

<?php get_header(); ?>

<!-- ページタイトル -->
<section>
    <div class="kl_top">
        <img src="<?php echo esc_url(get_theme_file_uri('./images/template/kura.jpg')); ?>" alt="酒造">
        <h2 class="kl_title typo all_pageshadow">酒造</h2>
    </div>
</section>
<!-- ページタイトルここまで -->

<div class="kl_main">

    <!-- 検索エリア -->
    <section>
        <div class="kl_search">

            <!-- 虫眼鏡 -->
            <div id="accordion" class="kl_search_icon">
                <i class="fas fa-search fa-2x"></i>
            </div>
            <!-- 虫眼鏡ここまで -->

            <!-- 検索フォーム -->
            <div id="search_inner" class="hide">
                <!-- 現在の投稿タイプを取得し、そのオブジェクト(情報)を引き出して表示 -->
                <?php //echo esc_html(get_post_type_object(get_post_type())->label);
                ?>
                <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                    <!-- ページ情報送信用 -->
                    <!--//タクソノミーをスラッグで指定-->
                    <input type="hidden" name="post_type" value="kura">
                    <hr class="kl_line hide560">

                    <!-- フリーワードと並べ替え -->
                    <div class="kl_form1">
                        <!-- <label for="s" class="assistive-text">＜キーワード検索＞</label> -->
                        <p class="kl_search_text"><input type="text" name="s" id="s" value="<?php the_search_query(); ?>" class="kl_textbox" placeholder="キーワード検索"></p>
                        <p class="kl_sort_name">並び替え:</p>
                        <p class="kl_sort_dropdown">
                            <select name="sort" class="kl_dropdown">
                                <option value="kana_asc" selected>名前順</option>
                                <option value="date_desc">新着順</option>
                                <option value="comment_desc">口コミ順</option>
                                <!-- <option value="">いいね順</option> -->
                            </select>
                        </p>
                    </div>
                    <!-- フリーワード検索と並べ替えここまで -->

                    <!-- カテゴリとタグのチェックボックス -->
                    <div class="kl_form2">
                        <div class="kl_check">

                            <!-- カテゴリ -->
                            <div class="kl_category_area">
                                <?php
                                $taxonomy_name = 'kura_cat';
                                $taxonomys = get_terms($taxonomy_name); ?>
                                <input type="hidden" name="custompost_cat" value="<?php echo $taxonomy_name ?>">
                                <?php if (!is_wp_error($taxonomys) && count($taxonomys)) :
                                    foreach ($taxonomys as $taxonomy) :
                                        $tax_posts = get_posts(array('post_type' => get_post_type(), 'taxonomy' => $taxonomy_name, 'term' => $taxonomy->slug));
                                        if ($tax_posts) :
                                ?>
                                            <p><label><input type="checkbox" name="post_cat[]" value="<?php echo $taxonomy->slug; ?>"><span class="kl_tag"><?php echo $taxonomy->name; ?></span></label></p>
                                <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <!-- カテゴリここまで -->

                            <!-- タグ -->
                            <div class="kl_tag_area">
                                <?php
                                $taxonomy_name = 'kura_tag';
                                $taxonomys = get_terms($taxonomy_name); ?>
                                <input type="hidden" name="custompost_tag" value="<?php echo $taxonomy_name ?>">
                                <?php if (!is_wp_error($taxonomys) && count($taxonomys)) :
                                    foreach ($taxonomys as $taxonomy) :
                                        $tax_posts = get_posts(array('post_type' => get_post_type(), 'taxonomy' => $taxonomy_name, 'term' => $taxonomy->slug));
                                        if ($tax_posts) :
                                ?>
                                            <p><label><input type="checkbox" name="post_tag[]" value="<?php echo $taxonomy->slug; ?>"><span class="kl_tag"><?php echo $taxonomy->name; ?></span></label></p>
                                <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <!-- タグここまで -->

                        </div>
                    </div>
                    <!-- カテゴリとタグのチェックボックスここまで -->

                    <!-- ボタン -->
                    <div class="kl_search_button">
                        <button type="submit" class="kl_button"><span>検　索</span></button>
                        <button type="reset" class="kl_button"><span>CLEAR</span></button>
                    </div>
                    <!-- ボタンここまで -->

                    <hr class="kl_line hide560">
                </form>
            </div>
            <!-- 検索フォームここまで -->

        </div>
    </section>
    <!-- 検索エリアここまで -->

    <!-- 酒造カテゴリマップ -->
    <section class="kl_map_area">
        <div class="kl_map_map">
            <ul>
                <li><a href="<?php echo get_post_type_archive_link('kura'); ?>"><span class="kl_mapall_text noto">徳島全域</span></a></li>
                <li><a href="<?php echo get_term_link('south', 'kura_cat'); ?>"><span class="kl_map_text  kl_west_text noto">西部</span></a></li>
                <li><a href="<?php echo get_term_link('east', 'kura_cat'); ?>"><span class="kl_map_text  kl_east_text noto">東部</span></a></li>
                <li><a href="<?php echo get_term_link('west', 'kura_cat'); ?>"><span class="kl_map_text  kl_south_text noto">南部</span></a></li>
            </ul>
        </div>
    </section>
    <!-- 酒造カテゴリマップここまで -->

    <!-- 検索結果表示エリア -->
    <section>
        <div id="slide" class="kl_result clearfix">
            <?php if ($wp_query->have_posts()) : ?>
                <?php while ($wp_query->have_posts()) : ?>
                    <?php $wp_query->the_post(); ?>

                    <!-- 酒造個別エリア -->
                    <div class="kl_maker slideConts slidetime">
                        <a href="<?php echo get_post_permalink(); ?>">
                            <!-- 酒造画像 -->
                            <div class="kl_maker_img">
                                <?php echo get_the_post_thumbnail(); ?>
                            </div>
                            <!-- 酒造名前 -->
                            <div class="kl_namelabel"></div>
                            <div class="kl_character">
                                <p class="kl_kana"><?php echo get_post_meta($post->ID, 'item_kuramotokana', true); ?></p>
                                <h3 class="kl_name typo"><?php echo get_post_meta($post->ID, 'item_kuramotoname', true); ?></h3>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>


        </div>
    <?php else : ?>
        <p>当てはまる情報はまだありません。</p>
    <?php endif; ?>
    <?php if (function_exists("the_pagination")) : ?>
        <div class="kl_pagination"><?php echo the_pagination(array('screen_reader_text' => ' ')); ?></div>
    <?php endif; ?>
    </section>
    <? wp_reset_query(); ?>
    <!-- 検索結果表示エリアここまで -->
</div>
<?php get_footer(); ?>
