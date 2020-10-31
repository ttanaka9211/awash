<?php get_header(); ?>
<!-- ▲ ヘッダー : 終了-->

<!-- ▼ コンテンツ : 開始-->
<div class="">
    <div class="">
        <div class="n_section">
            <h1 class="n_title">
                404 Not found.
            </h1>
            <p>
                大変申し訳ございません。<br>
                お探しのページは削除されたか、URLが間違っている可能性があります。<br>
                URLをご確認いただき、トップページまたは上部ナビゲーションメニューからお探しのページへアクセスしてください。
            </p>
            <p>
                <a href="<?php echo esc_url(home_url('/')); ?>">&raquo;トップページへ戻る</a>
            </p>
        </div>
        <div class="n_body_usagi">
            <img src="<?php echo esc_url(get_theme_file_uri('images/template/usagi1.jpg')); ?>" alt="">
            <img src="<?php echo esc_url(get_theme_file_uri('images/template/usagi2.jpg')); ?>" alt="">
        </div>
    </div>
</div>
<?php get_footer(); ?>
