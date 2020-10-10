<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package osp
 */

get_header();
?>

	<main>


		<?php if ( have_posts() ) : ?>
            <section class="hero">
                <div class="container">
                    <h1 class="page-title">
                        <?php
                        /* translators: %s: search query. */
                        printf( esc_html__( 'Підсумки пошуку: %s', 'osp' ), '<span>' . get_search_query() . '</span>' );
                        ?>
                    </h1>
                </div>
            </section>
			<?php
			/* Start the Loop */
            $class[1] = 'odd';
			$class[0] = 'even';
			$count = 0;
			while ( have_posts() ) :
                $count++;
                $color_id = $count % 2;
                ?>

                <section class="bg-<?php echo $class[$color_id];?>">
                    <div class="container">
                        <?php get_template_part( 'template-parts/content', 'search' );?>
                    </div>
                </section>

            <?php endwhile;

			the_posts_navigation();

		else : ?>



            <?php get_template_part( 'template-parts/content', 'none' );?>

		<?php endif; ?>

	</main><!-- #main -->

<?php
get_footer();
