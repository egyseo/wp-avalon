<?php
/**
 * The template for displaying carousel in header
 *
 * @package UD
 * @subpackage Avalon
 * @since Avalon 1.0
 */
?>
<div class="secondary-header <?php if (is_home() || is_front_page()) echo 'sh__frontpage'; ?>">
    <?php
    if (is_home() || is_front_page()) :
        if (!empty(get_header_image())) :
            ?>
            <div class="secondary-header-image" style="background-image: url('<?php echo get_header_image(); ?>'); background-size: cover; background-position: center center;"></div>
            <?php
        endif;
        ?>
        <div class="container">
            <?php
            $slideshow_options = get_option('show_slideshow');
            $slideshow_shortcode = $slideshow_options['slideshow_shortcode'];
            $slideshow_css = $slideshow_options['slideshow_css'];
            if (isset($slideshow_options) && $slideshow_options['value'] !== '') :
                if ($slideshow_options['value'] == '2' && !empty($slideshow_shortcode)) :
                    echo do_shortcode($slideshow_shortcode);
                    if (!empty($slideshow_css)) :
                        ?>
                        <style type="text/css">
                <?php echo $slideshow_css; ?>
                        </style>
                        <?php
                    endif;
                endif;
            endif;
            ?>
        </div>
        <?php
    else :
        $exist_images_in_head = get_option('show_featured_image_in_head');
        $show_head_img_or_featured_img = get_option('show_head_img_or_featured_img');
        if ($exist_images_in_head['value'] == '1') :
            $featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            if (!empty($featured_image)) :
                echo '<div class="secondary-header-image" style="background-image: url(\'' . $featured_image . '\'); background-size: cover; background-position: center center;"></div>';
            elseif ($show_head_img_or_featured_img['value'] == '1' && (!empty(get_header_image()))) :
                echo '<div class="secondary-header-image" style="background-image: url(\'' . get_header_image() . '\'); background-size: cover; background-position: center center;"></div>';
            endif;
        endif;
        echo '<div class="container"><h1 class="page-title">' . get_the_title() . '</h1>';
        the_tagline('<h3 class="page-tagline">', '</h3>');
        echo '</div>';
    endif;
    ?>
</div>