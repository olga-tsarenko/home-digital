<?php
/**
 * theme-tsarenko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme-tsarenko
 */

if (!function_exists('theme_tsarenko_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function theme_tsarenko_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on theme-tsarenko, use a find and replace
         * to change 'theme-tsarenko' to the name of your theme in all the template files.
         */
        load_theme_textdomain('theme-tsarenko', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'theme-tsarenko'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('theme_tsarenko_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add theme support for video post-formats.
        add_theme_support( 'post-formats', array( 'video'));
    }
endif;
add_action('after_setup_theme', 'theme_tsarenko_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_tsarenko_content_width()
{
    $GLOBALS['content_width'] = apply_filters('theme_tsarenko_content_width', 640);
}

add_action('after_setup_theme', 'theme_tsarenko_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_tsarenko_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'theme-tsarenko'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'theme-tsarenko'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'theme_tsarenko_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function theme_tsarenko_scripts()
{
    wp_enqueue_style('theme-tsarenko-style', get_stylesheet_uri());

    wp_enqueue_script('theme-tsarenko-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('theme-tsarenko-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    //Register jQuery
    wp_enqueue_script('jquery');


    //Register jquery.magnific-popup.js
    wp_enqueue_script('jquery.magnific-popup.js-file', get_template_directory_uri() . '/libs/magnific-popup/jquery.magnific-popup.js');

    //Rgister magnific-popup.css
    wp_register_style('magnific-styles', get_template_directory_uri() . '/libs/magnific-popup/magnific-popup.css', false, '0.1');
    wp_enqueue_style('magnific-styles');

    //Register main.js file
    wp_enqueue_script('main-js-file', get_template_directory_uri() . '/js/main.js');


    //Register main.css file
    $theme_uri = get_template_directory_uri();
    wp_register_style('theme-style', $theme_uri . '/css/main.css', false, '0.1');
    wp_enqueue_style('theme-style');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'theme_tsarenko_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function theme_prefix_setup()
{

    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 135,
        'flex-width' => true,
    ));

}

add_action('after_setup_theme', 'theme_prefix_setup');

function tsarenko_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('front page media', 'theme-tsarenko'),
        'id' => 'front-media',
        'description' => esc_html__('Add widgets here.', 'theme-tsarenko'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

}

add_action('widgets_init', 'tsarenko_widgets_init');


function enqueue_media_uploader()
{
    wp_enqueue_media();
    wp_enqueue_script("media-upload-demo", plugin_dir_url(__FILE__) . 'index.js', array("jquery"));
}

add_action("admin_enqueue_scripts", "enqueue_media_uploader");



function load_fonts()
{
    wp_register_style('et-googleFonts', 'https://fonts.googleapis.com/css?family=Basic" rel="stylesheet');
    wp_enqueue_style('et-googleFonts');
}

add_action('wp_print_styles', 'load_fonts');



function create_posttype()
{
    register_post_type('video_gallery',
        array(
            'labels' => array(
                'name' => __('video_gallery'),
                'singular_name' => __('video_gallery')
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'supports' => array('title', 'editor','thumbnail', 'post-formats')
        )
    );


}

add_action('init', 'create_posttype');


add_image_size('video-gallery', 410, 260, true);





