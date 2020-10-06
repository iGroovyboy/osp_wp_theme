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

    <section  class="bg-odd">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="image image-left">
                        123
                    </div>
                </div>
                <div class="col-8">
                    456
                </div>
            </div>
        </div>
    </section>

    <?php
    the_content();

    wp_link_pages(
        array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'osp' ),
            'after'  => '</div>',
        )
    );
    ?>
