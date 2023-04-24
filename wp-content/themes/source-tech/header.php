<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Source_Tech
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
    
    <!-- ahrefs domain verification -->
    <meta name="ahrefs-site-verification" content="b1123fd872bc8c7860c22eadc8959120a93e9d7d4a3999dd64a3141842640706">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-8718028-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-8718028-1');
	</script>

	<!-- Global site tag (gtag.js) - Google Ads: 1033984787 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1033984787"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'AW-1033984787');
	</script>

    <!-- Google Merchant Account -->
    <meta name="google-site-verification" content="emirZi010pgv2WQnh--XoePUQtuyWqaoMVe_kjYZMoM" />

	<!-- Google Adwords forwarding phone number snippet  -->
	<script>
		gtag('config', 'AW-1033984787/8p-5CPax_ZQBEJO2he0D', {
			'phone_conversion_number': '800-932-0657'
		});
	</script>

</head>

<body <?php body_class(); ?>>

    <!-- Global Alert Bar -->
    <?php
    // Modify alert message if Google Ads promotion in ad copy

    // 30 === "up to 30% off"
    if (isset($_GET['ga']) && $_GET['ga'] == 30) {
        $alert_copy = 'This week only <span class="global-alert-promo">save up to 30%</span> on ' . get_the_title() . 's: ';
    } else {
        $alert_copy = 'Fully operational during COVID-19 with fast shipping & same-day quotes:';
    }
    ?>




    <div class="bg-blue global-alert fixed shadow-sm mb-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list-group list-group-horizontal ms-0 ps-0">
                        <li class="list-group-item flex-fill bg-transparent py-1 no-border text-center">
                            <span class="d-none d-md-inline alert-cta float-none float-md-end" onclick='$zoho.salesiq.floatwindow.visible("show");'>
                                <i class="fas fa-comments-alt text-white me-1 me-md-2 fa-sm"></i>Live Chat
                            </span>
                            <span class="d-inline d-md-none alert-cta float-none float-md-end" onclick='$zoho.salesiq.floatwindow.visible("show");'>
                                <i class="fas fa-comments-alt text-white me-1 me-md-2 fa-sm"></i>Chat
                             </span>
                        </li>
                        <li class="list-group-item flex-fill bg-transparent py-1 text-center no-border">
                            <span class="d-none d-md-inline alert-cta">
                                <a href="mailto:info@source-tech.net" class="cta-email"><i class="fas fa-envelope me-1 me-md-2 fa-sm"></i>info@source-tech.net</a>
                            </span>
                            <span class="d-inline d-md-none alert-cta">
                                <a href="mailto:info@source-tech.net" class="cta-email"><i class="fas fa-envelope me-1 me-md-2 fa-sm"></i>Email</a>
                            </span>
                        </li>
                        <li class="list-group-item flex-fill bg-transparent py-1 text-center no-border">
                            <span class="d-none d-md-inline alert-cta float-none float-md-start">
                                <a href="tel:800-932-0657"><i class="fas fa-phone me-1 me-md-2 fa-sm"></i>800-932-0657</a>
                            </span>
                            <span class="d-inline d-md-none alert-cta float-none float-md-start">
                                <a href="tel:800-932-0657"><i class="fas fa-phone me-1 me-md-2 fa-sm"></i>800-932-0657</a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <p class="text-center text-white d-none"><?php //echo $alert_copy; ?>
            <span class="alert-cta px-4 cta-chat" onclick='$zoho.salesiq.floatwindow.visible("show");'><i class="fas fa-comments-alt text-white"></i> Live Chat</span>
            <span class="alert-cta px-4"><a href="mailto:info@source-tech.net" class="cta-email"><i class="fas fa-envelope"></i> info@source-tech.net</a></span>
            <span class="alert-cta px-4"><a href="tel:800-932-0657"><i class="fas fa-phone"></i> 800-932-0657</a></span>
        </p>
    </div>

	<div id="page" class="site" data-type="<?php echo get_post_type(); ?>">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'source-tech' ); ?></a>

		<header id="masthead" class="site-header" data-buttonvariant="">
			<div class="row bottom-row">
				<div class="item site-branding ps-0">
                    <a href="<?php echo get_home_url(); ?>" class="custom-logo-link" rel="home" itemprop="url">
                        <img width="299" height="65" src="<?php echo get_home_url() . '/wp-content/uploads/2020/05/SourceTech-Systems.svg' ?>" class="custom-logo" alt="Source Tech" itemprop="logo">
                    </a>
					<?php
					if ( is_front_page() && is_home() ) :
						?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$source_tech_description = get_bloginfo( 'description', 'display' );
				if ( $source_tech_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $source_tech_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
			<div class="item" id="middle-column">
				<a href="https://www.source-tech.net/contact">Give Feedback on our Website</a><span class="icon icon-angle-right"></span>
			</div>
			<div class="item" id="right-column">
				<?php get_search_form(); ?>
				<a href="https://www.source-tech.net/cart/" class="button cart"><span class="icon icon-basket"></span>Cart</a>
			</div>
		</div>
		

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'source-tech' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
	<?php
	if(function_exists('bcn_display') && !is_front_page() && !is_page(777) && !is_page(1234) && !is_page(816) && !is_page(1372)) {
		echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
		bcn_display();
		echo '</div>';
	}?>
	
	<?php if (is_page(777) || is_singular('networking') || is_singular('servers') || is_singular('storage') || is_page(2055) || is_page(661) || is_page(2415) || is_page(2488) || is_category() || is_page(577) || is_product_category() || is_page(620)) { ?>
		<div id="custom-content" class="custom-site-content">
		<?php } else if (!is_singular('post')) { ?>
<!--			<div id="content" class="site-content">-->
			<div id="content" class="">
			<?php } ?>
