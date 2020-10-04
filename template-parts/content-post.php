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

    <section  class="bg-odd">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="image image-left">
                        <?php osp_post_thumbnail(); ?>
                    </div>
                </div>
                <div class="col-8">
                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'osp' ),
                                'after'  => '</div>',
                            )
                        );
                        ?>
                    </div><!-- .entry-content -->
                </div>
            </div>
        </div>
    </section>
