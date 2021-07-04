<?php
/**
 * The header for our theme
 *
 */

// ?> <DOCTYPE html>
<html <?php //language_attributes(); ?> >
<head>
<!--
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/manifesto.json">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo site_url() ?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo site_url() ?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo site_url() ?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url() ?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo site_url() ?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo site_url() ?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo site_url() ?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo site_url() ?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url() ?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo site_url() ?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url() ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo site_url() ?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url() ?>/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo site_url() ?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    -->
<?php wp_head(); ?>
</head>


<?php 
    $header_fixed = "header-fixed";
    $display_animation = "no-display";
    $scroll_body ="";
    $show_opener = "visible";
    if(is_front_page()){
        $header_fixed = "";
        $display_animation = "";
        $show_opener ="";
        $scroll_body = "noscroll";
    }

?>
<body <?php body_class([$scroll_body,'no-scrollbar']); ?> >
<input id="myInput" class="d-none input-secreto" type="password">

<div id="page" class="site">
    <div class="cursor-dot-outline" ></div>
    <div class="cursor-dot"></div>

    <!-- <header id="masthead" class="site-header <?php echo $header_fixed; ?>" role="banner"> -->
    <!-- <header id="masthead" class="site-header <?php echo $header_fixed; ?>" > -->
    <div id="masthead" class="site-header <?php echo $header_fixed; ?>" >

        <div class="header-class">
            <div class="container-fuid header-content">
                <nav class="navbar">
                    <a class="link-header" href="<?php echo esc_url( home_url( '/' )) . "?skip"; ?>">
                        <?php echo file_get_contents(get_template_directory_uri().'/images/logo-clotheschest.svg'); ?>  
                        <span class="title-page">ClothesChest</span>
                    </a>
                </nav>

                <div class="header-buttons d-lg-flex d-none">
                    <div class="lang enlarge"> 
                        <span><?php _e("93 805 06 04","clotheschest"); ?></span>
                    </div>  
                    <div class="seguir enlarge">
                        <a href="https://www.instagram.com/#" target="_blank"><i class="icon-instagram"></i></a>
                        <span><?php _e("Síganos","clotheschest");?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--</header>--><!-- #masthead -->
    <div id="content" class="site-content <?php echo $padding_site; ?>">
        
