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
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Edit <span class="screen-reader-text">%s</span>', 'osp' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post( get_the_title() )
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
        <?php endif; ?>
        </div>
    </section>

    <section class="bg-odd">
        <div class="container">
            <div class="row center">
                <div class="contact-form">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
