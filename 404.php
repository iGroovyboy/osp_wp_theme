<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package osp
 */

get_header();
?>

	<main>
        <article id="error-404">
            <section class="hero">
                <div class="container">
                    <h1 class="page-title">
                        <?php the_field('error_404_title', 'option');?>
                    </h1>
                </div>
            </section>

            <section class="bg-odd">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="widget widget_categories">
                                <h2 class="widget-title"><?php esc_html_e( 'Категорії', 'osp' ); ?></h2>
                                <ul>
                                    <?php
                                    wp_list_categories(
                                        array(
                                            'orderby'    => 'count',
                                            'order'      => 'DESC',
                                            'show_count' => 0,
                                            'title_li'   => '',
                                            'number'     => 10,
                                        )
                                    );
                                    ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-8">
                            <?php get_search_form(); ?>
                            <p><?php the_field('error_404_text', 'option');?></p>
                        </div>
                    </div>
                </div>
            </section>

        </article>
	</main><!-- #main -->

<?php
get_footer();
