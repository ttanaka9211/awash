<!-- 地酒単体記事を取得 -->
<?php
$taxquery_cat = array(
	'taxonomy' => 'jizake_cat',
	'terms' => $term, //選択されたタームを取得
	'field' => 'slug',
	'operator' => 'IN' // 演算子'IN','NOT IN','AND','EXISTS'(4.1.0以降),'NOT EXISTS'(4.1.0以降)が利用可能
);

$wp_query = new WP_Query(
	array(
		'post_type'     => 'jizake',
		'tax_query' => array(
			'relation' => 'AND',
			$taxquery_cat,
		),
		'orderby' =>  'meta_value',
		'order' => 'ASC',
		'meta_key' => 'item_productkana',

		'nopaging' => false,
		'posts_per_page'  => 12, //12件表示
		'paged' => get_query_var('paged'),
	)
);
?>


<?php get_header(); ?>

<!-- ページタイトル -->
<section>
	<div class="jl_h2">
		<img src="<?php echo esc_url(get_theme_file_uri('./images/template/jizake.jpg')); ?>" alt="地酒">
		<h2 class="typo all_pageshadow">地酒</h2>
	</div>
</section>
<!-- ページタイトル -->

<div class="jl_main">

	<!-- 検索エリア -->
	<section>
		<div class="jl_search">

			<!-- 虫眼鏡 -->
			<div id="accordion" class="jl_search_icon">
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
					<input type="hidden" name="post_type" value="jizake">
					<hr class="jl_line hide560">

					<!-- フリーワード検索と並べ替え -->
					<div class="jl_form1">

						<!-- <label for="s" class="assistive-text">＜キーワード検索＞</label><br> -->
						<p class="jl_search_text"><input type="text" name="s" id="s" value="<?php the_search_query(); ?>" class="jl_textbox" placeholder="キーワード検索"><br></p>
						<p class="jl_sort_name">並び替え:</p>
						<p class="jl_sort_dropdown">
							<select name="sort" class="jl_dropdown">
								<option value="kana_asc" selected>名前順</option>
								<option value="date_desc">新着順</option>
								<option value="comment_desc">口コミ数順</option>
								<!-- <option value="">いいね順</option> -->
							</select>
						</p>
					</div>
					<!-- フリーワードと並べ替えここまで -->

					<!-- カテゴリとタグのチェックボックス -->
					<div class="jl_form2">
						<div class="jl_check">

							<!-- カテゴリ -->
							<div class="jl_category_area">
								<?php
								$taxonomy_name = 'jizake_cat';
								$taxonomys = get_terms($taxonomy_name); ?>
								<input type="hidden" name="custompost_cat" value="<?php echo $taxonomy_name ?>">
								<?php if (!is_wp_error($taxonomys) && count($taxonomys)) :
									foreach ($taxonomys as $taxonomy) :
										$tax_posts = get_posts(array('post_type' => get_post_type(), 'taxonomy' => $taxonomy_name, 'term' => $taxonomy->slug));
										if ($tax_posts) :
								?>
											<p><label><input type="checkbox" name="post_cat[]" value="<?php echo $taxonomy->slug; ?>"><span class="jl_tag"><?php echo $taxonomy->name; ?></span></label></p>
								<?php
										endif;
									endforeach;
								endif;
								?>
							</div>
							<!-- カテゴリここまで -->

							<!-- タグ -->
							<div class="jl_tag_area">
								<?php
								$taxonomy_name = 'jizake_tag';
								$taxonomys = get_terms($taxonomy_name); ?>
								<input type="hidden" name="custompost_tag" value="<?php echo $taxonomy_name ?>">
								<?php if (!is_wp_error($taxonomys) && count($taxonomys)) :
									foreach ($taxonomys as $taxonomy) :
										$tax_posts = get_posts(array('post_type' => get_post_type(), 'taxonomy' => $taxonomy_name, 'term' => $taxonomy->slug));
										if ($tax_posts) :
								?>
											<p><label><input type="checkbox" name="post_tag[]" value="<?php echo $taxonomy->slug; ?>"><span class="jl_tag"><?php echo $taxonomy->name; ?></span></label></p>
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
					<div class="jl_search_button">
						<button type="submit" class="jl_button"><span>検　索</span></button>
						<button type="reset" class="jl_button"><span>CLEAR</span></button>
					</div>
					<!-- ボタンここまで -->

					<hr class="jl_line hide560">
				</form>
			</div>
			<!-- 検索フォームここまで -->

		</div>
	</section>
	<!-- 検索エリアここまで -->

	<!-- 画像のカテゴリメニュー -->
	<section>
		<div class="jl_menu">

			<div class="jl_category_link">
				<a href="<?php echo get_post_type_archive_link('jizake'); ?>">
					<img class="jl_menu_img" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/subete.jpg')); ?>" alt="すべて">
					<p class="ten">全て</p>
				</a>
			</div>

			<div class="jl_category_link">
				<a href="<?php echo get_term_link('nihonshu', 'jizake_cat'); ?>">
					<img class="jl_menu_img" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/nihonsyu.jpg')); ?>" alt="日本酒">
					<p class="ten">日本酒</p>
				</a>
			</div>

			<div class="jl_category_link">
				<a href="<?php echo get_term_link('shochu', 'jizake_cat'); ?>">
					<img class="jl_menu_img" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/syoutyu.jpg')); ?>" alt="焼酎">
					<p class="ten">焼酎</p>
				</a>
			</div>

			<div class="jl_category_link">
				<a href="<?php echo get_term_link('other', 'jizake_cat'); ?>">
					<img class="jl_menu_img" src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/sonota.jpg')); ?>" alt="その他">
					<p class="ten">その他</p>
				</a>
			</div>

		</div>
	</section>
	<!-- 画像のカテゴリメニューここまで -->

	<!-- 検索結果表示エリア -->
	<section>
		<div class="jl_result clearfix slideConts">
			<?php if ($wp_query->have_posts()) : ?>
				<?php while ($wp_query->have_posts()) : ?>
					<?php $wp_query->the_post(); ?>

					<!-- 商品個別エリア -->
					<div class="jl_product">

						<!-- 商品画像 -->
						<div class="jl_product_img">
							<a href="<?php echo get_post_permalink(); ?>">
								<?php $value = get_post_meta($post->ID, 'item_jizakeimg2', true); ?>
								<?php if (!empty($value)) : ?>
									<img class="jl_product_img" src="<?php echo wp_get_attachment_url($value); ?>" alt="商品名">
								<?php endif; ?>
							</a>
						</div>
						<!-- 商品説明 -->
						<div class="jl_product_description">
							<h3 class="jl_product_title typo"><a href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div>度数：<?php echo get_post_meta($post->ID, 'item_alcohol', true); ?>度</div>
							<!-- <div><?php echo get_post_meta($post->ID, 'item_jizakecatchcopy', true); ?></div> -->
							<div class="jl_product_icon_box">

								<!-- 主原料表示 -->
								<div class="jl_product_icon">
									<?php
									$mainmaterial =  get_post_meta($post->ID, 'item_mainmaterial', true);
									if ($mainmaterial == 1) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/rise_img01.png')); ?>" alt="米">
									<?php elseif ($mainmaterial == 2) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/wheat_img01.png')); ?>" alt="麦">
									<?php elseif ($mainmaterial == 3) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/narutokintoki_img01.png')); ?>" alt="鳴門金時">
									<?php elseif ($mainmaterial == 4) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/sweetpotato_img01.png')); ?>" alt="さつま芋">
									<?php elseif ($mainmaterial == 5) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/grape_img01.png')); ?>" alt="葡萄">
									<?php elseif ($mainmaterial == 6) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/hop_img01.png')); ?>" alt="ホップ">
									<?php elseif ($mainmaterial == 7) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/sudati_img01.png')); ?>" alt="すだち">
									<?php elseif ($mainmaterial == 8) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/citron_img01.png')); ?>" alt="ゆず">
									<?php elseif ($mainmaterial == 9) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/mountpeach_img01.png')); ?>" alt="やまもも">
									<?php elseif ($mainmaterial == 10) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('./images/contents/share/plum_img01.png')); ?>" alt="梅">
									<?php endif; ?>
								</div>
								<!-- 主原料表示 ここまで-->
								<!-- 甘辛度表示 -->
								<div class="jl_product_icon">
									<?php
									$spicy =  get_post_meta($post->ID, 'item_spicy', true);
									if ($spicy == 1) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('images/contents/jizake/s_verysweet_img01.svg')); ?>" alt="1">
									<?php elseif ($spicy == 2) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('images/contents/jizake/s_sweet_img01.svg')); ?>" alt="2">
									<?php elseif ($spicy == 3) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('images/contents/jizake/s_sands_img01.svg')); ?>" alt="3">
									<?php elseif ($spicy == 4) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('images/contents/jizake/s_spycy_img01.svg')); ?>" alt="4">
									<?php elseif ($spicy == 5) : ?>
										<img src="<?php echo esc_url(get_theme_file_uri('images/contents/jizake/s_veryspicy_img01.svg')); ?>" alt="5">
									<?php endif; ?>
								</div>
								<!-- 甘辛度表示 ここまで -->

							</div>
							<div class="jl_product_tag">
								<?php echo get_the_term_list($post->ID, 'jizake_cat', '<div class="jl_tag"><p>', '</p></div><div class="jl_tag"><p>', '</p></div>'); ?>
								<?php echo get_the_term_list($post->ID, 'jizake_tag', '<div class="jl_tag"><p>', '</p></div><div class="jl_tag"><p>', '</p></div>'); ?>
							</div>
						</div>
					</div>

				<?php endwhile; ?>
		</div>
	<?php else : ?>
		<p>当てはまる情報はまだありません。</p>
	<?php endif; ?>
	<?php if (function_exists("the_pagination")) : ?>
		<div class="jl_pagination pagination"><?php echo the_pagination(array('screen_reader_text' => ' ')); ?></div>
	<?php endif; ?>

	</section>
</div>
<!-- 検索結果表示エリアここまで -->
</div>
<?php get_footer(); ?>
