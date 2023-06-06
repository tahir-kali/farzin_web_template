<?php

/**
 * functions.php
 *
 * The theme's functions and definitions.
 */
/**
 * 1.0 - Define constants. Current Version number & Theme Name.
 */
define('SEOCIFY_THEME', 'Seocify WordPress Theme');
define('SEOCIFY_VERSION', '3.1');

define('SEOCIFY_THEMEROOT', get_template_directory_uri());
define('SEOCIFY_THEMEROOT_DIR', get_parent_theme_file_path());
define('SEOCIFY_IMAGES', SEOCIFY_THEMEROOT . '/assets/images');
define('SEOCIFY_IMAGES_DIR', SEOCIFY_THEMEROOT_DIR . '/assets/images');
define('SEOCIFY_IMAGES_URI', SEOCIFY_THEMEROOT . '/assets/images');
define('SEOCIFY_CSS', SEOCIFY_THEMEROOT . '/assets/css');
define('SEOCIFY_CSS_DIR', SEOCIFY_THEMEROOT_DIR . '/assets/css');
define('SEOCIFY_SCRIPTS', SEOCIFY_THEMEROOT . '/assets/js');
define('SEOCIFY_SCRIPTS_DIR', SEOCIFY_THEMEROOT_DIR . '/assets/js');
define('SEOCIFY_PHPSCRIPTS', SEOCIFY_THEMEROOT . '/assets/php');
define('SEOCIFY_PHPSCRIPTS_DIR', SEOCIFY_THEMEROOT_DIR . '/assets/php');
define('SEOCIFY_INC', SEOCIFY_THEMEROOT_DIR . '/inc');
define('SEOCIFY_CUSTOMIZER_DIR', SEOCIFY_INC . '/customizer/');
define('SEOCIFY_SHORTCODE_DIR', SEOCIFY_INC . '/shortcode/');
define('SEOCIFY_SHORTCODE_DIR_STYLE', SEOCIFY_INC . '/shortcode/style');
define('SEOCIFY_REMOTE_CONTENT', esc_url('http://content.xpeedstudio.com/demo-content/seocify'));
define('SEOCIFY_PLUGINS_DIR', SEOCIFY_INC . '/includes/plugins');
define('SEOCIFY_REMOTE_URL', esc_url(SEOCIFY_REMOTE_CONTENT . '/plugins'));
define('SEOCIFY_UNYSON_URL', esc_url('https://demo.xpeedstudio.com/global-plugin'));

/**
 * ----------------------------------------------------------------------------------------
 * 3.0 - Set up the content width value based on the theme's design.
 * ----------------------------------------------------------------------------------------
 */
if (!isset($content_width)) {
    $content_width = 800;
}

/**
 * ----------------------------------------------------------------------------------------
 * 4.0 - Set up theme default and register various supported features.
 * ----------------------------------------------------------------------------------------
 */
if (!function_exists('seocify_setup')) {

    function seocify_setup()
    {

        /**
         * Make the theme available for translation.
         */
        load_theme_textdomain('seocify', get_template_directory() . '/languages');
        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";

        if (is_readable($locale_file)) {
            require_once $locale_file;
        }

        /**
         * Add support for post formats.
         */
        add_theme_support('post-formats', array('standard', 'gallery', 'video', 'audio')
        );

        /**
         * Add support for automatic feed links.
         */
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('woocommerce');
        add_theme_support('title-tag');
        /**
         * Add support for post thumbnails.
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(750, 465, array('center', 'center')); // Hard crop center center

        /**
         * Register nav menus.
         */
        register_nav_menus(
            array(
                'primary' => esc_html__('Primary Menu', 'seocify'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ));

        /*
         * Enable support for wide alignment class for Gutenberg blocks.
         */
        add_theme_support('align-wide');

        /* //un-comment below lines to convert fa4 icon to fa5 icon.

        //*/
        /**
         * Converting FA4 icon to FA5 icon
         *
         * Change namespace
         * Change key name
         * Put new keys into keys method
         * Put new icon conversion rule in
         *
         * theme_mods_seocify
         * theme_mods_seocify-child
         *
         * temporarily commented the below code
         * please uncomment it to see it in action.
         */

        $converter = new \Seocify\Converter();
        $converter->init();
    }

    add_action('after_setup_theme', 'seocify_setup');
}

/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - theme INC.
 * ----------------------------------------------------------------------------------------
 */
include_once get_template_directory() . '/extra/converter.php';
include_once get_template_directory() . '/inc/init.php';
include_once get_template_directory() . '/inc/mav-menu-custom-fields.php';

add_action('admin_menu', 'seocify_remove_theme_settings', 999);
function seocify_remove_theme_settings()
{
    remove_submenu_page('themes.php', 'fw-settings');
}

add_action('enqueue_block_editor_assets', 'seocify_action_enqueue_block_editor_assets');
function seocify_action_enqueue_block_editor_assets()
{
    wp_enqueue_style('seocify-fonts', seocify_google_fonts_url(['Nunito:400,500,600,700,800,900']), null, SEOCIFY_VERSION);
    wp_enqueue_style('seocify-gutenberg-editor-font-awesome-styles', SEOCIFY_CSS . '/font-awesome.min.css', null, SEOCIFY_VERSION);
    wp_enqueue_style('seocify-gutenberg-editor-customizer-styles', SEOCIFY_CSS . '/gutenberg-editor-custom.css', null, SEOCIFY_VERSION);
    wp_enqueue_style('seocify-gutenberg-editor-styles', SEOCIFY_CSS . '/gutenberg-custom.css', null, SEOCIFY_VERSION);
    //wp_enqueue_style( 'seocify-gutenberg-blog-styles', SEOCIFY_CSS . '/blog.css', null, SEOCIFY_VERSION );
}

function seocify_body_classes($classes)
{

    if (is_active_sidebar('sidebar-1') || (class_exists('Woocommerce') && !is_woocommerce()) || class_exists('Woocommerce') && is_woocommerce() && is_active_sidebar('shop-sidebar')) {
        $classes[] = 'sidebar-active';
    } else {
        $classes[] = 'sidebar-inactive';
    }
    return $classes;
}
add_filter('body_class', 'seocify_body_classes');

add_action('wp_head', function () {
    echo '
		<script type="text/javascript">
			var elementskit_section_parallax_data = {};
			var elementskit_plugin_url = "' . SEOCIFY_THEMEROOT . '/"
		</script>
	';
});

// include_once(SEOCIFY_INC . '/controls.php');

/*
CHANGE SLUGS OF CUSTOM POST TYPES
 */
if (!function_exists('seocify_case_study_slug')) {
    function seocify_case_study_slug($args, $post_type)
    {

        /*item post type slug*/
        if ('case_study' === $post_type) {
            $args['rewrite']['slug'] = 'case-study';
        }

        return $args;
    }
    add_filter('register_post_type_args', 'seocify_case_study_slug', 10, 2);
}

// Optimization work
// for optimization dequeue styles
add_action('wp_enqueue_scripts', 'seocify_remove_unused_css_files', 9999);
function seocify_remove_unused_css_files()
{
    $fontawesome = seocify_option('optimization_fontawesome_enable', 'yes');
    $blocklibrary = seocify_option('optimization_blocklibrary_enable', 'yes');
    $elementoricons = seocify_option('optimization_elementoricons_enable', 'yes');
    $elementkitsicons = seocify_option('optimization_elementkitsicons_enable', 'yes');
    $socialicons = seocify_option('optimization_socialicons_enable', 'yes');
    $dashicons = seocify_option('optimization_dashicons_enable', 'yes');
    $gutenbergcss = seocify_option('optimization_gutenberg_enable', 'yes');

    wp_dequeue_style('fw-ext-builder-frontend-grid');
    wp_deregister_style('fw-ext-builder-frontend-grid');
    wp_dequeue_style(' fw-ext-forms-default-styles');
    wp_deregister_style('fw-ext-forms-default-styles');

    // dequeue fontawesome icons file
    if ($fontawesome == 'no') {
        wp_dequeue_style('font-awesome');
        wp_deregister_style('font-awesome');
        wp_dequeue_style('font-awesome-5-all');
        wp_deregister_style('font-awesome-5-all');
        wp_dequeue_style('font-awesome-4-shim');
        wp_deregister_style('font-awesome-4-shim');
        wp_dequeue_style('fontawesome-five-css');
        wp_dequeue_style('yith-wcwl-font-awesome');
        wp_deregister_style('yith-wcwl-font-awesome');
        wp_dequeue_script('font-awesome-4-shim');
    }

    // dequeue gutenberg file
    if ($gutenbergcss == 'no') {
        wp_dequeue_style('seocify-gutenberg-custom');
        wp_deregister_style('seocify-gutenberg-custom');
    }

    // dequeue block-library file
    if ($blocklibrary == 'no') {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-blocks-style');
        wp_deregister_style('wc-blocks-style');
        wp_dequeue_script('jquery-blockui');
        wp_deregister_script('jquery-blockui');
    }

    if ($elementkitsicons == 'no') {
        wp_dequeue_style('elementor-icons-ekiticons');
        wp_deregister_style('elementor-icons-ekiticons');
    }

    if ($elementoricons == 'no') {
        // Don't remove it in the backend
        if (is_admin() || current_user_can('manage_options')) {
            return;
        }
        wp_dequeue_style('elementor-animations');
        wp_dequeue_style('elementor-icons');
        wp_deregister_style('elementor-icons');
    }

    if ($dashicons == 'no') {
        // Don't remove it in the backend
        if (is_admin() || current_user_can('manage_options')) {
            return;
        }
        wp_dequeue_style('dashicons');
    }

}

/* disable option for elementskit icons */
add_action('elementskit_lite/after_loaded', function () {
    add_filter('elementor/icons_manager/additional_tabs', function ($icons) {
        $elementkitsicons = seocify_option('optimization_elementkitsicons_enable', 'yes');

        if ($elementkitsicons == 'no') {
            unset($icons['ekiticons']);
        }

        return $icons;
    });
});

/* disable option for font awesome icons from elementor editor */
add_action('elementor/frontend/after_register_styles', function () {
    $fontawesome = seocify_option('optimization_fontawesome_enable', 'yes');
    if ($fontawesome == 'no') {
        foreach (['solid', 'regular', 'brands'] as $style) {
            wp_deregister_style('elementor-icons-fa-' . $style);
        }
    }

}, 20);

/* disable option for font awesome icons from elementor editor */
add_filter('elementor/icons_manager/native', function ($icons) {
    $fontawesome = seocify_option('optimization_fontawesome_enable', 'yes');
    if ($fontawesome == 'no') {
        unset($icons['fa-regular']);
        unset($icons['fa-solid']);
        unset($icons['fa-brands']);
    }

    return $icons;
});

//meta description
function seocify_meta_description()
{
    global $post;
    if (is_singular()) {
        $des_post = $post->post_title;
        echo '<meta name="description" content="' . $des_post . '" />' . "\n";
    }
    if (is_home()) {
        echo '<meta name="description" content="' . get_bloginfo("description") . '" />' . "\n";
    }
    if (is_archive()) {
        echo '<meta name="description" content="' . get_bloginfo("description") . '" />' . "\n";
    }
}
add_action('wp_head', 'seocify_meta_description');