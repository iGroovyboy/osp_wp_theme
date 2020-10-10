<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package osp
 */

?>

<article id="post-<?php the_ID(); ?>" class="row">
    <?php the_post(); ?>
        <div class="col-4">
            <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            <div class="image image-left">
                <?php osp_post_thumbnail(); ?>
            </div>
        </div>
        <div class="col-8">

            <?php the_excerpt(); ?>
        </div>
</article>