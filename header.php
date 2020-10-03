<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package osp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Arimo:ital,wght@0,400;0,700;1,400;1,700&family=Rubik+Mono+One&&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/style.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>


    <div id="home">
        <header>
            <div class="container row">
                <div class="logo"><?php the_custom_logo();?></div>
                <nav class="desktop">
                    <ul class="menu">
                        <?php
                        $main_menu = prepareMenuArray(wp_get_nav_menu_items( 'main-menu'));
                        $main_menu_html = "";
                        foreach ($main_menu as $id => $top_item) {
                            $main_menu_html .= "<li>";
                                $url   = $top_item['url'];
                                $title = $top_item['title'];
                            $main_menu_html .= "<a href='$url' class='hvr-underline-from-center'>$title</a>";

//                            if( isset( $top_item['sub-menu'] ) ){
//                                $main_menu_html .= "<ul class='sub-menu'>";
//                                foreach ( $top_item['sub-menu'] as $sub_menu2 ) {
//                                    $main_menu_html .= "<li>";
//                                        $url2   = $sub_menu2['url'];
//                                        $title2 = $sub_menu2['title'];
//                                    $main_menu_html .= "<a href='$url2'>$title2</a>";
//                                }
//                                $main_menu_html .= "</ul>";
//                            }

                            $main_menu_html .= "<li>";
                        }

                        echo $main_menu_html;
                        ?>
                    </ul>
                </nav>



            </div>
        </header>



