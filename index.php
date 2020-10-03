<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package osp
 */

get_header();
?>

	<main>
        <section class="hero center">
            <div class="bg">
                <div class="colored-overlay"></div>
                <div class="clouds"></div>
            </div>
            <div class="container">
                <div class="text">
                    <h5 class="kafedra">Кафедра</h5>
                    <h5 class="obv">ОБВ</h5>
                    <h1 class="kafedra-fullname">Організація Будівельного Виробництва</h1>
                </div>
            </div>
        </section>

        <section class="bg-odd">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <h2><?php the_field('counter_title', 'option'); ?></h2>
                    </div>
                    <div class="col-8"><?php the_field('counter_main_description', 'option'); ?></div>
                </div>
                <?php
                $counters = get_field('counter_repeater', 'option');
                if ( $counters ) :
                ?>
                <div class="row">
                    <ul class="stats center">
                        <?php foreach ( $counters as $counter ) : ?>
                        <li>
                            <div class="stats-number"><?php echo $counter['counter_item_number'];?></div>
                            <div class="stats-descr"><?php echo $counter['counter_item_description'];?></div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif;?>
            </div>
        </section>

        <section class="bg-even">
            <div class="container center">
                <h2>Услуги кафедры</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="row center">
                    <div class="col-4"><h5>Подзаголовок</h5></div>
                    <div class="col-4"><h5>Подзаголовок</h5></div>
                    <div class="col-4"><h5>Подзаголовок</h5></div>
                </div>
            </div>
        </section>

        <section class="bg-odd center">
            <div class="container">
                <h2>Свяжитесь с нами</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="row center">
                    <button class="hvr-shutter-out-vertical btn-blue">Контакт</button>
                </div>
            </div>
        </section>

        <section class="bg-city1">
            <div class="container">
                <h2>Отзывы</h2>
                <div class="row">
                    <ul class="reviews slider-single">
                        <li>
                            <img class="foto" src="https://picsum.photos/300/400">
                            <div class="review-text">
                                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                                <p class="name">Lev Tolstoy</p>
                            </div>
                        </li>
                        <li>
                            <img class="foto" src="">
                            <div class="review-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <p class="name">Lev Tolstoy</p>
                            </div>
                        </li>
                        <li>
                            <img class="foto" src="https://picsum.photos/200/400">
                            <div class="review-text">
                                <p> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p class="name">Lev Tolstoy</p>
                            </div>
                        </li>
                        <li>
                            <img class="foto" src="">
                            <div class="review-text">
                                <p> Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <p class="name">Lev Tolstoy</p>
                            </div>
                        </li>
                        <li>
                            <img class="foto" src="https://picsum.photos/1920/1080">
                            <div class="review-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <p class="name">Lev Tolstoy</p>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </section>


        <section class="bg-odd">
            <div class="container">
                <h2>Персонал кафедри</h2>
                <div class="row">
                    <ul class="team slider">
                        <li >
                            <a class="foto " href=""><img src="https://picsum.photos/200/300"></a>
                            <a class="name" href="">Lev Tolstoy 1</a>
                            <p>Manager</p>
                        </li>
                        <li class="hvr-shutter-out-vertical">
                            <a class="foto" href=""><img src="https://picsum.photos/300/200"></a>
                            <a class="name" href="">Lev Tolstoy 2</a>
                            <p>Manager</p>
                        </li>
                        <li>
                            <a class="foto" href=""><img src="https://picsum.photos/300/300"></a>
                            <a class="name" href="">Lev Tolstoy 3</a>
                            <p>Manager</p>
                        </li>
                        <li>
                            <a class="foto" href=""><img src="https://picsum.photos/300/400"></a>
                            <a class="name" href="">Lev Tolstoy 4</a>
                            <p>Manager</p>
                        </li>
                        <li>
                            <a class="foto" href=""><img src="https://picsum.photos/400/300"></a>
                            <a class="name" href="">Lev Tolstoy 5</a>
                            <p>Manager</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="bg-grey last">
            <div class="container">
                <ul class="partners slider-4">
                    <li><a href=""><img src="https://zakrademos.com/professional/wp-content/uploads/sites/46/2020/04/tlagency.png"></a></li>
                    <li><a href=""><img src="https://zakrademos.com/professional/wp-content/uploads/sites/46/2020/04/tlagency.png"></a></li>
                    <li><a href=""><img src="https://zakrademos.com/professional/wp-content/uploads/sites/46/2020/04/tlagency.png"></a></li>
                    <li><a href=""><img src="https://zakrademos.com/professional/wp-content/uploads/sites/46/2020/04/tlagency.png"></a></li>
                    <li><a href=""><img src="https://zakrademos.com/professional/wp-content/uploads/sites/46/2020/04/tlagency.png"></a></li>
                    <li><a href=""><img src="https://zakrademos.com/professional/wp-content/uploads/sites/46/2020/04/tlagency.png"></a></li>
                    <li><a href=""><img src="https://zakrademos.com/professional/wp-content/uploads/sites/46/2020/04/tlagency.png"></a></li>
                    <li><a href=""><img src="https://zakrademos.com/professional/wp-content/uploads/sites/46/2020/04/tlagency.png"></a></li>
                </ul>
            </div>
        </section>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
