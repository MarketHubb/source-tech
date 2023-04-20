<?php
require_once 'includes/helpers.php';
require_once 'includes/content.php';
require_once 'includes/buy.php';
require_once 'includes/components.php';
require_once 'includes/foxycart.php';
require_once 'includes/ajax.php';

/**
 * something
 *
 * Source Tech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Source_Tech
 */

if ( ! function_exists( 'source_tech_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function source_tech_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Source Tech, use a find and replace
		 * to change 'source-tech' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'source-tech', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'source-tech' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'source_tech_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'source_tech_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function source_tech_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'source_tech_content_width', 640 );
}
add_action( 'after_setup_theme', 'source_tech_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function source_tech_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'source-tech' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'source-tech' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget - Left', 'source-tech' ),
		'id'            => 'widget-header-left',
		'description'   => esc_html__( 'Add widgets here.', 'source-tech' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget - Right', 'source-tech' ),
		'id'            => 'widget-header-right',
		'description'   => esc_html__( 'Add widgets here.', 'source-tech' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'source-tech' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Add widgets here.', 'source-tech' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'source-tech' ),
		'id'            => 'footer-widgets',
		'description'   => esc_html__( 'Widgets will automatically be placed in columns.', 'source-tech' ),
		'before_widget' => '<aside id="%1$s" class="widget item %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'source_tech_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function source_tech_scripts()
{


//    wp_enqueue_style( 'bootstrap-styles', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style('source-tech-style', get_stylesheet_uri());
    wp_enqueue_style('ri_custom_styles', get_stylesheet_directory_uri() . '/css/ri-styles.css');
    wp_enqueue_style('ri_blog_styles', get_stylesheet_directory_uri() . '/css/ri-blog-styles.css');
    wp_register_script('ri-blog-scripts', get_template_directory_uri() . '/js/ri-blog-scripts.js', array(), '', true);
    wp_enqueue_style('ri_web_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap');
    wp_enqueue_style('ri_web_fonts_roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
    wp_enqueue_style('fontello', get_template_directory_uri() . '/css/fontello.css');
    wp_enqueue_script('source-tech-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('source-tech-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
    wp_register_script('ri_custom_global_scripts', get_template_directory_uri() . '/js/ri-custom-global-scripts.js', array(), '', true);
    wp_register_script('ri_custom_product_scripts', get_template_directory_uri() . '/js/ri-custom-product-scripts.js', array(), '', true);
    wp_register_script('ri_custom_rfq_scripts', get_template_directory_uri() . '/js/ri-custom-rfq-scripts.js', array(), '', true);
    wp_enqueue_script('ri_custom_global_scripts');
    wp_register_style('font-awesome-pro', get_stylesheet_directory_uri() . '/fontawesome/css/all.css');
    wp_register_style('model-styles', get_stylesheet_directory_uri() . '/css/model-styles.css');
    wp_register_style('home-styles', get_stylesheet_directory_uri() . '/css/home.css');
//    wp_register_script( 'bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
    wp_register_script('model-scripts', get_template_directory_uri() . '/js/model-scripts.js', array('bootstrap-scripts'), '', true);

    if (is_page([3323, 3295])) {
        wp_enqueue_script('foxycart-checkout', get_template_directory_uri() . '/css/foxycart-checkout.css');
    }
    if (is_singular('product')) {
        wp_enqueue_script('ri_custom_product_scripts');
    }

    if (is_singular('post')) {
        wp_enqueue_style('ri-blog-styles');
        wp_enqueue_script('ri-blog-scripts');
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    // Demo model page
    if (is_page(1574) || is_singular('servers') || is_singular('networking') || is_singular('storage')) {
        wp_enqueue_style('fontawesome6-styles', get_stylesheet_directory_uri() . '/fontawesome6/css/all.min.css');
        wp_enqueue_style('model-styles');
        wp_enqueue_script('model-scripts');
        wp_enqueue_script('bootstrap-scripts');
    }

    // All custom pages / Divi-built pages
    if (is_page(816) || is_page(1372)) {
        wp_enqueue_style('ri_theme_override', get_stylesheet_directory_uri() . '/css/ri-theme-override.css');
    }

    if (is_page(726) || is_page(1234)) {
        wp_enqueue_style('ri_custom_rfq_styles', get_stylesheet_directory_uri() . '/css/ri-rfq-styles.css');
        wp_enqueue_script('ri_custom_rfq_scripts');
    }
    if (is_product_category() || is_singular('servers')) {
        wp_enqueue_style('ri-product-cat-styles', get_stylesheet_directory_uri() . '/css/ri-product-cat-styles.css');
    }
    if (is_front_page()) {
        wp_enqueue_style( 'home-styles', get_stylesheet_directory_uri() . '/css/home.css' );
        wp_enqueue_script( 'bootstrap-scripts' );
    }
	if (!is_admin()) {
        wp_enqueue_style('bootstrap-styles', get_stylesheet_directory_uri() . '/bootstrap5/css/bootstrap.min.css', [], '5.1.0');
        wp_enqueue_script('bootstrap-scripts', get_stylesheet_directory_uri() . '/bootstrap5/js/bootstrap.bundle.js', [], '5.1.0', true);
		wp_enqueue_style('font-awesome-pro');
		wp_enqueue_style('ri_web_fonts_roboto');
        wp_enqueue_style( 'ri-nav-styles', get_stylesheet_directory_uri() . '/css/ri-nav.css' );
	}
	if (is_home()) {
        wp_enqueue_style( 'ri-blog-list-styles', get_stylesheet_directory_uri() . '/css/ri-blog-list.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'source_tech_scripts', 1);

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Utility function for generating widget columns
 */
function widget_count( $widget_area_id ) {
    $widget_areas = wp_get_sidebars_widgets();

    if( empty( $widget_areas[$widget_area_id] ) ) {
        return false;
    } else {
        return count( $widget_areas[$widget_area_id] );
    }
}

//region WordPress Editor
if (is_admin()) {
    function jba_disable_editor_fullscreen_by_default() {
        $script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
        wp_add_inline_script( 'wp-blocks', $script );
    }
    add_action( 'enqueue_block_editor_assets', 'jba_disable_editor_fullscreen_by_default' );
}
//endregion

//-----------------------------------------------------
// RI - WooCommerce Customizations
//-----------------------------------------------------

/**
 * Change number of products that are displayed per page to 50
 */
add_filter( 'loop_shop_per_page', 'ri_new_loop_shop_per_page', 20 );
function ri_new_loop_shop_per_page( $cols ) {
  $cols = 50;
  return $cols;
}
//region Global Helper Functions
function get_product_post_count($taxonomy_id) {
    $products = get_posts(array(
        'post_type' => 'product',
        'numberposts' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $taxonomy_id
            )
        )
    ));

    return count($products);
}

function get_random_date_for_legacy_posts()
{
    $date = [];

    $timestamp = mt_rand(1465171200, 1514937600);

    return date("F j, Y", $timestamp);

}

function compare_published_updated_dates($post_id) {
    $dates = [];
    $published_time = strtotime(get_the_date('', $post_id));

    if ($published_time === 1465171200) {
        $dates['updated'] = get_random_date_for_legacy_posts();
    } else {
        $updated_time = strtotime(get_the_modified_date('', $post_id));
        $date_diff = $updated_time - $published_time;
        $days_diff = round($date_diff / (60 * 60 * 24));

        if ($days_diff > 30) {
            $dates['updated'] = get_the_modified_date('', $post_id);
        } else {
            $dates['published'] = get_the_date('', $post_id);
        }
    }

    return $dates;
}
function get_formatted_product_type($post_id)
{
    $post_type = get_post_type($post_id);

    if ($post_type === 'servers') {
        $product_type = 'Servers';
    } elseif ($post_type === 'storage') {
        $product_type = 'Storage Array';
    } else {
        $product_type = get_field('post_networking_equipment_type', $post_id);
    }

    return $product_type;
}
function get_formatted_product_terms($post_id) {
    $tag_terms = array('server_manufacturers', 'product_line', 'server_types', 'form_factor', 'networking_type', 'generation');
    $tags = array();

    foreach ($tag_terms as $tag_cat) {
        $terms = get_the_terms($post_id, $tag_cat);
        if ($terms) {
            $label = ri_get_labels_from_terms($terms[0]->taxonomy);
            $tags[$label] = $terms[0]->name;
        }
    }
    $tags['title'] = get_formatted_product_title($post_id);
    $tags['product'] = get_formatted_product_type($post_id);

    return $tags;
}
function get_formatted_product_title($post_id) {

    return (get_post_type($post_id) == 'servers') ? get_the_title($post_id) . ' Servers' : get_the_title($post_id);

}

function replace_product_variable_in_string($string, $post_id) {
    $string = trim($string);
    $tags = get_formatted_product_terms($post_id);
    $replacement_array = [];

    foreach ($tags as $key => $val) {
        if ($val) {
            $replacement_array['{' . strtolower($key) . '}'] = $val;
        }
    }

    return strtr($string, $replacement_array);
}

function ri_get_single_post_type($post_id) {
	$terms = get_the_terms( $post_id, 'product_cat' );
	$term_names = array();

	foreach ($terms as $term) {
		$terms_array[] = $term->name;
	}

	if (in_array('Networking', $terms_array)) {
		$type = 'Networking';
	}
	if (in_array('Used Servers', $terms_array)) {
		$type = 'Servers';
	}
	if (in_array('Storwize', $terms_array)) {
		$type = 'Storage';
	}

	return $type;
}

function ri_remove_model_name_adjectives($post_id) {
	$clean_model_name = '';
	$model_adjectives = ['Refurbished', '(Demo)', 'Demo', 'Rackmount', 'Server', 'Servers', 'PowerEdge', 'Tower', 'Proliant', 'Blade', '1U', '2U'];
	$adjectives_lower_case = [];

	foreach ($model_adjectives as $adjectives) {
		$adjectives_lower_case[] = strtolower($adjectives);
	}

	$model_name =  explode(" ", strtolower(get_the_title($post_id)));
	$clean_model_name = array_diff($model_name, $adjectives_lower_case);

	$model = implode(' ', $clean_model_name);

	return trim(strtoupper($model));
}

function ri_replace_placeholder_values($text, $find, $replace) {
	$pattern = "/$find/";
	$text = preg_replace($pattern, $replace, $text);

	return $text;
}

function ri_get_labels_from_terms($taxonomy) {
	$label = str_replace('_', ' ', $taxonomy);

	if(substr($label, -1) == 's') {
	    $label = substr($label, 0, -1);
	}

	return ucwords(str_replace('server ', '', $label));
}
//endregion
function get_background_banner_image_start($container_classes, $image,  $gradient = '')
{
$gradient = (isset($gradient)) ? $gradient : .75;
$linear_gradient = 'linear-gradient(to bottom, rgba(0,0,0,' .  $gradient . ') 0%,rgba(0,0,0,' . $gradient . ') 100%)';

$banner_start  = '<div class="jumbotron bg-cover ' . $container_classes . '" ';
$banner_start .= 'style="background-image: ' . $linear_gradient . ',';
$banner_start .= 'url(' . $image . ')">';

return $banner_start;
}
function get_background_image_banner_end()
{

}


//-----------------------------------------------------
// RI - Page & Post Content
//-----------------------------------------------------
function ri_model_phone_cta($post) {
	$terms = get_the_terms( $post->ID, 'product_cat' );
	$term_names = array();

	foreach ($terms as $term) {
		$terms_array[] = $term->name;
	}

	if (in_array('Networking', $terms_array)) {
		$lead = 'Call to order this networking equipment';
	} else {
		$lead = 'Need help configuring this server?';
	}

	$model_phone_cta  = '<div class="model-phone-cta-container">';
	$model_phone_cta .= '<p class="model-phone-lead">' . $lead . '</p>';
	$model_phone_cta .= '<a href="tel:800-932-0657" class="model-phone">800-932-0657</a>';
	$model_phone_cta .= '</div>';

	return $model_phone_cta;
}

//-----------------------------------------------------
// RI - Plugin: ACF
//-----------------------------------------------------
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Global',
		'menu_title'	=> 'Global',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Server Options',
		'menu_title'	=> 'Server Options',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Networking Options',
		'menu_title'	=> 'Networking Options',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
	));

}

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Configurations'),
            'menu_title'  => __('Configurations'),
            'redirect'    => false,
        ));

        // Add sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('CPU'),
            'menu_title'  => __('CPU'),
            'parent_slug' => $parent['menu_slug'],
        ));
        $child = acf_add_options_page(array(
            'page_title'  => __('Drives'),
            'menu_title'  => __('Drives'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}
function ri_load_servers_for_config_include( $field ) {
    $field['choices'] = array();

    $server_args = array(
        'post_type' => 'servers',
        'posts_per_page' => -1
    );

    $servers_posts = get_posts($server_args);

    if ($servers_posts) {
        foreach ($servers_posts as $server) {
            $field['choices'][$server->ID] = get_the_title($server->ID);
        }
    }
    return $field;
}
add_filter('acf/load_field/key=field_62dddf3b6de55', 'ri_load_servers_for_config_include');

function ri_load_servers_for_config_exclude( $field ) {
    $field['choices'] = array();

    $server_args = array(
        'post_type' => 'servers',
        'posts_per_page' => -1
    );

    $servers_posts = get_posts($server_args);

    if ($servers_posts) {
        foreach ($servers_posts as $server) {
            $field['choices'][$server->ID] = get_the_title($server->ID);
        }
    }
    return $field;
}
add_filter('acf/load_field/key=field_62bb95cb6aca3', 'ri_load_servers_for_config_exclude');

function ri_config_populate_server_cats($field) 
{
	$field['choices'] = array();

    $args = [
       'taxonomy' => 'product_cat',
       'orderby' => 'name', 
       'empty' => 0,
       'child_of' => 138

    ];
   
   	$cats = get_categories($args);
    $field['choices'][ "all" ] = "All";      

    foreach ($cats as $cat) {
		$field['choices'][ $cat->name ] = $cat->name;        
    }

    return $field;
}
add_filter('acf/load_field/key=field_62729f934527f', 'ri_config_populate_server_cats');

function ri_load_server_spec_labels( $field ) {
    $field['choices'] = array();

    if( have_rows('global_server_spec_table_inputs', 'option') ) {

        while( have_rows('global_server_spec_table_inputs', 'option') ) {

            the_row();

            $label = get_sub_field('global_server_spec_table_inputs_input');

            $field['choices'][ $label ] = $label;

        }

    }

    return $field;
}

add_filter('acf/load_field/key=field_5d8ac150d781b', 'ri_load_server_spec_labels');

// Dynamically populate label field in the specs table (field_5d8e354a8650e)
function ri_load_server_post_spec_labels( $field ) {
    $field['choices'] = array();

    if( have_rows('global_server_spec_table_inputs', 'option') ) {

        while( have_rows('global_server_spec_table_inputs', 'option') ) {

            the_row();

            $label = get_sub_field('global_server_spec_table_inputs_input');

            $field['choices'][ $label ] = $label;

        }

    }
    return $field;
}

add_filter('acf/load_field/key=field_5d8e354a8650e', 'ri_load_server_post_spec_labels');

// Dynamically populate label field in the pre-configured specs table (field_5d8e3adfe46aa)
function ri_load_pre_configured_server_post_spec_labels( $field ) {
    $field['choices'] = array();

    if( have_rows('global_server_spec_table_inputs', 'option') ) {

        while( have_rows('global_server_spec_table_inputs', 'option') ) {

            the_row();

            $label = get_sub_field('global_server_spec_table_inputs_input');

            $field['choices'][ $label ] = $label;

        }

    }

    return $field;
}
add_filter('acf/load_field/key=field_5d8e3adfe46aa', 'ri_load_pre_configured_server_post_spec_labels');