<?php
/**
 * Template part for index.php and archive.php container
 *
 * @package Usability Dynamics, Inc.
 * @subpackage Avalon
 * @since Avalon 1.0
 */
$date_format = get_option('date_format');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-template="template-parts/content/content-archive">
  <div class="archive-post-box">
    <div class="post-featured-image">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
      </a>
    </div>
    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <div class="post-date"><?php the_time($date_format); ?></div>
    <div class="post-content"><?php the_content('Read more...'); ?></div>
    <?php the_tags('<div class="post-tags"><label>Tags: </label>', ', ', '</div>'); ?>
    <div class="post-comments">
    <?php if(comments_open()) { ?>
      <a href="<?php the_permalink(); ?>#comments"><?php comments_number('No comments', 'One comment', '% comments'); ?></a>
    <?php } ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="btn btn-primary post-read-more"><?php _e('Read more...', 'wp-avalon'); ?></a>
  </div>
</article>