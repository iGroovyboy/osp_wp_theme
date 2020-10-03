<?php
/**
 * osp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package osp
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'osp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function osp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on osp, use a find and replace
		 * to change 'osp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'osp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'osp' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'osp_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'osp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function osp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'osp_content_width', 640 );
}
add_action( 'after_setup_theme', 'osp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function osp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'osp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'osp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'osp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function osp_scripts() {
	wp_enqueue_style( 'osp-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'osp-style', 'rtl', 'replace' );

	wp_enqueue_script( 'osp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'osp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Опции',
		'menu_title'	=> 'Опции',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'position'      => false,
//		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Настройки Главной страницы',
		'menu_title'	=> 'Главная',
		'menu_slug' 	=> 'theme-settings-home',
		'parent_slug'	=> 'theme-settings',
        'position'      => false,
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Дополнительно',
		'menu_title'	=> 'Дополнительно',
		'menu_slug' 	=> 'theme-settings-extra',
		'parent_slug'	=> 'theme-settings',
        'position'      => false,
	));

}

function prepareMenuArray($menu) {
    $arr = [];
    foreach ( $menu as $i => $item ) {
        $arr[ $item->ID ]['id']               = (int)$item->ID;
        $arr[ $item->ID ]['title']            = $item->title;
        $arr[ $item->ID ]['url']              = $item->url;
        $arr[ $item->ID ]['menu_item_parent'] = (int)$item->menu_item_parent;
    }
    foreach ( $arr as $id => $item ) {
        if( $item['menu_item_parent'] !== 0) {
            $arr[$item['menu_item_parent']]['sub-menu'][$id] = $item;
            unset($arr[$id]);
        }
    }
    //3rd level
    foreach ( $arr as $id => $item ) {
        if ( ! isset( $item['id'] ) ) {
            $parent_id = $id;
            $menu = $item['sub-menu'];


            foreach ($arr as $y => $top_item) {
                if(isset($top_item['sub-menu']) ) {
                    $sub_items = array_keys($top_item['sub-menu']);
                    if(in_array($parent_id, $sub_items)){
                        $arr[$y]['sub-menu'][$parent_id]['sub-menu'] = $menu;

                    }
                }
            }
            $arr[ $item['menu_item_parent'] ]['sub-menu'][ $id ] = $item;
            unset( $arr[ $id ], $arr[ '' ] );
        }
    }

    return $arr;
}