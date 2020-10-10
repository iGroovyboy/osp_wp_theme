<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package osp
 */

?>
<section class="hero">
    <div class="container">
        <h1 class="page-title">
            <?php
            /* translators: %s: search query. */
            printf( esc_html__( 'Пошук нічого не дав: %s', 'osp' ), '<span>' . get_search_query() . '</span>' );
            ?>
        </h1>
    </div>
</section>

<section class="bg-odd">
    <div class="container">
        <div class="row">
            <?php get_search_form();?>
        </div>
    </div>

</section><!-- .no-results -->
