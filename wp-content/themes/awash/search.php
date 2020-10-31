        <?php get_header(); ?>
        <?php

        // 検索値受け取り
        $category_name = $_GET['category_name'];
        $s = $_GET['s'];
        $search_cat = $_GET['search_cat'];
        $search_tag = $_GET['search_tag'];
        $sort = $_GET['sort'];

        if (isset($search_cat)) :
            $category_name  = array_shift($search_cat);
        endif;

        if (isset($search_tag)) :
            $count_tag = count($search_tag);
            var_dump($count_tag);
            if ($count_tag > 1) :
                $args = array(
                    'post_type'     => 'post',
                    'category_name'  => $category_name,
                    'tag_slug__and' => array_shift($search_tag),
                    'orderby' =>  'date',
                    'order' => 'DESC',
                    'nopaging' => false,
                    'posts_per_page'  => 12, //12件表示
                    'paged' => get_query_var('paged'),
                );
            else :
                $args = array(
                    'post_type'     => 'post',
                    'category_name'  => $category_name,
                    'tag' => $search_tag,
                    'orderby' =>  'date',
                    'order' => 'DESC',
                    'nopaging' => false,
                    'posts_per_page'  => 12, //12件表示
                    'paged' => get_query_var('paged'),
                );
            endif;
        else :
            $args = array(
                'post_type'     => 'post',
                'category_name'  => $category_name,
                'orderby' =>  'date',
                'order' => 'DESC',
                'nopaging' => false,
                'posts_per_page'  => 12, //12件表示
                'paged' => get_query_var('paged'),
            );
        endif;

        $wp_query = new WP_Query($args);

        ?>

        <h2></h2>

        <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
            <!-- ページ情報送信用 -->
            <!--//タクソノミーをスラッグで指定-->
            <input type="hidden" name="category_name" value="topics">

            <label for="s" class="assistive-text">＜キーワード検索＞</label><br>
            <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="キーワードを入力…" /><br>
            ――――――――――――――――<br />
            並び替え<br>
            <select name="sort">
                <option value="date_desc" selected>▼並び替え:新着順</option>
                <option value="comment_desc">口コミ数順</option>
                <option value="">いいね順</option>
            </select><br>
            ――――――――――――――――<br />
            <div>＜カテゴリ項目＞</div>
            <!-- カテゴリ検索項目 -->
            <label><input type="checkbox" name="search_cat[]" value="events">イベント</label><br>
            <label><input type="checkbox" name="search_cat[]" value="review">呑みレポ</label><br>
            <label><input type="checkbox" name="search_cat[]" value="experience">体験記</label><br>

            ――――――――――――――――<br>
            ＜タグ項目＞<br>
            <label><input type="checkbox" name="search_tag[]" value="a_nihonshu">日本酒</label><br>
            <label><input type="checkbox" name="search_tag[]" value="a_shothu">焼酎</label><br>
            <input type="submit" value="検索" /><br>
            =================<br />







            <!-- 検索一覧 -->

            <?php if ($wp_query->have_posts()) : ?>
                <?php while ($wp_query->have_posts()) : ?>
                    <?php $wp_query->the_post(); ?>
                    <dl>
                        <dt><?php the_time('Y-n-j'); ?></dt>
                        <dd><a href="<?php the_permalink(); ?>">
                                <?php echo get_the_post_thumbnail(); ?><?php the_title(); ?>
                            </a>
                        </dd>
                    </dl>
                <?php endwhile; ?>
                <?php echo the_posts_pagination(); ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>当てはまる情報はまだありません。</p>
            <?PHP endif; ?>

            <?php get_footer(); ?>
