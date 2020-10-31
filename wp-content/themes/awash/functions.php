<?php

// コンテンツ幅をセット
if (!isset($content_width)) {
    $content_width = 723;
}

function custom_theme_setup()
{
    // head内にフィードリンクを出力
    add_theme_support('automatic-feed-links');

    // タイトルタグを動的に出力
    add_theme_support('title-tag');

    // ブロックエディター用のcssを有効化
    add_theme_support('wp-block-styles');

    // 埋め込みコンテンツをレスポンシブ対応に
    add_theme_support('responsive-embeds');

    // アイキャッチ画像を有効化
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(231, 177, true);

    // カスタムメニュー有効化、メニューの位置を設定
    register_nav_menus(
        array(
            'globalnav'     =>  'グローバルナビゲーション',
            'globalnav_sp'  =>  'sp版グローバルナビゲーション',
            'footer_menu'   =>  'フッターメニュー',
            'footer_menu1'  =>  'フッターメニュー1',
            'footer_menu2'  =>  'フッターメニュー2',
        )
    );
}
add_action('after_setup_theme', 'custom_theme_setup');

//=============================================================================================
//CSS・js　読み込み=============================================================================
//=============================================================================================
function myportfolio_scripts()
{
    // 共通CSS（ress.css）の読み込み 200420 add kitano
    wp_enqueue_style(
        'awash-ress.css',    // ハンドル名
        esc_url(get_theme_file_uri('css/ress.css')),   // ファイルのパス
        array(),                   // 依存関係
        '0.1',                     // バージョン指定
        'all'                      // メディアタイプ
    );

    // 直下style.css（テーマタイトル・リセット.css）の読み込み
    wp_enqueue_style(
        'awash-style.css',    // ハンドル名
        esc_url(get_theme_file_uri('style.css')),   // ファイルのパス
        array(),                   // 依存関係
        '0.1',                     // バージョン指定
        'all'                      // メディアタイプ
    );
    // wp_enqueue_style(
    //     'awash-style/style.css',    // ハンドル名
    //     esc_url(get_theme_file_uri('css/style.css')),   // ファイルのパス
    //     array('awash-style.css'),                   // 依存関係
    //     '0.1',                     // バージョン指定
    //     'all'                      // メディアタイプ
    // );

    // 共通js（script.js）読み込み
    wp_enqueue_script(
        'script.js',
        esc_url(get_theme_file_uri('js/script.js')),
        array('jquery'),
        '1.0',
        false
    );

    // 共通js（js/vender/jquery-3.4.1.min.js）読み込み
    wp_enqueue_script(
        'jquery-3.4.1.min.js',
        esc_url(get_theme_file_uri('js/vender/jquery-3.4.1.min.js')),
        array('jquery'),
        '1.0',
        false
    );


    //個別cssの読み込み準備
    wp_register_style('index-css', esc_url(get_theme_file_uri('css/index.css')), array(), '0.1', 'all');           //トップページ
    wp_register_style('jizakelist-css', esc_url(get_theme_file_uri('css/jizakelist.css')), array(), '0.1', 'all'); //地酒全体
    wp_register_style('jizake-css', esc_url(get_theme_file_uri('css/jizake.css')), array(), '0.1', 'all');         //地酒単体
    wp_register_style('kuralist-css', esc_url(get_theme_file_uri('css/kuralist.css')), array(), '0.1', 'all');     //酒造全体
    wp_register_style('kura-css', esc_url(get_theme_file_uri('css/kura.css')), array(), '0.1', 'all');             //酒造単体
    wp_register_style('topicslist-css', esc_url(get_theme_file_uri('css/topicslist.css')), array(), '0.1', 'all'); //特集全体
    wp_register_style('topics-css', esc_url(get_theme_file_uri('css/topics.css')), array(), '0.1', 'all');         //特集単体
    wp_register_style('aboutlist-css', esc_url(get_theme_file_uri('css/aboutlist.css')), array(), '0.1', 'all');   //お酒を知る全体
    wp_register_style('about-css', esc_url(get_theme_file_uri('css/about.css')), array(), '0.1', 'all');           //お酒を知る単体
    wp_register_style('contact-css', esc_url(get_theme_file_uri('css/contact.css')), array(), '0.1', 'all');       //お問い合わせ
    wp_register_style('rule-css', esc_url(get_theme_file_uri('css/rule.css')), array(), '0.1', 'all');              //利用規約
    wp_register_style('privacy-css', esc_url(get_theme_file_uri('css/privacy.css')), array(), '0.1', 'all');       //プライバシー
    wp_register_style('sitemap-css', esc_url(get_theme_file_uri('css/sitemap.css')), array(), '0.1', 'all');       //サイトマップ
    wp_register_style('404-css', esc_url(get_theme_file_uri('css/404.css')), array(), '0.1', 'all');               //404ページ

    // 個別js読み込み準備
    wp_register_script('index-js', esc_url(get_theme_file_uri('./js/index.js')), array('script.js'), '1.0', false); //トップページ
    wp_register_script('jizakelist-js', esc_url(get_theme_file_uri('./js/jizakelist.js')), array('script.js'), '1.0', false); //地酒全体
    wp_register_script('kuralist-js', esc_url(get_theme_file_uri('./js/kuralist.js')), array('script.js'), '1.0', false); //酒造全体
    wp_register_script('header-js', esc_url(get_theme_file_uri('./js/header.js')), array('script.js'), '1.0', false); //トップページ以外


    //各ページcss・js読み込み
    if (is_home() || is_front_page()) :                                                      //トップページ
        wp_enqueue_style('index-css');
        wp_enqueue_script('index-js');
    else :
        wp_enqueue_script('header-js');                                                      //トップページ以外のページ
    endif;

    if (is_post_type_archive('jizake') || is_tax('jizake_cat') || is_tax('jizake_tag')) :    //地酒全体(カテゴリ・タグ含む)
        wp_enqueue_style('jizakelist-css');
        wp_enqueue_script('jizakelist-js');
    elseif (is_singular('jizake')) :                                                         //地酒単体
        wp_enqueue_style('jizake-css');
    elseif (is_post_type_archive('kura') || is_tax('kura_cat') || is_tax('kura_tag')) :      //酒造全体(カテゴリ・タグ含む)
        wp_enqueue_style('kuralist-css');
        wp_enqueue_script('kuralist-js');
    elseif (is_singular('kura')) :                                                           //酒造単体
        wp_enqueue_style('kura-css');
    elseif (is_page('topics') || is_archive('topics') & is_tag() & !in_category('about') || in_category('topics') & !is_single()) :  //特集全体
        wp_enqueue_style('topicslist-css');
    elseif (is_archive('about') || in_category('about') & !is_single()) :                   //お酒を知る全体
        wp_enqueue_style('aboutlist-css');
    elseif (in_category('topics')) :                                                         //特集単体
        wp_enqueue_style('topics-css');
    elseif (in_category('about')) :                                                          //お酒を知る単体
        wp_enqueue_style('about-css');
    elseif (is_page('contact')) :                                                            //お問い合わせ
        wp_enqueue_style('contact-css');
    elseif (is_page('rule')) :                                                               //利用規約
        wp_enqueue_style('rule-css');
    elseif (is_page('privacypolicy')) :                                                      //プライバシーポリシー
        wp_enqueue_style('privacy-css');
    elseif (is_page('sitemap')) :                                                            //サイトマップ
        wp_enqueue_style('sitemap-css');
    elseif (is_404()) :                                                                      //404ページ
        wp_enqueue_style('404-css');
    endif;
}
add_action('wp_enqueue_scripts', 'myportfolio_scripts');

//=============================================================================================
// ウィジェットエリアの登録======================================================================
//=============================================================================================

function custom_widget_register()
{
    register_sidebar(array(
        'name'            =>  'サイドバーウィジェットエリア',
        'id'              =>  'sidebar-widget',
        'description'     =>  'ブログページのサイドバーに表示されます。',
        'before_widget'   =>  '<div id="%1$s" class="c-widget %2$s">',
        'after_widget'    =>  '</div>',
        'before_title'    =>  '<h2 class="c-widget__title">',
        'after_title'     =>  '</h2>'
    ));
}
add_action('widgets_init', 'custom_widget_register');





//=============================================================================================
// 地酒カスタム投稿=============================================================================
//=============================================================================================

// ============================================================================================
// 投稿タイプの登録

function jizake_post_type()
{
    //
    register_post_type(
        'jizake',
        array(
            'label'               => '地酒カスタム投稿', //表示名
            'public'              => true,       //公開状態
            'exclude_from_search' => false,      //検索対象に含めるか
            'show_ui'             => true,       //管理画面に表示するか
            'show_in_menu'        => true,       //管理画面のメニューに表示するか
            'menu_position'       => 5,          //管理メニューの表示位置を指定
            'hierarchical'        => true,       //階層構造を持たせるか
            'has_archive'         => true,       //この投稿タイプのアーカイブを作成するか
            'show_in_rest'        => true,       //ブロックエディターを有効にする
            'supports'            => array(
                'title',
                'editor',
                'thumbnail',                     //アイキャッチ画像
                'excerpt',
                'custom - fields',
                'comments',                     //コメント機能
            ),
        )
    );

    // カスタムタクソノミー（カテゴリー）の追加
    $args = array(
        'label'             => '地酒カテゴリー',
        'public'            => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical'      => true,
        'query_var'         => true,
        'show_in_rest'      => true
    );
    register_taxonomy('jizake_cat', 'jizake', $args);

    // カスタムタクソノミー（タグ）の追加
    $args = array(
        'label'             => '地酒タグ',
        'public'            => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'show_ui'           => true,
        'hierarchical'      => false,
        'query_var'         => true,
        'show_in_rest'      => true
    );
    register_taxonomy('jizake_tag', 'jizake', $args);
}
add_action('init', 'jizake_post_type', 1);



// ============================================================================================
// カスタム投稿タイプのパーマリンク設定（地酒）

add_filter('post_type_link', 'my_post_type_link', 1, 2);
function my_post_type_link($link, $post)
{
    //個々のカスタム投稿のパーマリンク設定を、数字ベースに変更する。
    if ('jizake' === $post->post_type) {
        return home_url('/archives/jizake/' . $post->ID);
    } else {
        return $link;
    }
}
// 地酒用
add_filter('rewrite_rules_array', 'my_rewrite_rules_array');
function my_rewrite_rules_array($rules)
{
    $new_rules = array(
        'archives/jizake/([0-9]+)/?$' => 'index.php?post_type=jizake&p=$matches[1]',
    );
    return $new_rules + $rules;
}



// ============================================================================================
// カスタムフィールドの追加（地酒）

function add_jizake_custom_field()
{
    add_meta_box('custom-item_productname', '製品名(必須)', 'create_item_productname', 'jizake', 'normal');
    add_meta_box('custom-item_productkana', 'ふりがな(必須)', 'create_item_productkana', 'jizake', 'normal');
    add_meta_box('custom-item_jizakecatchcopy', 'キャッチコピー', 'create_item_jizakecatchcopy', 'jizake', 'normal');
    add_meta_box('custom-item_amount', '内容量/価格', 'create_item_amount', 'jizake', 'normal');
    add_meta_box('custom-item_alcohol', 'アルコール度数(必須)', 'create_item_alcohol', 'jizake', 'normal');
    add_meta_box('custom-item_mainmaterial', '主原料アイコン', 'create_item_mainmaterial', 'jizake', 'normal');
    add_meta_box('custom-item_body', 'ボディ(ワインのみ)', 'create_item_body', 'jizake', 'normal');
    add_meta_box('custom-item_polish', '精米歩合（日本酒のみ）', 'create_item_polish', 'jizake', 'normal');
    add_meta_box('custom-item_spicy', '甘辛度アイコン', 'create_item_spicy', 'jizake', 'normal');
    add_meta_box('custom-item_material', '原料', 'create_item_material', 'jizake', 'normal');
    add_meta_box('custom-item_kuraname', '酒造情報(必須)', 'create_item_kuramoto', 'jizake', 'normal');

    add_meta_box('custom-item_jizakearticle1', '記事1', 'create_item_jizakearticle1', 'jizake', 'normal');
    add_meta_box('custom-item_jizakearticle2', '記事2', 'create_item_jizakearticle2', 'jizake', 'normal');
    add_meta_box('custom-item_jizakearticle3', '記事3', 'create_item_jizakearticle3', 'jizake', 'normal');
    add_meta_box('custom-item_jizakearticle4', '記事4', 'create_item_jizakearticle4', 'jizake', 'normal');
    add_meta_box('custom-item_jizakearticle5', '記事5', 'create_item_jizakearticle5', 'jizake', 'normal');
    add_meta_box('custom-item_jizakeimg1', '記事画像1', 'create_item_jizakeimg1', 'jizake', 'normal');
    add_meta_box('custom-item_jizakeimg2', '記事画像2(製品画像)', 'create_item_jizakeimg2', 'jizake', 'normal');
    add_meta_box('custom-item_jizakeimg3', '記事画像3', 'create_item_jizakeimg3', 'jizake', 'normal');
    add_meta_box('custom-item_jizakeimg4', '記事画像4', 'create_item_jizakeimg4', 'jizake', 'normal');
    add_meta_box('custom-item_jizakeimg5', '記事画像5', 'create_item_jizakeimg5', 'jizake', 'normal');
    add_meta_box('custom-jizake_spare1', '予備項目1', 'create_jizake_spare1', 'jizake', 'normal');
    add_meta_box('custom-jizake_spare2', '予備項目2', 'create_jizake_spare2', 'jizake', 'normal');
    add_meta_box('custom-jizake_spare3', '予備項目3', 'create_jizake_spare3', 'jizake', 'normal');
    //remove_meta_box('slugdiv','jizake','normal'); //元々あったスラッグの欄が邪魔なので削除。-> 一回実行したらコメントアウト。
}
add_action('admin_menu', 'add_jizake_custom_field');




// ============================================================================================
// カスタムフィールド  投稿フォームのHTMLを出力する関数（地酒）

function create_item_productname()          //製品名
{
    global $post;
    $item_productname = get_post_meta($post->ID, 'item_productname', true);
    echo '<input name="item_productname" value="' . $item_productname . '" required> ※必須';
}
function create_item_productkana()          //ふりがな
{
    global $post;
    $item_productkana = get_post_meta($post->ID, 'item_productkana', true);
    echo '<input name="item_productkana" value="' . $item_productkana . '" required> ※必須';
}
function create_item_jizakecatchcopy()      //キャッチコピー
{
    global $post;
    $item_jizakecatchcopy = get_post_meta($post->ID, 'item_jizakecatchcopy', true);
    echo '<input name="item_jizakecatchcopy" value="' . $item_jizakecatchcopy . '" >';
}
function create_item_amount()               //内容量/価格
{
    global $post;
    $item_amount1 = get_post_meta($post->ID, 'item_amount1', true);
    $item_amount2 = get_post_meta($post->ID, 'item_amount2', true);
    $item_amount3 = get_post_meta($post->ID, 'item_amount3', true);
    $item_amount4 = get_post_meta($post->ID, 'item_amount4', true);
    $item_price1 = get_post_meta($post->ID, 'item_price1', true);
    $item_price2 = get_post_meta($post->ID, 'item_price2', true);
    $item_price3 = get_post_meta($post->ID, 'item_price3', true);
    $item_price4 = get_post_meta($post->ID, 'item_price4', true);
    echo '<input name="item_amount1" value="' . $item_amount1 . '" required>' . 'ml / ';
    echo '<input name="item_price1" value="' . $item_price1 . '" required>' . '円（税別）※必須<br> ';
    echo '<input name="item_amount2" value="' . $item_amount2 . '" >' . 'ml / ';
    echo '<input name="item_price2" value="' . $item_price2 . '" >' . '円（税別）<br> ';
    echo '<input name="item_amount3" value="' . $item_amount3 . '" >' . 'ml / ';
    echo '<input name="item_price3" value="' . $item_price3 . '" >' . '円（税別）<br> ';
    echo '<input name="item_amount4" value="' . $item_amount4 . '" >' . 'ml / ';
    echo '<input name="item_price4" value="' . $item_price4 . '" >' . '円（税別）<br> ';
}
function create_item_alcohol()              //アルコール度数
{
    global $post;
    $item_alcohol = get_post_meta($post->ID, 'item_alcohol', true);
    echo '<input name="item_alcohol" value="' . $item_alcohol . '" >度 ※必須';
}
function create_item_mainmaterial()         //主原料アイコン
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_mainmaterial', true);
    echo '米<input type="radio" name="item_mainmaterial" value="1" ';
    if ($get_value == 1) : echo 'checked="checked"';
    endif;
    echo '> 麦<input type="radio" name="item_mainmaterial" value="2" ';
    if ($get_value == 2) : echo 'checked="checked"';
    endif;
    echo '> 鳴門金時<input type="radio" name="item_mainmaterial" value="3" ';
    if ($get_value == 3) : echo 'checked="checked"';
    endif;
    echo '> さつま芋<input type="radio" name="item_mainmaterial" value="4" ';
    if ($get_value == 4) : echo 'checked="checked"';
    endif;
    echo '> 葡萄<input type="radio" name="item_mainmaterial" value="5" ';
    if ($get_value == 5) : echo 'checked="checked"';
    endif;
    echo '> ホップ<input type="radio" name="item_mainmaterial" value="6" ';
    if ($get_value == 6) : echo 'checked="checked"';
    endif;
    echo '> すだち<input type="radio" name="item_mainmaterial" value="7" ';
    if ($get_value == 7) : echo 'checked="checked"';
    endif;
    echo '> ゆず<input type="radio" name="item_mainmaterial" value="8" ';
    if ($get_value == 8) : echo 'checked="checked"';
    endif;
    echo '> やまもも<input type="radio" name="item_mainmaterial" value="9" ';
    if ($get_value == 9) : echo 'checked="checked"';
    endif;
    echo '> 梅<input type="radio" name="item_mainmaterial" value="10" ';
    if ($get_value == 10) : echo 'checked="checked"';
    endif;
    echo '>';
}
function create_item_body()                 //ボディ（ワインのみ）
{
    global $post;
    $item_body = get_post_meta($post->ID, 'item_body', true);
    echo '<input name="item_body" value="' . $item_body . '" >';
}
function create_item_polish()               //精米歩合
{
    global $post;
    $item_polish = get_post_meta($post->ID, 'item_polish', true);
    echo '<input name="item_polish" value="' . $item_polish . '" >';
}
function create_item_spicy()                //甘辛度アイコン
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_spicy', true);
    echo '甘<input type="radio" name="item_spicy" value="1" ';
    if ($get_value == 1) : echo 'checked="checked"';
    endif;
    echo '><input type="radio" name="item_spicy" value="2" ';
    if ($get_value == 2) : echo 'checked="checked"';
    endif;
    echo '><input type="radio" name="item_spicy" value="3" ';
    if ($get_value == 3) : echo 'checked="checked"';
    endif;
    echo '><input type="radio" name="item_spicy" value="4"';
    if ($get_value == 4) : echo 'checked="checked"';
    endif;
    echo '><input type="radio" name="item_spicy" value="5"';
    if ($get_value == 5) : echo 'checked="checked"';
    endif;
    echo '>辛';
}
function create_item_material()             //原料
{
    global $post;
    $item_material = get_post_meta($post->ID, 'item_material', true);
    echo '<input name="item_material" value="' . $item_material . '" >';
}
function create_item_kuramoto()             //酒造情報
{
    global $post;
    $item_kuraname = get_post_meta($post->ID, 'item_kuraname', true);
    $item_kurallink = get_post_meta($post->ID, 'item_kurallink', true);
    echo '酒造名<input name="item_kuraname" value="' . $item_kuraname . '" required>' . '※必須<br> ';
    echo '酒造内部リンク<input name="item_kurallink" value="' . $item_kurallink . '">';
}
function create_item_jizakearticle1()       //地酒記事1
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_jizakearticle1', true);
    // echo '<input type="text" name="exhibition_comment" value="' . $get_value . '" required size="100">';
    echo '<textarea name="item_jizakearticle1" rows="4" cols="100">' . $get_value . '</textarea>';
}
function create_item_jizakearticle2()       //地酒記事2
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_jizakearticle2', true);
    echo '<textarea name="item_jizakearticle2" rows="4" cols="100">' . $get_value . '</textarea>';
}
function create_item_jizakearticle3()       //地酒記事3
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_jizakearticle3', true);
    echo '<textarea name="item_jizakearticle3" rows="4" cols="100">' . $get_value . '</textarea>';
}
function create_item_jizakearticle4()       //地酒記事4
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_jizakearticle4', true);
    echo '<textarea name="item_jizakearticle4" rows="4" cols="100">' . $get_value . '</textarea>';
}
function create_item_jizakearticle5()       //地酒記事5
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_jizakearticle5', true);
    echo '<textarea name="item_jizakearticle5" rows="4" cols="100">' . $get_value . '</textarea>';
}
function create_item_jizakeimg1()           //記事画像１
{
    global $post;
    $item_jizakeimg1 = get_post_meta($post->ID, 'item_jizakeimg1', true);
    echo '画像： <input type="file" name="item_jizakeimg1" accept="image/*" /><br>';
    if (isset($item_jizakeimg1) && strlen($item_jizakeimg1) > 0) {
        //item_jizakeimg1キーのpostmeta情報がある場合は、画像を表示
        //$item_jizakeimg1には、後述するattach_idが格納されているので、wp_get_attachment_url関数にそのattach_idを渡して画像のURLを取得する
        echo '<img style="width: 200px;display: block;margin: 1em;" src="' . wp_get_attachment_url($item_jizakeimg1) . '">';
    }
}
function create_item_jizakeimg2()           //記事画像2
{
    global $post;
    $item_jizakeimg2 = get_post_meta($post->ID, 'item_jizakeimg2', true);
    // echo '名前： <input type="text" name="hoge_name" value="' . $hoge_name . '" /><br>';
    echo '画像： <input type="file" name="item_jizakeimg2" accept="image/*" /><br>';
    if (isset($item_jizakeimg2) && strlen($item_jizakeimg2) > 0) {
        echo '<img style="width: 200px;display: block;margin: 1em;" src="' . wp_get_attachment_url($item_jizakeimg2) . '">';
    }
}
function create_item_jizakeimg3()           //記事画像3
{
    global $post;
    $item_jizakeimg3 = get_post_meta($post->ID, 'item_jizakeimg3', true);
    // echo '名前： <input type="text" name="hoge_name" value="' . $hoge_name . '" /><br>';
    echo '画像： <input type="file" name="item_jizakeimg3" accept="image/*" /><br>';
    if (isset($item_jizakeimg3) && strlen($item_jizakeimg3) > 0) {
        echo '<img style="width: 200px;display: block;margin: 1em;" src="' . wp_get_attachment_url($item_jizakeimg3) . '">';
    }
}
function create_item_jizakeimg4()           //記事画像4
{
    global $post;
    $item_jizakeimg4 = get_post_meta($post->ID, 'item_jizakeimg4', true);
    // echo '名前： <input type="text" name="hoge_name" value="' . $hoge_name . '" /><br>';
    echo '画像： <input type="file" name="item_jizakeimg4" accept="image/*" /><br>';
    if (isset($item_jizakeimg4) && strlen($item_jizakeimg4) > 0) {
        echo '<img style="width: 200px;display: block;margin: 1em;" src="' . wp_get_attachment_url($item_jizakeimg4) . '">';
    }
}
function create_item_jizakeimg5()           //記事画像5
{
    global $post;
    $item_jizakeimg5 = get_post_meta($post->ID, 'item_jizakeimg5', true);
    // echo '名前： <input type="text" name="hoge_name" value="' . $hoge_name . '" /><br>';
    echo '画像： <input type="file" name="item_jizakeimg5" accept="image/*" /><br>';
    if (isset($item_jizakeimg5) && strlen($item_jizakeimg5) > 0) {
        echo '<img style="width: 200px;display: block;margin: 1em;" src="' . wp_get_attachment_url($item_jizakeimg5) . '">';
    }
}

function create_jizake_spare1()             //予備項目1
{
    global $post;
    $jizake_spare1_title = get_post_meta($post->ID, 'jizake_spare1_title', true);
    $jizake_spare1_value = get_post_meta($post->ID, 'jizake_spare1_value', true);
    echo '項目名', '<input name="jizake_spare1_title" value="' . $jizake_spare1_title . '" >  :  <input name="jizake_spare1_value" value="' . $jizake_spare1_value . '" >';
}
function create_jizake_spare2()             //予備項目2
{
    global $post;
    $jizake_spare_title = get_post_meta($post->ID, 'jizake_spare2_title', true);
    $jizake_spare_value = get_post_meta($post->ID, 'jizake_spare2_value', true);
    echo '項目名', '<input name="jizake_spare2_title" value="' . $jizake_spare_title . '" >  :  <input name="jizake_spare2_value" value="' . $jizake_spare_value . '" >';
}
function create_jizake_spare3()             //予備項目3
{
    global $post;
    $jizake_spare_title = get_post_meta($post->ID, 'jizake_spare3_title', true);
    $jizake_spare_value = get_post_meta($post->ID, 'jizake_spare3_value', true);
    echo '項目名', '<input name="jizake_spare3_title" value="' . $jizake_spare_title . '" >  :  <input name="jizake_spare3_value" value="' . $jizake_spare_value . '" >';
}



// ============================================================================================
// カスタムフィールドの値を保存する関数（地酒）
function save_custom_fields_jizake($post_id)
{
    //item_productnameの保存
    if (!empty($_POST['item_productname'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_productname', $_POST['item_productname']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_productname'); //値を削除
    }
    //item_productkanaの保存
    if (!empty($_POST['item_productkana'])) {
        update_post_meta($post_id, 'item_productkana', $_POST['item_productkana']);
    } else {
        delete_post_meta($post_id, 'item_productkana');
    }
    //item_jizakecatchcopyの保存
    if (!empty($_POST['item_jizakecatchcopy'])) {
        update_post_meta($post_id, 'item_jizakecatchcopy', $_POST['item_jizakecatchcopy']);
    } else {
        delete_post_meta($post_id, 'item_jizakecatchcopy');
    }
    //内容量(item_amount 1-5）の保存
    if (!empty($_POST['item_amount1'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_amount1', $_POST['item_amount1']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_amount1'); //値を削除
    }
    if (!empty($_POST['item_amount2'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_amount2', $_POST['item_amount2']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_amount2'); //値を削除
    }
    if (!empty($_POST['item_amount3'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_amount3', $_POST['item_amount3']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_amount3'); //値を削除
    }
    if (!empty($_POST['item_amount4'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_amount4', $_POST['item_amount4']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_amount4'); //値を削除
    }
    // 価格(item_price 1-5)の保存
    if (!empty($_POST['item_price1'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_price1', $_POST['item_price1']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_price1'); //値を削除
    }
    if (!empty($_POST['item_price2'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_price2', $_POST['item_price2']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_price2'); //値を削除
    }
    if (!empty($_POST['item_price3'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_price3', $_POST['item_price3']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_price3'); //値を削除
    }
    if (!empty($_POST['item_price4'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_price4', $_POST['item_price4']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_price4'); //値を削除
    }
    // item_alcoholの保存
    if (!empty($_POST['item_alcohol'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_alcohol', $_POST['item_alcohol']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_alcohol'); //値を削除
    }
    // item_mainmaterialの保存
    if (!empty($_POST['item_mainmaterial'])) {
        update_post_meta($post_id, 'item_mainmaterial', $_POST['item_mainmaterial']);
    } else {
        delete_post_meta($post_id, 'item_mainmaterial');
    }
    // ボディ(item_body)の保存
    if (!empty($_POST['item_body'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_body', $_POST['item_body']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_body'); //値を削除
    }
    // 精米歩合(item_polish)の保存
    if (!empty($_POST['item_polish'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_polish', $_POST['item_polish']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_polish'); //値を削除
    }
    // 甘辛度(item_spicy)の保存
    if (!empty($_POST['item_spicy'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_spicy', $_POST['item_spicy']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_spicy'); //値を削除
    }
    // 原料(item_material)の保存
    if (!empty($_POST['item_material'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_material', $_POST['item_material']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_material'); //値を削除
    }
    // 酒造情報の保存
    if (!empty($_POST['item_kuraname'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_kuraname', $_POST['item_kuraname']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_kuraname'); //値を削除
    }
    if (!empty($_POST['item_kurallink'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_kurallink', $_POST['item_kurallink']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_kurallink'); //値を削除
    }
    // item_jizakearticle1の保存
    if (!empty($_POST['item_jizakearticle1'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_jizakearticle1', $_POST['item_jizakearticle1']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_jizakearticle1'); //値を削除
    }
    // item_jizakearticle2の保存
    if (!empty($_POST['item_jizakearticle2'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_jizakearticle2', $_POST['item_jizakearticle2']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_jizakearticle2'); //値を削除
    }
    // item_jizakearticle3の保存
    if (!empty($_POST['item_jizakearticle3'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_jizakearticle3', $_POST['item_jizakearticle3']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_jizakearticle3'); //値を削除
    }
    // item_jizakearticle4の保存
    if (!empty($_POST['item_jizakearticle4'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_jizakearticle4', $_POST['item_jizakearticle4']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_jizakearticle4'); //値を削除
    }
    // item_jizakearticle5の保存
    if (!empty($_POST['item_jizakearticle5'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_jizakearticle5', $_POST['item_jizakearticle5']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_jizakearticle5'); //値を削除
    }
    // item_jizakeimg1の保存
    if (isset($_FILES['item_jizakeimg1']) && $_FILES["item_jizakeimg1"]["size"] !== 0) {
        $file_name = basename($_FILES['item_jizakeimg1']['name']);
        $file_name = trim($file_name);
        $file_name = str_replace(" ", "-", $file_name);
        $wp_upload_dir = wp_upload_dir(); //現在のuploadディクレトリのパスとURLを入れた配列
        $upload_file = $_FILES['item_jizakeimg1']['tmp_name'];
        $upload_path = $wp_upload_dir['path'] . '/' . $file_name; //uploadsディレクトリ以下などに配置する場合は$wp_upload_dir['basedir']を利用する
        //画像ファイルをuploadディクレトリに移動させる
        move_uploaded_file($upload_file, $upload_path);
        $file_type = $_FILES['item_jizakeimg1']['type'];
        //正規表現で拡張子なしのスラッグ名を生成
        $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));
        if (file_exists($upload_path)) {
            //保存に成功してファイルが存在する場合は、wp_postsテーブルなどに情報を追加
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename($file_name),
                'post_mime_type' => $file_type,
                'post_title' => $slug_name,
                'post_content' => '',
                'post_status' => 'inherit'
            );
            //添付ファイルを追加
            $attach_id = wp_insert_attachment($attachment, $upload_path, $post_id);
            if (!function_exists('wp_generate_attachment_metadata')) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            }
            //添付ファイルのメタデータを生成し、wp_postsテーブルに情報を保存
            $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
            wp_update_attachment_metadata($attach_id, $attach_data);
            //wp_postmetaテーブルに画像のattachment_id(wp_postsテーブルのレコードのID)を保存
            update_post_meta($post_id, 'item_jizakeimg1', $attach_id);
        } else {
            //保存失敗
            echo '画像保存に失敗しました';
            exit;
        }
    }
    // item_jizakeimg2の保存
    if (isset($_FILES['item_jizakeimg2']) && $_FILES["item_jizakeimg2"]["size"] !== 0) {
        $file_name = basename($_FILES['item_jizakeimg2']['name']);
        $file_name = trim($file_name);
        $file_name = str_replace(" ", "-", $file_name);
        $wp_upload_dir = wp_upload_dir();
        $upload_file = $_FILES['item_jizakeimg2']['tmp_name'];
        $upload_path = $wp_upload_dir['path'] . '/' . $file_name;
        move_uploaded_file($upload_file, $upload_path);
        $file_type = $_FILES['item_jizakeimg2']['type'];
        $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));
        if (file_exists($upload_path)) {
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename($file_name),
                'post_mime_type' => $file_type,
                'post_title' => $slug_name,
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment($attachment, $upload_path, $post_id);
            if (!function_exists('wp_generate_attachment_metadata')) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            }
            $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
            wp_update_attachment_metadata($attach_id, $attach_data);
            update_post_meta($post_id, 'item_jizakeimg2', $attach_id);
        } else {
            echo '画像保存に失敗しました';
            exit;
        }
    }
    // item_jizakeimg3の保存
    if (isset($_FILES['item_jizakeimg3']) && $_FILES["item_jizakeimg3"]["size"] !== 0) {
        $file_name = basename($_FILES['item_jizakeimg3']['name']);
        $file_name = trim($file_name);
        $file_name = str_replace(" ", "-", $file_name);
        $wp_upload_dir = wp_upload_dir();
        $upload_file = $_FILES['item_jizakeimg3']['tmp_name'];
        $upload_path = $wp_upload_dir['path'] . '/' . $file_name;
        move_uploaded_file($upload_file, $upload_path);
        $file_type = $_FILES['item_jizakeimg3']['type'];
        $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));
        if (file_exists($upload_path)) {
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename($file_name),
                'post_mime_type' => $file_type,
                'post_title' => $slug_name,
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment($attachment, $upload_path, $post_id);
            if (!function_exists('wp_generate_attachment_metadata')) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            }
            $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
            wp_update_attachment_metadata($attach_id, $attach_data);
            update_post_meta($post_id, 'item_jizakeimg3', $attach_id);
        } else {
            echo '画像保存に失敗しました';
            exit;
        }
    }
    // item_jizakeimg4の保存
    if (isset($_FILES['item_jizakeimg4']) && $_FILES["item_jizakeimg4"]["size"] !== 0) {
        $file_name = basename($_FILES['item_jizakeimg4']['name']);
        $file_name = trim($file_name);
        $file_name = str_replace(" ", "-", $file_name);

        $wp_upload_dir = wp_upload_dir();
        $upload_file = $_FILES['item_jizakeimg4']['tmp_name'];
        $upload_path = $wp_upload_dir['path'] . '/' . $file_name;
        move_uploaded_file($upload_file, $upload_path);
        $file_type = $_FILES['item_jizakeimg4']['type'];
        $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));
        if (file_exists($upload_path)) {
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename($file_name),
                'post_mime_type' => $file_type,
                'post_title' => $slug_name,
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment($attachment, $upload_path, $post_id);
            if (!function_exists('wp_generate_attachment_metadata')) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            }
            $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
            wp_update_attachment_metadata($attach_id, $attach_data);
            update_post_meta($post_id, 'item_jizakeimg4', $attach_id);
        } else {
            echo '画像保存に失敗しました';
            exit;
        }
    }

    // item_jizakeimg5の保存
    if (isset($_FILES['item_jizakeimg5']) && $_FILES["item_jizakeimg5"]["size"] !== 0) {
        $file_name = basename($_FILES['item_jizakeimg5']['name']);
        $file_name = trim($file_name);
        $file_name = str_replace(" ", "-", $file_name);

        $wp_upload_dir = wp_upload_dir();
        $upload_file = $_FILES['item_jizakeimg5']['tmp_name'];
        $upload_path = $wp_upload_dir['path'] . '/' . $file_name;
        move_uploaded_file($upload_file, $upload_path);
        $file_type = $_FILES['item_jizakeimg5']['type'];
        $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));
        if (file_exists($upload_path)) {
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename($file_name),
                'post_mime_type' => $file_type,
                'post_title' => $slug_name,
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment($attachment, $upload_path, $post_id);
            if (!function_exists('wp_generate_attachment_metadata')) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            }
            $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
            wp_update_attachment_metadata($attach_id, $attach_data);
            update_post_meta($post_id, 'item_jizakeimg5', $attach_id);
        } else {
            echo '画像保存に失敗しました';
            exit;
        }
    }
    // jizake_spare1_titleの保存
    if (!empty($_POST['jizake_spare1_title'])) { //題名が入力されている場合
        update_post_meta($post_id, 'jizake_spare1_title', $_POST['jizake_spare1_title']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'jizake_spare1_title'); //値を削除
    }
    // jizake_spare2_titleの保存
    if (!empty($_POST['jizake_spare2_title'])) { //題名が入力されている場合
        update_post_meta($post_id, 'jizake_spare2_title', $_POST['jizake_spare2_title']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'jizake_spare2_title'); //値を削除
    }
    // jizake_spare3_titleの保存
    if (!empty($_POST['jizake_spare3_title'])) { //題名が入力されている場合
        update_post_meta($post_id, 'jizake_spare3_title', $_POST['jizake_spare3_title']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'jizake_spare3_title'); //値を削除
    }
    // jizake_spare1_valueの保存
    if (!empty($_POST['jizake_spare1_value'])) { //題名が入力されている場合
        update_post_meta($post_id, 'jizake_spare1_value', $_POST['jizake_spare1_value']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'jizake_spare1_title'); //値を削除
    }
    // jizake_spare2_titleの保存
    if (!empty($_POST['jizake_spare2_value'])) { //題名が入力されている場合
        update_post_meta($post_id, 'jizake_spare2_value', $_POST['jizake_spare2_value']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'jizake_spare2_title'); //値を削除
    }
    // jizake_spare3_titleの保存
    if (!empty($_POST['jizake_spare3_value'])) { //題名が入力されている場合
        update_post_meta($post_id, 'jizake_spare3_value', $_POST['jizake_spare3_value']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'jizake_spare3_value'); //値を削除
    }
}
add_action('save_post', 'save_custom_fields_jizake');






//=============================================================================================
// 酒造カスタム投稿=============================================================================
//=============================================================================================

// ============================================================================================
// 投稿タイプの登録

function kura_post_type()
{
    register_post_type(
        'kura',
        array(
            'label' => '酒造カスタム投稿', //表示名
            'public'        => true, //公開状態
            'exclude_from_search' => false, //検索対象に含めるか
            'show_ui' => true, //管理画面に表示するか
            'show_in_menu' => true, //管理画面のメニューに表示するか
            'menu_position' => 6, //管理メニューの表示位置を指定
            'hierarchical' => true, //階層構造を持たせるか
            'has_archive'   => true, //この投稿タイプのアーカイブを作成するか
            'show_in_rest'   => true, //ブロックエディターを有効にする
            'supports' => array(
                'title',
                'editor',
                'thumbnail', //アイキャッチ画像
                'excerpt',
                'custom - fields',
                'comments', //アイキャッチ画像
            ), //編集画面で使用するフィールド
        )
    );

    // カスタムタクソノミー（カテゴリー）の追加
    $args = array(
        'label' => '酒造カテゴリー',
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'query_var' => true,
        'show_in_rest' => true
    );
    register_taxonomy('kura_cat', 'kura', $args);

    // カスタムタクソノミー（タグ）の追加
    $args = array(
        'label' => '酒造タグ',
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'show_ui' => true,
        'hierarchical' => false,
        'query_var' => true,
        'show_in_rest' => true
    );
    register_taxonomy('kura_tag', 'kura', $args);
}
add_action('init', 'kura_post_type', 1);


// ============================================================================================
// カスタム投稿タイプのパーマリンク設定（酒造）

function my_post_type_link2($link, $post)
{
    //個々のカスタム投稿のパーマリンク設定を、数字ベースに変更する。
    if ('kura' === $post->post_type) {
        return home_url('/archives/kura/' . $post->ID);
    } else {
        return $link;
    }
}
add_filter('rewrite_rules_array', 'my_rewrite_rules_array2');
function my_rewrite_rules_array2($rules)
{
    $new_rules = array(
        'archives/kura/([0-9]+)/?$' => 'index.php?post_type=kura&p=$matches[1]',
    );
    return $new_rules + $rules;
}
add_filter('post_type_link', 'my_post_type_link2', 1, 2);


// ============================================================================================
// カスタムフィールドの追加（酒造）

function add_kura_custom_field()
{
    add_meta_box('custom-item_kuramotoname', '酒造名(必須)', 'create_item_kuramotoname', 'kura', 'normal');
    add_meta_box('custom-item_kuramotokana', '酒造名ふりがな(必須)', 'create_item_kuramotokana', 'kura', 'normal');
    add_meta_box('custom-item_address', '住所', 'create_item_address', 'kura', 'normal');
    add_meta_box('custom-item_tel', 'TEL/FAX', 'create_item_tel', 'kura', 'normal');
    add_meta_box('custom-item_mail', 'メールアドレス', 'create_item_mail', 'kura', 'normal');
    add_meta_box('custom-item_open', '営業時間', 'create_item_open', 'kura', 'normal');
    add_meta_box('custom-item_holiday', '定休日', 'create_item_holiday', 'kura', 'normal');
    add_meta_box('custom-item_externallink', 'ホームページURL', 'create_item_externallink', 'kura', 'normal');
    add_meta_box('custom-item_tour', '見学', 'create_item_tour', 'kura', 'normal');
    add_meta_box('custom-item_taste', '試飲', 'create_item_taste', 'kura', 'normal');
    add_meta_box('custom-item_snslink', '酒造SNS', 'create_item_snslink', 'kura', 'normal');
    add_meta_box('custom-item_maplink', 'Googlemap', 'create_item_maplink', 'kura', 'normal');
    add_meta_box('custom-item_kuraarticle1', '記事1', 'create_item_kuraarticle1', 'kura', 'normal');
    add_meta_box('custom-item_kuraarticle2', '記事2', 'create_item_kuraarticle2', 'kura', 'normal');
    add_meta_box('custom-item_kuraarticle3', '記事3', 'create_item_kuraarticle3', 'kura', 'normal');
    add_meta_box('custom-item_kuraarticle4', '記事4', 'create_item_kuraarticle4', 'kura', 'normal');
    add_meta_box('custom-item_kuraarticle5', '記事5', 'create_item_kuraarticle5', 'kura', 'normal');
    add_meta_box('custom-item_kuraimg1', '画像1', 'create_item_kuraimg1', 'kura', 'normal');
    add_meta_box('custom-item_kuraimg2', '看板商品(製品1)画像', 'create_item_kuraimg2', 'kura', 'normal');
    add_meta_box('custom-item_kuraimg3', '製品2画像', 'create_item_kuraimg3', 'kura', 'normal');
    add_meta_box('custom-item_kuraimg4', '製品3画像', 'create_item_kuraimg4', 'kura', 'normal');
    add_meta_box('custom-item_kuraimg5', '製品4画像', 'create_item_kuraimg5', 'kura', 'normal');
    add_meta_box('custom-item_product1', '看板商品(製品1)', 'create_item_product1', 'kura', 'normal');
    add_meta_box('custom-item_product1_spicy', '看板商品 甘辛度', 'create_item_product1_spicy', 'kura', 'normal');
    add_meta_box('custom-item_product1_mainmaterial', '看板商品 主原料', 'create_item_product1_mainmaterial', 'kura', 'normal');
    add_meta_box('custom-item_product2', '製品2', 'create_item_product2', 'kura', 'normal');
    add_meta_box('custom-item_product3', '製品3', 'create_item_product3', 'kura', 'normal');
    add_meta_box('custom-item_product4', '製品4', 'create_item_product4', 'kura', 'normal');
    add_meta_box('custom-kura_spare1', '予備項目1', 'create_kura_spare1', 'kura', 'normal');
    add_meta_box('custom-kura_spare2', '予備項目2', 'create_kura_spare2', 'kura', 'normal');
    add_meta_box('custom-kura_spare3', '予備項目3', 'create_kura_spare3', 'kura', 'normal');
    //remove_meta_box('slugdiv','kura','normal'); //元々あったスラッグの欄が邪魔なので削除。-> 一回実行したらコメントアウト。
}
add_action('admin_menu', 'add_kura_custom_field');



// ============================================================================================
// カスタムフィールドの入力欄のHTMLを出力する関数（酒造）

function create_item_kuramotoname()     //蔵元名
{
    global $post;
    $item_kuramotoname = get_post_meta($post->ID, 'item_kuramotoname', true);
    echo '<input name="item_kuramotoname" value="' . $item_kuramotoname . '" > ' . ' ※必須';
}
function create_item_kuramotokana()
{
    global $post;
    $item_kuramotokana = get_post_meta($post->ID, 'item_kuramotokana', true);
    echo '<input name="item_kuramotokana" value="' . $item_kuramotokana . '" > ' . ' ※必須';
}
function create_item_address()
{
    global $post;
    $item_address = get_post_meta($post->ID, 'item_address', true);
    $item_zip = get_post_meta($post->ID, 'item_zip', true);
    echo '〒  <input name="item_address" value="' . $item_address . '" > ' . '<br>';
    echo '住所<input name="item_zip" value="' . $item_zip . '" size="50" > ';
}
function create_item_tel()
{
    global $post;
    $item_tel1 = get_post_meta($post->ID, 'item_tel1', true);
    $item_tel2 = get_post_meta($post->ID, 'item_tel2', true);
    $item_tel3 = get_post_meta($post->ID, 'item_tel3', true);
    $item_fax = get_post_meta($post->ID, 'item_fax', true);
    echo 'TEL1<input name="item_tel1" value="' . $item_tel1 . '" > ' . '<br>';
    echo 'TEL2<input name="item_tel2" value="' . $item_tel2 . '" > ' . '<br>';
    echo 'TEL3<input name="item_tel3" value="' . $item_tel3 . '" > ' . '<br>';
    echo 'FAX <input name="item_fax" value="' . $item_fax . ' "> ';
}
function create_item_mail()
{
    global $post;
    create_item_kura_sub($post, 'item_mail');
}
function create_item_open()
{
    global $post;
    create_item_kura_sub($post, 'item_open');
}
function create_item_holiday()
{
    global $post;
    create_item_kura_sub($post, 'item_holiday');
}
function create_item_externallink()
{
    global $post;
    create_item_kura_sub($post, 'item_externallink');
}
function create_item_tour()
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_tour', true);
    echo 'あり<input type="radio" name="item_tour" value="あり" ';
    if ($get_value == 'あり') : echo 'checked="checked"';
    endif;
    echo '>  なし<input type="radio" name="item_tour" value="なし" ';
    if ($get_value == 'なし') : echo 'checked="checked"';
    endif;
    echo '>';
}
function create_item_taste()
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_taste', true);
    echo 'あり<input type="radio" name="item_taste" value="あり" ';
    if ($get_value == 'あり') : echo 'checked="checked"';
    endif;
    echo '>  なし<input type="radio" name="item_taste" value="なし" ';
    if ($get_value == 'なし') : echo 'checked="checked"';
    endif;
    echo '>';
}
function create_item_snslink()
{
    global $post;
    echo 'Twitter';
    create_item_kura_sub($post, 'item_twitterlink');
    echo '<br>' . 'Facebook';
    create_item_kura_sub($post, 'item_facebooklink');
    echo '<br>' . 'Line';
    create_item_kura_sub($post, 'item_linelink');
}
function create_item_maplink()
{
    global $post;
    create_item_kura_sub($post, 'item_maplink');
}
function create_item_kuraarticle1()   //酒造記事1
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_kuraarticle1', true);
    // echo '<input type="text" name="exhibition_comment" value="' . $get_value . '" required size="100">';
    echo '<textarea name="item_kuraarticle1" rows="4" cols="100">' . $get_value . '</textarea>';
}
function create_item_kuraarticle2()   //酒造記事2
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_kuraarticle2', true);
    echo '<textarea name="item_kuraarticle2" rows="4" cols="100">' . $get_value . '</textarea>';
}
function create_item_kuraarticle3()   //酒造記事3
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_kuraarticle3', true);
    echo '<textarea name="item_kuraarticle3" rows="4" cols="100">' . $get_value . '</textarea>';
}
function create_item_kuraarticle4()   //酒造記事4
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_kuraarticle4', true);
    echo '<textarea name="item_kuraarticle4" rows="4" cols="100">' . $get_value . '</textarea>';
}
function create_item_kuraarticle5()   //酒造記事5
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_kuraarticle5', true);
    echo '<textarea name="item_kuraarticle5" rows="4" cols="100">' . $get_value . '</textarea>';
}
function create_item_kuraimg1()
{
    global $post;
    //get_post_meta関数を使ってpostmeta情報を取得
    // $hoge_name = get_post_meta(
    //     $post->ID, //投稿ID
    //     'hoge_name', //キー名
    //     true //戻り値を文字列にする場合true(falseの場合は配列)
    // );
    $item_kuraimg1 = get_post_meta($post->ID, 'item_kuraimg1', true);
    // echo '名前： <input type="text" name="hoge_name" value="' . $hoge_name . '" /><br>';
    echo '画像： <input type="file" name="item_kuraimg1" accept="image/*" /><br>';
    if (isset($item_kuraimg1) && strlen($item_kuraimg1) > 0) {
        //item_kuraimg1キーのpostmeta情報がある場合は、画像を表示
        //$item_kuraimg1には、後述するattach_idが格納されているので、wp_get_attachment_url関数にそのattach_idを渡して画像のURLを取得する
        echo '<img style="width: 200px;display: block;margin: 1em;" src="' . wp_get_attachment_url($item_kuraimg1) . '">';
    }
}
function create_item_kuraimg2()
{
    global $post;
    $item_kuraimg2 = get_post_meta($post->ID, 'item_kuraimg2', true);
    // echo '名前： <input type="text" name="hoge_name" value="' . $hoge_name . '" /><br>';
    echo '画像： <input type="file" name="item_kuraimg2" accept="image/*" /><br>';
    if (isset($item_kuraimg2) && strlen($item_kuraimg2) > 0) {
        echo '<img style="width: 200px;display: block;margin: 1em;" src="' . wp_get_attachment_url($item_kuraimg2) . '">';
    }
}
function create_item_kuraimg3()
{
    global $post;
    $item_kuraimg3 = get_post_meta($post->ID, 'item_kuraimg3', true);
    // echo '名前： <input type="text" name="hoge_name" value="' . $hoge_name . '" /><br>';
    echo '画像： <input type="file" name="item_kuraimg3" accept="image/*" /><br>';
    if (isset($item_kuraimg3) && strlen($item_kuraimg3) > 0) {
        echo '<img style="width: 200px;display: block;margin: 1em;" src="' . wp_get_attachment_url($item_kuraimg3) . '">';
    }
}
function create_item_kuraimg4()
{
    global $post;
    $item_kuraimg4 = get_post_meta($post->ID, 'item_kuraimg4', true);
    // echo '名前： <input type="text" name="hoge_name" value="' . $hoge_name . '" /><br>';
    echo '画像： <input type="file" name="item_kuraimg4" accept="image/*" /><br>';
    if (isset($item_kuraimg4) && strlen($item_kuraimg4) > 0) {
        echo '<img style="width: 200px;display: block;margin: 1em;" src="' . wp_get_attachment_url($item_kuraimg4) . '">';
    }
}
function create_item_kuraimg5()
{
    global $post;
    $item_kuraimg5 = get_post_meta($post->ID, 'item_kuraimg5', true);
    // echo '名前： <input type="text" name="hoge_name" value="' . $hoge_name . '" /><br>';
    echo '画像： <input type="file" name="item_kuraimg5" accept="image/*" /><br>';
    if (isset($item_kuraimg5) && strlen($item_kuraimg5) > 0) {
        echo '<img style="width: 200px;display: block;margin: 1em;" src="' . wp_get_attachment_url($item_kuraimg5) . '">';
    }
}

function create_item_product1()
{
    global $post;
    $item_product1 = get_post_meta($post->ID, 'item_product1', true);
    $item_productlink1 = get_post_meta($post->ID, 'item_productlink1', true);
    echo '製品名 <input name="item_product1" value="' . $item_product1 . '" > ' . '<br>';
    echo '内部リンク<input name="item_productlink1" value="' . $item_productlink1 . '" size="50" > ';
}
function create_item_product1_spicy()                //甘辛度アイコン
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_product1_spicy', true);
    echo '甘<input type="radio" name="item_spicy" value="1" ';
    if ($get_value == 1) : echo 'checked="checked"';
    endif;
    echo '><input type="radio" name="item_product1_spicy" value="2" ';
    if ($get_value == 2) : echo 'checked="checked"';
    endif;
    echo '><input type="radio" name="item_product1_spicy" value="3" ';
    if ($get_value == 3) : echo 'checked="checked"';
    endif;
    echo '><input type="radio" name="item_product1_spicy" value="4"';
    if ($get_value == 4) : echo 'checked="checked"';
    endif;
    echo '><input type="radio" name="item_product1_spicy" value="5"';
    if ($get_value == 5) : echo 'checked="checked"';
    endif;
    echo '>辛';
}
function create_item_product1_mainmaterial()         //主原料アイコン
{
    global $post;
    $get_value = get_post_meta($post->ID, 'item_product1_mainmaterial', true);
    echo '米<input type="radio" name="item_product1_mainmaterial" value="1" ';
    if ($get_value == 1) : echo 'checked="checked"';
    endif;
    echo '> 麦<input type="radio" name="item_product1_mainmaterial" value="2" ';
    if ($get_value == 2) : echo 'checked="checked"';
    endif;
    echo '> 鳴門金時<input type="radio" name="item_product1_mainmaterial" value="3" ';
    if ($get_value == 3) : echo 'checked="checked"';
    endif;
    echo '> さつま芋<input type="radio" name="item_product1_mainmaterial" value="4" ';
    if ($get_value == 4) : echo 'checked="checked"';
    endif;
    echo '> 葡萄<input type="radio" name="item_product1_mainmaterial" value="5" ';
    if ($get_value == 5) : echo 'checked="checked"';
    endif;
    echo '> ホップ<input type="radio" name="item_product1_mainmaterial" value="6" ';
    if ($get_value == 6) : echo 'checked="checked"';
    endif;
    echo '> すだち<input type="radio" name="item_product1_mainmaterial" value="7" ';
    if ($get_value == 7) : echo 'checked="checked"';
    endif;
    echo '> ゆず<input type="radio" name="item_product1_mainmaterial" value="8" ';
    if ($get_value == 8) : echo 'checked="checked"';
    endif;
    echo '> やまもも<input type="radio" name="item_product1_mainmaterial" value="9" ';
    if ($get_value == 9) : echo 'checked="checked"';
    endif;
    echo '> 梅<input type="radio" name="item_product1_mainmaterial" value="10" ';
    if ($get_value == 10) : echo 'checked="checked"';
    endif;
    echo '>';
}
function create_item_product2()
{
    global $post;
    $item_product2 = get_post_meta($post->ID, 'item_product2', true);
    $item_productlink2 = get_post_meta($post->ID, 'item_productlink2', true);
    echo '製品名 <input name="item_product2" value="' . $item_product2 . '" > ' . '<br>';
    echo '内部リンク<input name="item_productlink2" value="' . $item_productlink2 . '" size="50" > ';
}
function create_item_product3()
{
    global $post;
    $item_product3 = get_post_meta($post->ID, 'item_product3', true);
    $item_productlink3 = get_post_meta($post->ID, 'item_productlink3', true);
    echo '製品名 <input name="item_product3" value="' . $item_product3 . '" > ' . '<br>';
    echo '内部リンク<input name="item_productlink3" value="' . $item_productlink3 . '" size="50" > ';
}
function create_item_product4()
{
    global $post;
    $item_product4 = get_post_meta($post->ID, 'item_product4', true);
    $item_productlink4 = get_post_meta($post->ID, 'item_productlink4', true);
    echo '製品名 <input name="item_product4" value="' . $item_product4 . '" > ' . '<br>';
    echo '内部リンク<input name="item_productlink4" value="' . $item_productlink4 . '" size="50" > ';
}
function create_kura_spare1()
{
    global $post;
    $kura_spare1_title = get_post_meta($post->ID, 'kura_spare1_title', true);
    $kura_spare1_value = get_post_meta($post->ID, 'kura_spare1_value', true);
    echo '項目名', '<input name="kura_spare1_title" value="' . $kura_spare1_title . '" >  :  <input name="kura_spare1_value" value="' . $kura_spare1_value . '" >';
}
function create_kura_spare2()
{
    global $post;
    $kura_spare2_title = get_post_meta($post->ID, 'kura_spare2_title', true);
    $kura_spare2_value = get_post_meta($post->ID, 'kura_spare2_value', true);
    echo '項目名', '<input name="kura_spare2_title" value="' . $kura_spare2_title . '" >  :  <input name="kura_spare2_value" value="' . $kura_spare2_value . '" >';
}
function create_kura_spare3()
{
    global $post;
    $kura_spare3_title = get_post_meta($post->ID, 'kura_spare3_title', true);
    $kura_spare3_value = get_post_meta($post->ID, 'kura_spare3_value', true);
    echo '項目名', '<input name="kura_spare3_title" value="' . $kura_spare3_title . '" >  :  <input name="kura_spare3_value" value="' . $kura_spare3_value . '" >';
}
function create_item_kura_sub($post, $keyname)
{
    // 保存されているカスタムフィールドの値を取得
    $get_value = get_post_meta($post->ID, $keyname, true);
    // nonceの追加
    wp_nonce_field('action-' . $keyname, 'nonce-' . $keyname);
    // HTMLの出力
    echo '<input name="' . $keyname . '" value="' . $get_value . '" size="40" required>';
}



// ============================================================================================
// カスタムフィールドの値を保存する関数(酒造)

function save_custom_fields_kura($post_id)
{
    if (!empty($_POST['item_kuramotoname'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_kuramotoname', $_POST['item_kuramotoname']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_kuramotoname'); //値を削除
    }
    if (!empty($_POST['item_kuramotokana'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_kuramotokana', $_POST['item_kuramotokana']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_kuramotokana'); //値を削除
    }
    if (!empty($_POST['item_zip'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_zip', $_POST['item_zip']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_zip'); //値を削除
    }
    if (!empty($_POST['item_address'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_address', $_POST['item_address']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_address'); //値を削除
    }
    if (!empty($_POST['item_tel1'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_tel1', $_POST['item_tel1']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_tel1'); //値を削除
    }
    if (!empty($_POST['item_tel2'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_tel2', $_POST['item_tel2']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_tel2'); //値を削除
    }
    if (!empty($_POST['item_tel3'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_tel3', $_POST['item_tel3']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_tel3'); //値を削除
    }
    if (!empty($_POST['item_fax'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_fax', $_POST['item_fax']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_fax'); //値を削除
    }
    if (!empty($_POST['item_mail'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_mail', $_POST['item_mail']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_mail'); //値を削除
    }
    if (!empty($_POST['item_open'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_open', $_POST['item_open']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_open'); //値を削除
    }
    if (!empty($_POST['item_holiday'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_holiday', $_POST['item_holiday']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_holiday'); //値を削除
    }
    if (!empty($_POST['item_externallink'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_externallink', $_POST['item_externallink']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_externallink'); //値を削除
    }
    if (!empty($_POST['item_tour'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_tour', $_POST['item_tour']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_tour'); //値を削除
    }
    if (!empty($_POST['item_taste'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_taste', $_POST['item_taste']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_taste'); //値を削除
    }
    if (!empty($_POST['item_twitterlink'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_twitterlink', $_POST['item_twitterlink']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_twitterlink'); //値を削除
    }
    if (!empty($_POST['item_facebooklink'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_facebooklink', $_POST['item_facebooklink']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_facebooklink'); //値を削除
    }
    if (!empty($_POST['item_linelink'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_linelink', $_POST['item_linelink']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_linelink'); //値を削除
    }
    if (!empty($_POST['item_maplink'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_maplink', $_POST['item_maplink']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_maplink'); //値を削除
    }
    // item_kuraarticle1の保存
    if (!empty($_POST['item_kuraarticle1'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_kuraarticle1', $_POST['item_kuraarticle1']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_kuraarticle1'); //値を削除
    }
    // item_kuraarticle2の保存
    if (!empty($_POST['item_kuraarticle2'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_kuraarticle2', $_POST['item_kuraarticle2']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_kuraarticle2'); //値を削除
    }
    // item_kuraarticle3の保存
    if (!empty($_POST['item_kuraarticle3'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_kuraarticle3', $_POST['item_kuraarticle3']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_kuraarticle3'); //値を削除
    }
    // item_kuraarticle4の保存
    if (!empty($_POST['item_kuraarticle4'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_kuraarticle4', $_POST['item_kuraarticle4']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_kuraarticle4'); //値を削除
    }
    // item_kuraarticle5の保存
    if (!empty($_POST['item_kuraarticle5'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_kuraarticle5', $_POST['item_kuraarticle5']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_kuraarticle5'); //値を削除
    }

    // item_kuraimg1の保存
    if (isset($_FILES['item_kuraimg1']) && $_FILES["item_kuraimg1"]["size"] !== 0) {
        $file_name = basename($_FILES['item_kuraimg1']['name']);
        $file_name = trim($file_name);
        $file_name = str_replace(" ", "-", $file_name);
        $wp_upload_dir = wp_upload_dir();
        $upload_file = $_FILES['item_kuraimg1']['tmp_name'];
        $upload_path = $wp_upload_dir['path'] . '/' . $file_name;
        move_uploaded_file($upload_file, $upload_path);
        $file_type = $_FILES['item_kuraimg1']['type'];
        $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));
        if (file_exists($upload_path)) {
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename($file_name),
                'post_mime_type' => $file_type,
                'post_title' => $slug_name,
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment($attachment, $upload_path, $post_id);
            if (!function_exists('wp_generate_attachment_metadata')) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            }
            $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
            wp_update_attachment_metadata($attach_id, $attach_data);
            update_post_meta($post_id, 'item_kuraimg1', $attach_id);
        } else {
            echo '画像保存に失敗しました';
            exit;
        }
    }

    // item_kuraimg2の保存
    if (isset($_FILES['item_kuraimg2']) && $_FILES["item_kuraimg2"]["size"] !== 0) {
        $file_name = basename($_FILES['item_kuraimg2']['name']);
        $file_name = trim($file_name);
        $file_name = str_replace(" ", "-", $file_name);
        $wp_upload_dir = wp_upload_dir(); //現在のuploadディクレトリのパスとURLを入れた配列
        $upload_file = $_FILES['item_kuraimg2']['tmp_name'];
        $upload_path = $wp_upload_dir['path'] . '/' . $file_name; //uploadsディレクトリ以下などに配置する場合は$wp_upload_dir['basedir']を利用する
        //画像ファイルをuploadディクレトリに移動させる
        move_uploaded_file($upload_file, $upload_path);
        $file_type = $_FILES['item_kuraimg2']['type'];
        //正規表現で拡張子なしのスラッグ名を生成
        $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));
        if (file_exists($upload_path)) {
            //保存に成功してファイルが存在する場合は、wp_postsテーブルなどに情報を追加
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename($file_name),
                'post_mime_type' => $file_type,
                'post_title'     => $slug_name,
                'post_content'   => '',
                'post_status'    => 'inherit'
            );
            //添付ファイルを追加
            $attach_id = wp_insert_attachment($attachment, $upload_path, $post_id);
            if (!function_exists('wp_generate_attachment_metadata')) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            }
            //添付ファイルのメタデータを生成し、wp_postsテーブルに情報を保存
            $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
            wp_update_attachment_metadata($attach_id, $attach_data);
            //wp_postmetaテーブルに画像のattachment_id(wp_postsテーブルのレコードのID)を保存
            update_post_meta($post_id, 'item_kuraimg2', $attach_id);
        } else {
            //保存失敗
            echo '画像保存に失敗しました';
            exit;
        }
    }

    // item_kuraimg3の保存
    if (isset($_FILES['item_kuraimg3']) && $_FILES["item_kuraimg3"]["size"] !== 0) {
        $file_name = basename($_FILES['item_kuraimg3']['name']);
        $file_name = trim($file_name);
        $file_name = str_replace(" ", "-", $file_name);
        $wp_upload_dir = wp_upload_dir(); //現在のuploadディクレトリのパスとURLを入れた配列
        $upload_file = $_FILES['item_kuraimg3']['tmp_name'];
        $upload_path = $wp_upload_dir['path'] . '/' . $file_name; //uploadsディレクトリ以下などに配置する場合は$wp_upload_dir['basedir']を利用する
        //画像ファイルをuploadディクレトリに移動させる
        move_uploaded_file($upload_file, $upload_path);
        $file_type = $_FILES['item_kuraimg3']['type'];
        //正規表現で拡張子なしのスラッグ名を生成
        $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));
        if (file_exists($upload_path)) {
            //保存に成功してファイルが存在する場合は、wp_postsテーブルなどに情報を追加
            $attachment = array(
                'guid'           => $wp_upload_dir['url'] . '/' . basename($file_name),
                'post_mime_type' => $file_type,
                'post_title'     => $slug_name,
                'post_content'   => '',
                'post_status'    => 'inherit'
            );
            //添付ファイルを追加
            $attach_id = wp_insert_attachment($attachment, $upload_path, $post_id);
            if (!function_exists('wp_generate_attachment_metadata')) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            }
            //添付ファイルのメタデータを生成し、wp_postsテーブルに情報を保存
            $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
            wp_update_attachment_metadata($attach_id, $attach_data);
            //wp_postmetaテーブルに画像のattachment_id(wp_postsテーブルのレコードのID)を保存
            update_post_meta($post_id, 'item_kuraimg3', $attach_id);
        } else {
            //保存失敗
            echo '画像保存に失敗しました';
            exit;
        }
    }

    // item_kuraimg4の保存
    if (isset($_FILES['item_kuraimg4']) && $_FILES["item_kuraimg4"]["size"] !== 0) {
        $file_name = basename($_FILES['item_kuraimg4']['name']);
        $file_name = trim($file_name);
        $file_name = str_replace(" ", "-", $file_name);
        $wp_upload_dir = wp_upload_dir(); //現在のuploadディクレトリのパスとURLを入れた配列
        $upload_file = $_FILES['item_kuraimg4']['tmp_name'];
        $upload_path = $wp_upload_dir['path'] . '/' . $file_name; //uploadsディレクトリ以下などに配置する場合は$wp_upload_dir['basedir']を利用する
        //画像ファイルをuploadディクレトリに移動させる
        move_uploaded_file($upload_file, $upload_path);
        $file_type = $_FILES['item_kuraimg4']['type'];
        //正規表現で拡張子なしのスラッグ名を生成
        $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));
        if (file_exists($upload_path)) {
            //保存に成功してファイルが存在する場合は、wp_postsテーブルなどに情報を追加
            $attachment = array(
                'guid'              => $wp_upload_dir['url'] . '/' . basename($file_name),
                'post_mime_type'    => $file_type,
                'post_title'        => $slug_name,
                'post_content'      => '',
                'post_status'       => 'inherit'
            );
            //添付ファイルを追加
            $attach_id = wp_insert_attachment($attachment, $upload_path, $post_id);
            if (!function_exists('wp_generate_attachment_metadata')) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            }
            //添付ファイルのメタデータを生成し、wp_postsテーブルに情報を保存
            $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
            wp_update_attachment_metadata($attach_id, $attach_data);
            //wp_postmetaテーブルに画像のattachment_id(wp_postsテーブルのレコードのID)を保存
            update_post_meta($post_id, 'item_kuraimg4', $attach_id);
        } else {
            //保存失敗
            echo '画像保存に失敗しました';
            exit;
        }
    }

    // item_kuraimg5の保存
    if (isset($_FILES['item_kuraimg5']) && $_FILES["item_kuraimg5"]["size"] !== 0) {
        $file_name = basename($_FILES['item_kuraimg5']['name']);
        $file_name = trim($file_name);
        $file_name = str_replace(" ", "-", $file_name);
        $wp_upload_dir = wp_upload_dir(); //現在のuploadディクレトリのパスとURLを入れた配列
        $upload_file = $_FILES['item_kuraimg5']['tmp_name'];
        $upload_path = $wp_upload_dir['path'] . '/' . $file_name; //uploadsディレクトリ以下などに配置する場合は$wp_upload_dir['basedir']を利用する
        //画像ファイルをuploadディクレトリに移動させる
        move_uploaded_file($upload_file, $upload_path);
        $file_type = $_FILES['item_kuraimg5']['type'];
        //正規表現で拡張子なしのスラッグ名を生成
        $slug_name = preg_replace('/\.[^.]+$/', '', basename($upload_path));
        if (file_exists($upload_path)) {
            //保存に成功してファイルが存在する場合は、wp_postsテーブルなどに情報を追加
            $attachment = array(
                'guid'              => $wp_upload_dir['url'] . '/' . basename($file_name),
                'post_mime_type'    => $file_type,
                'post_title'        => $slug_name,
                'post_content'      => '',
                'post_status'       => 'inherit'
            );
            //添付ファイルを追加
            $attach_id = wp_insert_attachment($attachment, $upload_path, $post_id);
            if (!function_exists('wp_generate_attachment_metadata')) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            }
            //添付ファイルのメタデータを生成し、wp_postsテーブルに情報を保存
            $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
            wp_update_attachment_metadata($attach_id, $attach_data);
            //wp_postmetaテーブルに画像のattachment_id(wp_postsテーブルのレコードのID)を保存
            update_post_meta($post_id, 'item_kuraimg5', $attach_id);
        } else {
            //保存失敗
            echo '画像保存に失敗しました';
            exit;
        }
    }
    // 看板商品名（製品１）の保存
    if (!empty($_POST['item_product1'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_product1', $_POST['item_product1']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_product1'); //値を削除
    }
    // 看板商品（製品１）リンクの保存
    if (!empty($_POST['item_productlink1'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_productlink1', $_POST['item_productlink1']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_productlink1'); //値を削除
    }
    // 看板商品（製品１）甘辛度の保存
    if (!empty($_POST['item_product1_spicy'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_product1_spicy', $_POST['item_product1_spicy']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_product1_spicy'); //値を削除
    }
    // 看板商品（製品１）主原料の保存
    if (!empty($_POST['item_product1_mainmaterial'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_product1_mainmaterial', $_POST['item_product1_mainmaterial']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_product1_mainmaterial'); //値を削除
    }
    // 製品2 名前の保存
    if (!empty($_POST['item_product2'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_product2', $_POST['item_product2']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_product2'); //値を削除
    }
    // 製品2 リンクの保存
    if (!empty($_POST['item_productlink2'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_productlink2', $_POST['item_productlink2']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_productlink2'); //値を削除
    }
    // 製品3 名前の保存
    if (!empty($_POST['item_product3'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_product3', $_POST['item_product3']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_product3'); //値を削除
    }
    // 製品3 リンクの保存
    if (!empty($_POST['item_productlink3'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_productlink3', $_POST['item_productlink3']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_productlink3'); //値を削除
    }
    // 製品3 名前の保存
    if (!empty($_POST['item_product4'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_product4', $_POST['item_product4']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_product4'); //値を削除
    }
    // 製品4 リンクの保存
    if (!empty($_POST['item_productlink4'])) { //題名が入力されている場合
        update_post_meta($post_id, 'item_productlink4', $_POST['item_productlink4']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'item_productlink4'); //値を削除
    }
    if (!empty($_POST['kura_spare1_title'])) { //題名が入力されている場合
        update_post_meta($post_id, 'kura_spare1_title', $_POST['kura_spare1_title']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'kura_spare1_title'); //値を削除
    }
    if (!empty($_POST['kura_spare1_value'])) { //題名が入力されている場合
        update_post_meta($post_id, 'kura_spare1_value', $_POST['kura_spare1_value']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'kura_spare1_value'); //値を削除
    }
    if (!empty($_POST['kura_spare2_title'])) { //題名が入力されている場合
        update_post_meta($post_id, 'kura_spare2_title', $_POST['kura_spare2_title']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'kura_spare2_title'); //値を削除
    }
    if (!empty($_POST['kura_spare2_value'])) { //題名が入力されている場合
        update_post_meta($post_id, 'kura_spare2_value', $_POST['kura_spare2_value']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'kura_spare2_value'); //値を削除
    }
    if (!empty($_POST['kura_spare3_title'])) { //題名が入力されている場合
        update_post_meta($post_id, 'kura_spare3_title', $_POST['kura_spare3_title']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'kura_spare3_title'); //値を削除
    }
    if (!empty($_POST['kura_spare3_value'])) { //題名が入力されている場合
        update_post_meta($post_id, 'kura_spare3_value', $_POST['kura_spare3_value']); //値を保存
    } else { //題名未入力の場合
        delete_post_meta($post_id, 'kura_spare3_value'); //値を削除
    }
}
add_action('save_post', 'save_custom_fields_kura');





//=============================================================================================
// カスタムタクソノミーをウィジェットで表示するためのコード ========================================
//=============================================================================================

function override_widget_categories()
{
    class WP_Widget_Categories_Taxonomy extends WP_Widget_Categories
    {
        private $taxonomy = 'category';
        public function widget($args, $instance)
        {
            if (!empty($instance['taxonomy'])) {
                $this->taxonomy = $instance['taxonomy'];
            }
            add_filter('widget_categories_dropdown_args', array($this, 'add_taxonomy_dropdown_args'), 10);
            add_filter('widget_categories_args', array($this, 'add_taxonomy_dropdown_args'), 10);
            parent::widget($args, $instance);
        }
        public function update($new_instance, $old_instance)
        {
            $instance = parent::update($new_instance, $old_instance);
            $taxonomies = $this->get_taxonomies();
            $instance['taxonomy'] = 'category';
            if (in_array($new_instance['taxonomy'], $taxonomies)) {
                $instance['taxonomy'] = $new_instance['taxonomy'];
            }
            return $instance;
        }
        public function form($instance)
        {
            parent::form($instance);
            $taxonomy = 'category';
            if (!empty($instance['taxonomy'])) {
                $taxonomy = $instance['taxonomy'];
            }
            $taxonomies = $this->get_taxonomies();
?>
            <p>
                <label for="<?php echo $this->get_field_id('taxonomy'); ?>"><?php _e('Taxonomy:'); ?></label><br />
                <select id="<?php echo $this->get_field_id('taxonomy'); ?>" name="<?php echo $this->get_field_name('taxonomy'); ?>">
                    <?php foreach ($taxonomies as $value) : ?>
                        <option value="<?php echo esc_attr($value); ?>" <?php selected($taxonomy, $value); ?>><?php echo esc_attr($value); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
<?php
        }
        public function add_taxonomy_dropdown_args($cat_args)
        {
            $cat_args['taxonomy'] = $this->taxonomy;
            return $cat_args;
        }
        private function get_taxonomies()
        {
            $taxonomies = get_taxonomies(array(
                'public' => true,
            ));
            return $taxonomies;
        }
    }
    unregister_widget('WP_Widget_Categories');
    register_widget('WP_Widget_Categories_Taxonomy');
}
add_action('widgets_init', 'override_widget_categories');
// カスタムタクソノミーをウィジェットで表示するためのコード ここまで





//=============================================================================================
// 記事入力フォーム内 画像確認画面作成============================================================
//=============================================================================================

function custom_metabox_edit_form_tag()
{
    echo ' enctype="multipart/form-data"';
}
//画像をアップする場合は、multipart/form-dataの設定が必要なので、post_edit_form_tagをフックしてformタグに追加
add_action('post_edit_form_tag', 'custom_metabox_edit_form_tag');



//=============================================================================================
// 管理画面メニュー並び替え =====================================================================
//=============================================================================================
function custom_menu_order($menu_ord)
{
    if (!$menu_ord) return true;

    return array(
        'index.php', // ダッシュボード
        'separator1', // 区切り線１
        'edit.php?post_type=jizake', // カスタム投稿(地酒)
        'edit.php?post_type=kura', // カスタム投稿（酒造）
        'edit.php', // 投稿(特集・お酒を知る)
        'edit.php?post_type=page', // 固定ページ
        'separator2', // 区切り線2
        'edit-comments.php', // コメント
        'upload.php', // メディア
        'link-manager.php', // リンク
        'users.php', // ユーザー
        'separator3', // 区切り線3
        'themes.php', // テーマ
        'plugins.php', // プラグイン
        'tools.php', // ツール
        'options-general.php', // 設定
        'separator-last', // 区切り線３
    );
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');

//=============================================================================================
// 記事の並び替え chinatsu =====================================================================
//=============================================================================================

// ※コメントアウトして動くようなら消す

//記事の並び替え chinatsu
// function add_meta_query_vars($public_query_vars)
// {
//     $public_query_vars[] = 'meta_key'; //カスタムフィールドのキー
//     $public_query_vars[] = 'meta_value'; //カスタムフィールドの値（文字列）
//     return $public_query_vars;
// }
// add_filter('query_vars', 'add_meta_query_vars');





//=============================================================================================
// 検索機能 ====================================================================================
//=============================================================================================

// ※↓ページネーション機能が効かなくなっていたのでコメントアウトしています by安本4/19

// function custom_search($search, $wp_query)
// {
//     //query['s']があったら検索ページ表示
//     if (isset($wp_query->query['s'])) $wp_query->is_search = true;
//     return $search;
// }
// add_filter('posts_search', 'custom_search', 10, 2);

// function search_no_keywords()
// {
//     if (isset($_GET['s']) && empty($_GET['s'])) {
//         include(TEMPLATEPATH . '/search.php');
//         exit;
//     }
// }
// add_action('template_redirect', 'search_no_keywords');

// ※投稿ページの検索がうまくいかなかったのでコメントアウトしています by安本4/21
// tanaka use
// add_filter('posts_join', 'table_join');
// function table_join($join)
// {
//     global $wpdb;
//     if (is_category()) {
//         $join .= " INNER JOIN location ON $wpdb->posts.ID = location.ID";
//     }
//     return $join;
// }




//=============================================================================================
// サブループのページネーション==================================================================
//=============================================================================================

function the_pagination()
{
    global $wp_query; //サブループを指定した変数
    $bignum = 999999999;
    if ($wp_query->max_num_pages <= 1)
        return;
    echo paginate_links(array(
        'base'         => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
        'format'       => '',
        'current'      => max(1, get_query_var('paged')),
        'total'        => $wp_query->max_num_pages,
        'prev_text'    => '«',
        'next_text'    => '»',
        'type'         => 'plain',
        'end_size'     => 3,
        'mid_size'     => 3
    ));
}





//=============================================================================================
// カスタム投稿用post_typeを設定=================================================================
//=============================================================================================

add_filter('template_include', 'custom_search_template');
function custom_search_template($template)
{
    if (is_search()) {
        $post_types = get_query_var('post_type');
        foreach ((array) $post_types as $post_type)
            $templates[] = "{$post_type}-search.php";
        $templates[] = 'search.php';
        $template = get_query_template('search', $templates);
    }
    return $template;
}
