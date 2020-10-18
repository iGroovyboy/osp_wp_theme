<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package osp
 */

?>

    <section class="hero">
        <div class="container">
            <?php the_title( '<h1>', '</h1>' ); ?>
            <?php if ( get_edit_post_link() ) : ?>
                <?php
                edit_post_link(
                    __( 'Править', 'osp' ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
        <?php endif; ?>
        </div>
    </section>


