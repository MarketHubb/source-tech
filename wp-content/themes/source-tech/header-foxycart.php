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

    <meta name='robots' content='noindex, nofollow' />

    <title>Checkout | SourceTech Systems</title>
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Checkout | SourceTech Systems" />
    <meta property="og:url" content="https://staging.source-tech.net/checkout-page/" />
    <meta property="og:site_name" content="Source Tech" />
    <meta property="article:modified_time" content="2022-03-14T18:15:32+00:00" />
    <meta name="twitter:card" content="summary_large_image" />

    <!-- Bootstrap Styles and Scripts (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    {% for css_file_href in config.css_files %}
    <link href="{{ css_file_href }}" rel="stylesheet" media="all">
    {% endfor %}

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
        ul.fc-cart__item__options li.fc-cart__item__option {
            color: transparent;
        }
        ul.fc-cart__item__options li.fc-cart__item__option span.fc-cart__item__option__name {
            color: #222;
            display: block;
            line-height: 1;
            margin-bottom: 0 !important;
            padding-bottom: 0;
        }
        ul.fc-cart__item__options li.fc-cart__item__option span.fc-cart__item__option__value {
            line-height: 1;
            display: block;
            margin-bottom: 0 !important;
            position: relative;
            bottom: 10px;
        }
        /* Header Alert (Red) */
        div.fc-checkout > div > div.fc-alert.fc-alert--danger {
            background-color: transparent !important;
            border: none !important;
        }
        div.fc-checkout > div > div.fc-alert.fc-alert--danger > h3 {
            display: inline-block;
            background: #dc3144;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            border: 1px solid hsl(353deg 71% 33%);
            font-size: 1.2rem;
        }

    </style>

</head>

<body <?php body_class(); ?>>
<nav class="navbar bg-light">
    <div class="container">
        <a class="navbar-brand" href="https://source-tech.net/">
            <img src="https://staging.source-tech.net/wp-content/uploads/2020/05/SourceTech-Systems.svg" alt="Bootstrap" width="175" height="auto">
        </a>
    </div>
</nav>


    <!-- Begin Foxycart Div -->
    <div id="fc" class="site-content">

