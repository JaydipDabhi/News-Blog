<?php

/**
 * News-Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package News-Blog
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function news_blog_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on News-Blog, use a find and replace
		* to change 'news-blog' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('news-blog', get_template_directory() . '/languages');

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'news-blog'),
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
			'news_blog_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'news_blog_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function news_blog_content_width()
{
	$GLOBALS['content_width'] = apply_filters('news_blog_content_width', 640);
}
add_action('after_setup_theme', 'news_blog_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function news_blog_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'news-blog'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'news-blog'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'news_blog_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function news_blog_scripts()
{
	wp_enqueue_style('news-blog-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('news-blog-style', 'rtl', 'replace');

	wp_enqueue_script('news-blog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'news_blog_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

function custom_enqueue_styles_and_scripts()
{
	// Get the theme directory URI
	$theme_dir = get_template_directory_uri();

	// Enqueue Styles
	wp_enqueue_style('main', $theme_dir . '/assets/css/main.css', array(), filemtime(get_template_directory() . '/assets/css/main.css'));
	wp_enqueue_style('bootstrap', $theme_dir . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), filemtime(get_template_directory() . '/assets/vendor/bootstrap/css/bootstrap.min.css'));
	wp_enqueue_style('bootstrap-icons', $theme_dir . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', array(), filemtime(get_template_directory() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css'));
	wp_enqueue_style('aos', $theme_dir . '/assets/vendor/aos/aos.css', array(), filemtime(get_template_directory() . '/assets/vendor/aos/aos.css'));
	wp_enqueue_style('glightbox', $theme_dir . '/assets/vendor/glightbox/css/glightbox.min.css', array(), filemtime(get_template_directory() . '/assets/vendor/glightbox/css/glightbox.min.css'));
	wp_enqueue_style('swiper-bundle', $theme_dir . '/assets/vendor/swiper/swiper-bundle.min.css', array(), filemtime(get_template_directory() . '/assets/vendor/swiper/swiper-bundle.min.css'));

	// Enqueue Scripts
	wp_enqueue_script('jquery'); // WordPress includes jQuery by default
	wp_enqueue_script('bootstrap', $theme_dir . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), filemtime(get_template_directory() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'), true);
	wp_enqueue_script('aos', $theme_dir . '/assets/vendor/aos/aos.js', array(), filemtime(get_template_directory() . '/assets/vendor/aos/aos.js'), true);
	wp_enqueue_script('glightbox', $theme_dir . '/assets/vendor/glightbox/js/glightbox.min.js', array(), filemtime(get_template_directory() . '/assets/vendor/glightbox/js/glightbox.min.js'), true);
	wp_enqueue_script('swiper-bundle', $theme_dir . '/assets/vendor/swiper/swiper-bundle.min.js', array(), filemtime(get_template_directory() . '/assets/vendor/swiper/swiper-bundle.min.js'), true);
	wp_enqueue_script('validate', $theme_dir . '/assets/vendor/php-email-form/validate.js', array(), filemtime(get_template_directory() . '/assets/vendor/php-email-form/validate.js'), true);
	wp_enqueue_script('typed-umd', $theme_dir . '/assets/vendor/typed.js/typed.umd.js', array(), filemtime(get_template_directory() . '/assets/vendor/typed.js/typed.umd.js'), true);
	wp_enqueue_script('purecounter-vanilla', $theme_dir . '/assets/vendor/purecounter/purecounter_vanilla.js', array(), filemtime(get_template_directory() . '/assets/vendor/purecounter/purecounter_vanilla.js'), true);
	wp_enqueue_script('noframework-waypoints', $theme_dir . '/assets/vendor/waypoints/noframework.waypoints.js', array(), filemtime(get_template_directory() . '/assets/vendor/waypoints/noframework.waypoints.js'), true);
	wp_enqueue_script('imagesloaded-pkgd', $theme_dir . '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js', array(), filemtime(get_template_directory() . '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js'), true);
	wp_enqueue_script('isotope-pkgd', $theme_dir . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array(), filemtime(get_template_directory() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js'), true);

	// Enqueue custom main.js (your custom JavaScript file)
	wp_enqueue_script('main', $theme_dir . '/assets/js/main.js', array('jquery', 'bootstrap', 'aos', 'glightbox', 'swiper-bundle'), filemtime(get_template_directory() . '/assets/js/main.js'), true);
}
add_action('wp_enqueue_scripts', 'custom_enqueue_styles_and_scripts');

add_filter('show_admin_bar', '__return_false');
