<?php
/**
 * Template file for Property sigle page
 *
 * @package UD
 * @subpackage Avalon
 * @since Avalon 1.0
 */
get_header();
?>

<div class="container">

    <?php if (isset($post->property_type) && (empty_sidebar("wpp_sidebar_" . $post->property_type))) : ?>
        <div class="content col-md-8">
        <?php else : ?>
            <div class="content col-md-12">
            <?php endif; ?>
            <?php
            if (have_posts()) :

                while (have_posts()) : the_post();

                    get_template_part('template-parts/content/content', 'property');

                endwhile;

            endif;
            ?>
        </div>

        <?php get_sidebar('property'); ?>

    </div>

    <?php get_footer(); ?>