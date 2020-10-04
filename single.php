<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package osp
 */

get_header();
?>

	<main id="primary" class="site-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', get_post_type() );

                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>
        </article><!-- #post-<?php the_ID(); ?> -->
	</main><!-- #main -->

<?php
get_footer();
