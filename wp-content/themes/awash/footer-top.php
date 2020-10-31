<div>
    <ul class="footer_shareicon_icon">

        <li>
            <a href="https://ja-jp.facebook.com/" target="_blank">
                <i class="fab fa-facebook"></i>
            </a>
        </li>
        <li>
            <a href="https://twitter.com/" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li>
            <a href="https://line.me/ja/" target="_blank">
                <i class="fab fa-line"></i>
            </a>
        </li>
    </ul>
</div>
<div class="footer_backhead_arrow">
    <a href="#head_gohead_link">
        <div class="footer_backhead_text">上へ</div>
        <i class="fas fa-chevron-up"></i>
    </a>
</div>

<footer>
    <div class="footer_wrap">
        <div class="footer_navhow_text">
            <ul>
                <li><a href=<?php echo esc_url(home_url('/#i_body_awash')); ?>>阿波ッシュとは</a></li>
            </ul>
        </div>
        <div class="footer_navtext_wrap">
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'footer_menu1',
                    'container' => 'div',
                    'container_class' => 'footer_nav_text1',
                )
            ); ?>
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'footer_menu2',
                    'container' => 'div',
                    'container_class' => 'footer_nav_text2',
                )
            ); ?>
        </div>

        <p class="footer_attention_text">お酒は二十歳になってから</p>
    </div>
</footer>
</div>
<script src="<?php echo esc_url(get_theme_file_uri('js/index.js')); ?>"></script>
<?php wp_footer(); ?>
</body>

</html>
