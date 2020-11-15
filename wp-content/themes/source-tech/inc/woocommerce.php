<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Source_Tech
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function source_tech_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'source_tech_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function source_tech_woocommerce_scripts() {
	wp_enqueue_style( 'source-tech-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'source-tech-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'source_tech_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function source_tech_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'source_tech_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function source_tech_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'source_tech_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function source_tech_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'source_tech_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function source_tech_woocommerce_loop_columns() {
	return 4;
}
add_filter( 'loop_shop_columns', 'source_tech_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function source_tech_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'source_tech_woocommerce_related_products_args' );

if ( ! function_exists( 'source_tech_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function source_tech_woocommerce_product_columns_wrapper() {
		$columns = source_tech_woocommerce_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'source_tech_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'source_tech_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function source_tech_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'source_tech_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'source_tech_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function source_tech_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			<?php
	}
}
add_action( 'woocommerce_before_main_content', 'source_tech_woocommerce_wrapper_before' );

if ( ! function_exists( 'source_tech_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function source_tech_woocommerce_wrapper_after() {
			?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'source_tech_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'source_tech_woocommerce_header_cart' ) ) {
			source_tech_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'source_tech_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function source_tech_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		source_tech_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'source_tech_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'source_tech_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function source_tech_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'source-tech' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'source-tech' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'source_tech_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function source_tech_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php source_tech_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

/**
 * Disable WooCommerce sidebar on single product pages
 */
function disable_woo_commerce_sidebar() {
	if (!is_woocommerce() || is_product()) {
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 
	}
}
add_action('wp', 'disable_woo_commerce_sidebar');

/**
 * Hide category product count in product archives
 */
add_filter( 'woocommerce_subcategory_count_html', '__return_false' );

/**
 * Add wrapper for shop count and filter
 */

add_action( 'woocommerce_before_shop_loop', 'add_open_shopcount_row_div', 15 );
add_action( 'woocommerce_before_shop_loop', 'add_close_shopcount_row_div', 35 );

function add_open_shopcount_row_div() {
   echo '<div class="row count-sort">';
}

function add_close_shopcount_row_div() {
	echo '</div>';
}

/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

/**
 * Remove product details tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

	unset( $tabs['additional_information'] ); // Remove the Additional Information tab

	return $tabs;
}

/**
 * Remove uneeded Description heading on product page
 */
add_filter('woocommerce_product_description_heading', '__return_null');

/**
 * Remove single product meta 
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/**
 * Remove Related Products block
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * Add flex box wrapper on Single Product template
 */
add_action( 'woocommerce_before_single_product_summary', 'add_open_singleproduct_row_div', 5 );
add_action( 'woocommerce_before_single_product_summary', 'add_open_productsumm_item_div', 25 );
add_action( 'woocommerce_after_single_product_summary', 'add_close_singleproduct_row_div', 16 );

function add_open_singleproduct_row_div() {
   echo '<div class="row product-summary">';
}
function add_open_productsumm_item_div() {
	$post = get_post();
	$phone_cta = ri_model_phone_cta($post);
	
	$summary_block  = '<div class="item summary-block">';
	$summary_block .= $phone_cta;
	
	echo $summary_block;
}
function add_close_singleproduct_row_div() {
	echo '</div><!-- .summary-block --></div><!-- .product-summary -->';
}

/**
 * Add More Information ACF before Related Products block
 */
add_action( 'woocommerce_after_single_product_summary', 'add_acf_more_info', 17);

function add_acf_more_info() {
	$more_info = get_field('more_information');

	if ($more_info) {
		$string = '<div class="more-info-block"><div class="more-info-tab">More Information</div><div class="more-info-field">';
		$string .= $more_info . '</div></div></div><!-- .more-info-block -->';
		echo $string;
	}
}

/**
 * Add Request a Quote button to product detail
 */

add_action( 'woocommerce_single_product_summary', 'add_request_quote', 30);

function add_request_quote() {
    global $product;
    if ( '' === $product->price || 0 == $product->price ) {
    	// Add model details via query args
    	$rfq_uri = add_query_arg( array(
    	    'type' => strtolower(ri_get_single_post_type(get_the_ID())),
    	    'model' => get_the_title()
    	), get_permalink (1234));
        echo '<a href="' . $rfq_uri . '" class="button request-quote"><span>Request a Quote</span></a>';
    } else {
        echo woocommerce_template_single_price();
        echo woocommerce_simple_add_to_cart();
    }
}

/**
 * Add shipping graphic to product detail
 */
add_action( 'woocommerce_after_single_product_summary', 'add_shipping_graphic', 11);

function add_shipping_graphic() {
	echo '<p class="ship-warranty"><img src="/wp-content/uploads/2018/07/shipping.gif" alt="Two Year Warranty, Free Shipping"></p>';
}
