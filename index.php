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

get_header('home');
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

        <?php if( get_field('services_enabled', 'option') ) : ?>
        <section class="bg-even">
            <div class="container center">
                <h2><?php the_field('services_title', 'option');?></h2>
                <div class="decription">
                    <?php echo get_field('services_main_descr', 'option');?>
                </div>
                <?php if( !empty(get_field('services_repeater', 'option')) ) : ?>
                <div class="row center">
                    <?php foreach ( get_field('services_repeater', 'option') as $data ) : ?>
                    <div class="col-4">
                        <h5><?php echo $data['services_repeater_title'];?></h5>
                        <div class="justified"><?php echo $data['services_repeater_text'];?></div>
                    </div>
                    <?php endforeach;?>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>

        <?php if( get_field('contact_enabled', 'option') ) : ?>
        <section class="bg-odd center">
            <div class="container">
                <h2><?php the_field('contact_title', 'option') ;?></h2>
                <p><?php the_field('contact_descr', 'option') ;?></p>
                <div class="row center">
                    <button onclick="location.href='<?php echo get_field('contact_url', 'option');?>'" href="" class="hvr-shutter-out-vertical btn-blue">Контакт</button>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php $news = getPostsByCat('news', 5, null, 'date');?>
        <?php if( get_field('news_enabled', 'option') && ! empty( $news ) ) : ?>
        <section class="bg-even bg-news">
<!--            <div class="bg">-->
<!--                <div class="colored-overlay"></div>-->
<!--            </div>-->
            <div class="container">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8 latest">
                        <h2><a href="/news/">Новини</a></h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <ul class="news">
                            <?php for ( $i = 2; $i <= count( $news ); $i++ ) : ?>
                                <li>
                                    <a href="<?php echo $news[$i]['permalink'];?>"><?php echo $news[$i]['title'];?></a>
                                </li>
                            <?php endfor;?>
                        </ul>
                    </div>
                    <div class="col-8 latest">
                        <h3><?php echo $news[1]['title'];?></h3>
                        <div class="image">
                            <?php echo $news[1]['img'];?>
                        </div>
                        <div>
                            <?php echo $news[1]['excerpt'];?>
                            <p class="right"><a href="<?php echo $news[1]['permalink'];?>">Далі</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>


        <?php
        $reviews_count = get_field('reviewes_count', 'option');
        $reviews = getPostsByCat('reviews', $reviews_count);
        if ( get_field( 'reviewes_enabled', 'option' ) && ! empty( $reviews ) ) : ?>
        <section class="bg-reviews">
            <div class="bg">
                <div class="colored-overlay"></div>
            </div>
            <div class="container section">
                <h2>Вiдгуки</h2>
                <div class="row">
                    <ul class="reviews slider-single">
                        <?php foreach ( $reviews as $review ) : ?>
                        <li>
                            <?php echo $review['img'];?>
                            <div class="review-text">
                                <?php $reviews_len = get_field('reviewes_length', 'option');
                                if( strlen($review['content']) < 750){
                                    echo $review['content'];
                                } else {
                                    echo $review['excerpt'];
                                }
                                ?>
                                <p class="name"><?php echo $review['title'];?></p>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php
        $staff = getPostsByCat('staff', 0, ['staff_job', 'staff_profile']);
        if ( get_field( 'staff_enabled', 'option' ) && ! empty( $staff ) ) : ?>
        <section class="bg-odd">
            <div class="container">
                <h2><a href="/kafedra/staff/">Персонал кафедри</a></h2>
                <div class="row">
                    <ul class="team slider">
                        <?php foreach ( $staff as $person ) : ?>
                        <li>
                            <p class="foto"><?php echo $person['img'];?></p>
                            <p class="name"><?php echo $person['title'];?></p>
                            <p><?php echo $person['staff_job'];?></p>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php
        $partners = getPostsByCat('partners', 0, ['partner_site']);
        if( get_field('partners_enabled', 'option') && ! empty( $partners ) ) : ?>
        <section class="bg-grey last">
            <div class="container">
                <ul class="partners slider-4">
                    <?php foreach ( $partners as $partner ) : ?>
                    <li>
                        <a href="<?php echo $partner['partner_site'];?>" target="_blank" alt="<?php echo $partner['title'];?>"><?php echo $partner['img'];?></a>
                    </li>
                <?php endforeach;?>
                </ul>
            </div>
        </section>
        <?php endif; ?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
