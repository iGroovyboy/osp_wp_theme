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
            <p class="center">&copy; <?php echo date('Y'); ?>, Кафедра ОБВ. Тема сайту: OSP <a href="https://github.com/iGroovyboy">Anton Babintsev</a></p>
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
                <li><a href="">Головна</a></li>
                <li><a href="">Новини</a></li>
                <li><a href="">Кафедра</a>
                    <ul class="submenu-1">
                        <li><a href="">Iстория кафедри</a></li>
                        <li><a href="">Склад</a></li>
                    </ul>
                </li>
                <li><a href="">Наука</a>
                    <ul class="submenu-1">
                        <li><a href="">Публикации</a></li>
                        <li><a href="">Конференции</a></li>
                        <li><a href="">Конференции</a></li>
                        <li><a href="">Конференции</a></li>
                        <li><a href="">Конференции</a></li>
                        <li><a href="">Конференции</a></li>
                        <li><a href="">Конференции</a></li>
                    </ul>
                </li>
                <li><a href="">Студенту</a></li>
                <li><a href="">Контакт</a></li>
            </ul>
    </nav>

</div><!-- #page -->

<script src="js/html5shiv.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/libs.min.js"></script>
<script src="js/main.js"></script>
<?php wp_footer(); ?>

</body>
</html>
