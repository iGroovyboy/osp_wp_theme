<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package osp
 */

get_header();
?>

	<main>
        <article id="archive" <?php post_class(); ?>>
            <section class="hero">
                <div class="container">
                    <h1><?php single_cat_title( '' ); ?></h1>
                </div>
            </section>

            <?php
            $descr = get_the_archive_description();
            if( $descr ) : ?>
            <section class="bg-even">
                <div class="container">
                    <div>
                        <?php echo get_the_archive_description();?>
                    </div>
                </div>
            </section>

            <?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<?php
			$class[1] = 'odd';
			$class[0] = 'even';
			$count = 0;
			while ( have_posts() ) :
                $count++;
                $color_id = $count % 2;
				the_post(); ?>
            <section class="bg-<?php echo $class[$color_id];?>">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <?php if ( get_edit_post_link() ) : ?>
                                    <?php
                                    edit_post_link(
                                        sprintf(
                                            wp_kses(
                                            /* translators: %s: Name of current post. Only visible to screen readers */
                                                __( 'Править', 'osp' ),
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
                            <div class="image image-left">
                                <?php osp_post_thumbnail(); ?>
                            </div>
                        </div>
                        <div class="col-8">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_field('staff_job'); ?></p>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>


			<?php endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
        </article><!-- #post-<?php the_ID(); ?> -->
	</main><!-- #main -->

<?php
get_footer();
