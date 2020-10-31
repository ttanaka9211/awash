<?php if (in_category('about')) : ?>
    <?php get_template_part('category-about'); ?>
<?php else : ?>
    <?php get_template_part('category-topics'); ?>
<?php endif; ?>
