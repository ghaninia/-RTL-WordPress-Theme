<!DOCTYPE html>
<html lang="farsi" <?php language_attributes(); ?>>
<head>
    <title><?php
            if (is_home ()) {
                bloginfo('name');
            }elseif (is_category()) {
                single_cat_title(); echo ' : ' ; bloginfo('name');
            }elseif (is_single()) {
                bloginfo('name'); echo ' : '; single_post_title();
            }elseif (is_page()) {
                bloginfo('name'); echo ' : ';single_post_title();
            }else {
                wp_title(' ',true);
            } ?></title>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <meta property="og:type" content="website">
    <meta property="og:title" content="Sallar Kaboli">
    <meta property="og:url" content="<?php bloginfo('url'); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name') ;?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">

    <!-- twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php bloginfo('name') ;?>">
    <meta name="twitter:description" content="<?php bloginfo('description'); ?>">

    <link rel="alternate" href="/atom.xml" title="<?php bloginfo('name') ;?>" type="application/atom+xml">
    <link rel="short icon" href="">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">

</head>
<body <?php body_class( 'body' ); ?>>

<!-- Header -->
<header>
    <section class="container">
        <nav>
            <h1>
                <a href="<?php bloginfo('url'); ?>" class="logo"><?php bloginfo('name') ;?></a>
            </h1>
            <?php wp_nav_menu( array(
                    'menu'              => 'header-menu',
                    'theme_location'    => 'header-menu',
                    'depth'             => 1 ,
                    'container'         => false,
                    'fallback_cb'       => 'customWalker::fallback',
                    'walker'            => new customWalker())
            ); ?>
        </nav>
    </section>
</header>
<!-- /Header -->