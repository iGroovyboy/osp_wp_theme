<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package osp
 */

?>

    <footer>
        <div class="container">
            <p class="center">&copy; <?php echo date('Y'); ?>, Кафедра ОБВ. Тема сайту: OSP. Дизайн&розробка <a href="https://github.com/iGroovyboy">Anton Babintsev</a></p>
        </div>
    </footer>

    <!-- <div class="burger-place"> -->
    <button class="hamburger hamburger--stand" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>

    <!-- </div> -->
    <div class="shadow"></div>
    <nav class="mobile">
        <div class="row underline">
            <button>+</button>
        </div>
        <ul class="menu">

            <?php
            $main_menu = prepareMenuArray( wp_get_nav_menu_items( 'main-menu') );
            echo getMenuRender( $main_menu );
            ?>
        </ul>
    </nav>

</div><!-- #page -->

<script src="<?php echo get_template_directory_uri()?>/js/html5shiv.min.js"></script>
<script src="<?php echo get_template_directory_uri()?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri()?>/js/libs.min.js"></script>
<script src="<?php echo get_template_directory_uri()?>/js/main.js"></script>
<?php wp_footer(); ?>

</body>
</html>
