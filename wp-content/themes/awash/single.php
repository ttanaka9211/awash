<?php
// テンプレートの分岐

// お酒を知るの場合
if (in_category('about')) :
    // テンプレートsingle-about.phpの読込
    get_template_part('single-about');

//それ以外の場合
else :
    // テンプレートsingle-topics.phpの読込
    get_template_part('single-topics'); ?>
<?php endif; ?>
