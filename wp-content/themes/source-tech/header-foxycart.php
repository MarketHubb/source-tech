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

    {% for css_file_href in config.css_files %}
    <link href="{{ css_file_href }}" rel="stylesheet" media="all">
    {% endfor %}

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

    <style>
        #masthead {
            margin-top: 4.5rem;
        }
        #fc-logo {
            display: none !important;
        }
        .fc-svg-icon--lock {
            top: 3.5rem !important;
        }
        .fc-cart__items  .fc-container__row {
            display: flex;
            flex-direction: column-reverse;
        }
        .fc-cart__items  .fc-container__row .fc-cart__item__details-and-image,
        .fc-cart__items  .fc-container__row .fc-cart__item__details-and-image .fc-cart__item__image,
        .fc-cart__items  .fc-container__row .fc-cart__item__totals {
            width: 100% !important;
        }
        .fc-cart__items  .fc-container__row .fc-cart__item__details-and-image span {
            margin-bottom: 1rem !important;
        }
        .fc-cart__items  .fc-container__row .fc-cart__item__totals {
            text-align: center !important;
        }
        .fc-cart__items  .fc-container__row .fc-cart__item__totals .fc-cart__item__total > p {
            font-size: 1.5rem !important;
        }
        .fc-cart__item__options .fc-cart__item__option {
            padding-bottom: 5px;
        }
        #fc .fc-cart__item__name {
            text-align: center;
            font-size: 1.15rem;
            margin-bottom: 0.75rem;
        }
        .fc-cart__item__option__name {
            text-transform: uppercase;
            font-weight: bold;
        }
        .fc-cart__item__option--code, .fc-cart__item__option--weight {
            display: none;
        }
    </style>

</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
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
        </div>
    </header><!-- #masthead -->

    <!-- Begin Foxycart Div -->
    <div id="fc" class="site-content">

