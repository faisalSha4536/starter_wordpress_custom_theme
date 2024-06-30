<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="<?php bloginfo('descripition') ?>">
    <title><?php bloginfo('name') ?></title>
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>

    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    ?>

    <!-- NAVBAR -->
    <div class="sit-content">
        <header class="site-header" id="masthead">
            <?php get_template_part('/template-parts/nav') ?>
        </header>
    