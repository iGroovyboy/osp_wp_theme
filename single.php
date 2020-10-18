<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package osp
 */

get_header();
$is_news = has_category( 'news', get_the_ID() );
?>

	<main>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', get_post_type() );

                if( $is_news ) : ?>
                    <section class="bg-odd">
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
                                        ?>
                                    </div><!-- .entry-content -->
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
                else :
                    the_content();
                endif;
                ?>

            <?php endwhile; ?>

            <?php
             if ( comments_open() || get_comments_number() ) :
                 comments_template();
             endif;
            ?>
        </article><!-- #post-<?php the_ID(); ?> -->
	</main><!-- #main -->

<?php
get_footer();
