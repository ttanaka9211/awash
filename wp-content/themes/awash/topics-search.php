<?php get_header(); ?>

<?php
/*
Template Name: Search Page
*/
?>
<?php
$s = $_GET['s'];
$search_category = $_GET['search_cat'];
$search_tag = $_GET['search_tag'];
$sort = $_GET['sort'];


if (isset($search_category)) :
    $category_name = $search_category;

endif;
// if (isset($post_tag)) :
//     $taxquery_tag = array(
//         'taxonomy' => $custompost_tag,
//         'terms' => $post_tag, //選択されたタームを取得
//         'field' => 'slug',
//         'operator' => 'AND' // 演算子'IN','NOT IN','AND','EXISTS'(4.1.0以降),'NOT EXISTS'(4.1.0以降)が利用可能
//     );
// endif;



// ソートの分岐
if ($sort == 'date_desc') {             //新着順の場合
    $orderby = 'date';
    $order = 'DESC';
} elseif ($sort == 'comment_desc') {    //コメント数の場合
    $orderby = 'comment_count';
    $order = 'DESC';
} elseif ($sort == 'kana_asc') {
    $orderby =  'meta_value';
    $order = 'ASC';
    if ($post_type == 'jizake') {
        $meta_key = 'item_productkana';
    } elseif ($post_type == 'kura') {
        $meta_key = 'item_kuramotokana';
    }
}

// 条件の設定
$args = array(
    'post_type'     => 'post',
    'category_name'  => 'topics',
    'orderby' =>  $orderby,
    'order' => $order,
    'nopaging' => false,
    'posts_per_page'  => 12, //12件表示
    'paged' => get_query_var('paged'),
);
// 投稿を検索

$wp_query = new WP_Query($args);

?>
-->
<?php if ($wp_query->have_posts()) :
    while ($wp_query->have_posts()) :
        $wp_query->the_post(); ?>
        <table border="1">
            <tr>
                <td>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                </td>
                <td>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                    <?php echo get_the_term_list($post->ID, $custompost_cat); ?>
                    <?php the_tags('<span class="tags-links">', '&nbsp', '</span>') ?>
                    <?php echo get_the_term_list($post->ID, $custompost_tag); ?>
                    <?php comments_number('0', '1', '%'); ?>
                </td>
            </tr>
        </table>
    <?php endwhile; ?>
<?php else : ?>
    <p>当てはまる情報はまだありません。</p>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
<!-- ページネーション -->
<p>＝＝＝＝＝＝＝＝＝＝＝＝＝</p>
<?php
if (function_exists("the_pagination")) the_pagination();
?>
<p>＝＝＝＝＝＝＝＝＝＝＝＝＝</p>

<? wp_reset_query(); ?>

<?php get_footer(); ?>
