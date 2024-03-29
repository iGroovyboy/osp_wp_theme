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

function getPostsByCat( $category, $count, $fields = null, $orderby = 'none', $order = 'DESC' ) {
    $the_query = new WP_Query( array(
        'category_name'  => $category,
        'posts_per_page' => $count,
        'order'          => $order,
        'orderby'        => $orderby, // title | date | modified
    ) );
    $posts = [];

    if ( $the_query->have_posts() ) {
        $counter = 0;
        while ( $the_query->have_posts() ) {
            $counter++;
            $the_query->the_post();

            $id = get_the_ID();
            $current_post_object = get_post($id);

            $posts[ $counter ] = [
                'id'        => $id,
                'title'     => $current_post_object->post_title,
                'img'       => get_the_post_thumbnail( $id, 'full', [ 'class' => 'foto' ] ),
                'content'   => $current_post_object->post_content,
                'excerpt'   => $current_post_object->post_excerpt ?: osp_excerpt($current_post_object->post_content),
                'url'       => $current_post_object->guid,
                'permalink' => get_permalink( $id  ),
            ];

            if ( ! empty( $fields ) ) {
                foreach ( $fields as $field ) {
                    $posts[ $counter ][ $field ] = get_field( $field );
                }
            }
        }
    }

    /* Restore original Post Data */
    wp_reset_postdata();
    return $posts;
}

function getMenuRender( $menu_items ) {
    $main_menu_html = "";
    foreach ($menu_items as $id => $top_item) {
        $main_menu_html .= "<li>";
            $url   = $top_item['url'];
            $title = $top_item['title'];
        $main_menu_html .= "<a href='$url' class='hvr-underline-from-center'>$title</a>";

        //submenu-2
        if( isset( $top_item['sub-menu'] ) ){
            $main_menu_html .= "<ul class='sub-menu'>";
            foreach ( $top_item['sub-menu'] as $sub_menu2 ) {
                $main_menu_html .= "<li><div class='left-block'></div>";
                    $url2   = $sub_menu2['url'];
                    $title2 = $sub_menu2['title'];
                $main_menu_html .= "<a href='$url2'>$title2</a>";

                 //submenu-3
                if( isset( $sub_menu2['sub-menu'] ) ) {
                    $main_menu_html .= "<ul class='sub-menu-2'>";
                    foreach ( $sub_menu2['sub-menu'] as $sub3_menu ) {
                        $main_menu_html .= "<li><div class='left-block'></div>";
                            $url3           = $sub3_menu['url'];
                            $title3         = $sub3_menu['title'];
                        $main_menu_html .= "<a href='$url3'>$title3</a>";

                        $main_menu_html .= "</li>";
                    }
                    $main_menu_html .= "</ul>";
                }
                $main_menu_html .= "</li>";
            }
            $main_menu_html .= "</ul>";
        }

        $main_menu_html .= "</li>";
    }
    return $main_menu_html;
}

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Register blocks
		acf_register_block_type(array(
			'name'				=> 'osp_section',
			'title'				=> 'ОСП Раздел',
			'description'		=> 'Блок контента, отделенные цветом и колонками.',
			'category'			=> 'layout',
			'mode'				=> 'preview',
			'supports'			=> array(
				'align' => true,
				'mode' => false,
				'__experimental_jsx' => true
			),
			'render_template' => 'template-parts/block-section.php'
		));

        acf_register_block_type(array(
			'name'				=> 'osp_image',
			'title'				=> 'ОСП Картинка',
			'description'		=> 'Блок изобрежения с вертикальным односторонним обрамлением, или без.',
			'category'			=> 'layout',
			'mode'				=> 'preview',
			'supports'			=> array(
				'align' => true,
				'mode' => false,
				'__experimental_jsx' => true
			),
			'render_template' => 'template-parts/block-image.php'
		));

    }
}

add_action('template_redirect', function () {
    global $post;

    $redir_data = get_field('redir_src_repeater', 'option');

    foreach ( $redir_data as $data ) {
        $cat_ids = array_values( $data['redir_src_category'] );
        $redir_path = $data['redir_destc_flexible'][0]['redir_dest_link'] ?? $data['redir_destc_flexible'][0]['redir_dest_post'];

        if ( is_single( $post->ID ) && has_category( $cat_ids, $post ) ) {
            wp_redirect( $redir_path, 301 );
            exit;
        }
    }

});

function osp_excerpt($excerpt, $limit = 200, $points = '..'){
	$excerpt = strip_tags( $excerpt );
	if (strlen($excerpt) > $limit) {
		$limit_excerpt = strpos( $excerpt, ' ', $limit );
		$limit = $limit_excerpt ? $limit_excerpt : strlen( $excerpt );

		return mb_substr($excerpt, 0, $limit, "utf-8").' '.$points;
	}

	return $excerpt;
}

////wrap unsectioned blocks in section..
//add_filter( 'render_block', function( $block_content, $block ) {
//    dump('----------------------------------------<br>',$block_content, $block);
//
////    // Target core/* and core-embed/* blocks.
////    if ( preg_match( '~^core/|core-embed/~', $block['blockName'] ) ) {
////       $block_content = sprintf( '<div class="some__class">%s</div>', $block_content );
////    }
//    return $block_content;
//}, PHP_INT_MAX - 1, 2 );