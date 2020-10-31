<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- web icon font -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <title><?php bloginfo('name'); ?></title>

    <script>
        (function(d) {
            var config = {
                    kitId: 'ypv6bkj',
                    scriptTimeout: 3000,
                    async: true
                },
                h = d.documentElement,
                t = setTimeout(function() {
                    h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
                }, config.scriptTimeout),
                tk = d.createElement("script"),
                f = false,
                s = d.getElementsByTagName("script")[0],
                a;
            h.className += " wf-loading";
            tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
            tk.async = true;
            tk.onload = tk.onreadystatechange = function() {
                a = this.readyState;
                if (f || a && a != "complete" && a != "loaded") return;
                f = true;
                clearTimeout(t);
                try {
                    Typekit.load(config)
                } catch (e) {}
            };
            s.parentNode.insertBefore(tk, s)
        })(document);
    </script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="container noto">
        <header class="header">
            <h1 class="header_logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_theme_file_uri('images/template/awash_logo_blue.png')); ?>" alt="阿波ッシュ">
                </a>
            </h1>
            <!-- sp用メニュー -->
            <nav>
                <div class="header_button_sp" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'globalnav_sp',
                        'container' => 'div',
                        'container_class' => 'header_togglemenu_menu ten',
                    )
                ); ?>
                <!-- pc用メニュー -->
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'globalnav',
                        'container' => 'div',
                        'container_class' => 'header_pc_menu',
                    )
                ); ?>
            </nav>
            <a href="#" id="head_gohead_link"></a>
            <div class="asdfg"></div>
        </header>
