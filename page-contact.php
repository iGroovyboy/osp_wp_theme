<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package osp
 */

get_header();
?>

	<main>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', 'contact' );
            endwhile; // End of the loop.
            ?>

            <section class="map">
                <div class="row">
                    <?php the_field('contact_google_maps_iframe', 'option'); ?>
                </div>
            </section>
        </article><!-- #post-<?php the_ID(); ?> -->
	</main><!-- #main -->

<?php
get_footer();
