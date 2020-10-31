<?php get_header(); ?>

<body>
    <!-- <div class="container">
        <div class=con_page-title-typo>
            <p>お問い合わせ</p>
        </div> -->
    <div class="con_page-title-typo">
        <h2 class="typo all_pageshadow">お問い合わせ</h2>
        <img src="<?php echo esc_url(get_theme_file_uri('/images/template/contact.jpg')); ?>" alt="特集">
    </div>
    <div class="con_article">
        <h3 class="con_article_typo">お問い合わせ</h3>
        <div class="noto">
            『阿波ッシュ-AWASH-』にご興味をお持ちいただきありがとうございます。
            当サイトでは、徳島のお酒に関する情報の発信を行なっております。

            <p>情報提供や記事の修正依頼、また、その他ご意見・ご要望などはこちらのフォームに必要事項を誤入力の上、送信して下さい。担当者よりご連絡させていただきます。<br>
                Thank you for visiting our website. If you have any questions at all, please feel free to ask us.
            </p>
            <?php echo do_shortcode('[contact-form-7 id="610" title="コンタクトフォーム 1"]') ?>
        </div>
    </div>
    </div>
    <?php get_footer(); ?>
