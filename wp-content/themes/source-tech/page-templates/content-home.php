<?php // Template Name: Home Demo

get_header(); ?>

<!-- Hero Banner -->
<?php
$hero_args = array('section_classes' => 'mb-0');

if (get_field('page_include_banner')) {
    if (get_field('page_banner_style') === 'Split') {
        get_template_part('template-parts/global/content', 'hero-split', $hero_args);
    } else {
        get_template_part('template-parts/global/content', 'hero', $hero_args);
    }
}
?>

<!-- Brands List -->
<?php
$image_list_args = array(
    'section_heading' => false,
    'section_classes' => 'bg-blue-light mt-0'
);
get_template_part('template-parts/global/content', 'image-list', $image_list_args); ?>

<!-- Servers -->
<?php
$server_args = array(
  'section_heading' => true,
  'heading_copy' => 'New & Factory Refurbished Servers',
  'subheading_copy' => 'Whether you need multiple racks, or a single tower, we have the largest selection of top brands at unbeatable prices.',
);
get_template_part('template-parts/servers/content', 'manufacturers'); ?>

<!-- What We do -->
<div class="container-fluid content-section bg-color bg-light-blue" id="what-we-do">
    <div class="wrapper">
        <div class="row justify-content-center content-heading">
            <div class="col-md-8 text-center">
                <h2 class="section-title">What We Do</h2>
                <p>From small offices to large data centers, SourceTech Systems has the enterprise IT hardware and 24x7 support services to keep you connected.</p>
            </div>
        </div>
        <div class="row row-eq-height content-section">
            <?php
            if( have_rows('page_home_what') ):
                $services = '';
                while ( have_rows('page_home_what') ) : the_row();
                    $services .= '<div class="col-md-4 text-center content-panels">';
                    $services .= '<div class="card card-image-header no-border h-100 no-border content-panel">';
                    $services .= '<div class="card-header">';
                    $services .= '<img class="img-top-radius mb-3" src="' . get_sub_field('page_home_what_image') . '" />';
                    $services .= '</div>';
                    $services .= '<div class="card-body d-flex flex-column">';
                    $services .= '<h4>' . get_sub_field('page_home_what_heading') . '</h4>';
                    $services .= '<p class="mb-4">' . get_sub_field('page_home_what_description') . '</p>';
//                    $services .= '<div class="mt-auto">';
                    $services .= '<a href="' . get_sub_field('page_home_link_url') . '" class="hero-btn mt-auto">';
                    $services .= get_sub_field('page_home_link_text') . '</a>';
                    $services .= '</div>';
                    $services .= '</div>';
                    $services .= '</div>';
                endwhile;
                echo $services;
            endif;
            ?>
        </div>
    </div>
</div>

<?php
$server_callout_args = array(
    'repeater' => true,
    'custom_field' => 'page_home_callouts',
    'callout_name' => 'Servers',
    'text_orientation' => 'left'

);

get_template_part('template-parts/global/content-callout', null, $server_callout_args);
?>

<!-- Testimonial -->
<div class="container-fluid content-section">
    <div class="wrapper">
        <div class="row justify-content-center my-5">
            <div class="col-md-7 text-center">
                <p class="testimonial">"Our company has been doing business with SourceTech for about a year, and they have become our primary 3rd party company when it comes to pre-owned servers and storage. They always provide the lowest pricing."</p>
                <p class="author mb-0">- Timothy Deleon</p>
            </div>
        </div>
    </div>
</div>

<?php
$server_callout_args = array(
    'repeater' => true,
    'custom_field' => 'page_home_callouts',
    'callout_name' => 'Networking',
    'text_orientation' => 'right'

);

get_template_part('template-parts/global/content-callout', null, $server_callout_args);
?>

<?php get_template_part('template-parts/global/content-faq'); ?>

<!--Service-->
<?php
$server_callout_args = array(
    'repeater' => true,
    'custom_field' => 'page_home_callouts',
    'callout_name' => 'Service',
    'text_orientation' => 'left'

);

get_template_part('template-parts/global/content-callout', null, $server_callout_args);
?>

<div class="container-fluid content-section">
    <div class="wrapper">
        <div class="row justify-content-center content-heading">
            <div class="col-md-8 text-center">
                <h2 class="section-title">3 Easy Ways to Get a Quote</h2>
                <p>We make ordering Enterprise IT equipment fast and easy. Forget being forced to by what's on the shelf, or having to use complicated shopping carts.</p>
            </div>
        </div>
        <div class="row row-eq-height content-section why-us">
            <div class="col-md-4 text-center content-panels">
                <div class="card no-border h-100">
                    <div class="card-header no-border bg-blue-light">
                        <i class="blue py-2 fas fa-comments-alt fa-3x"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="mt-2">Chat</h4>
                        <p>Chat with real humans 24x7. Our IT hardware equipment experts are 100% U.S.A. based and we never user bots.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center content-panels">
                <div class="card no-border h-100">
                    <div class="card-header no-border bg-blue-light">
                        <i class="blue py-2 fas fa-phone fa-3x"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="mt-2">Call</h4>
                        <p>Our sales and support staff have the expert knowledge required to help you find the right products and services.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center content-panels">
                <div class="card no-border h-100">
                    <div class="card-header no-border bg-blue-light">
                        <i class="blue py-2 fas fa-envelope-open-text fa-3x"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="mt-2">Email</h4>
                        <p>We answer most emails within one business day. Send us a competitor's quote and we'll try and beat their price!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial -->
<div class="container-fluid content-section">
    <div class="wrapper ">
        <div class="row justify-content-center py-5 my-5">
            <div class="col-md-7 text-center">
                <p class="testimonial">"Excellent service! I've been very pleased with the quality of service and hardware I've received.  Shipping the equipment to Canada, all custom paperwork was well managed. I'd highly recommend them!"</p>
                <p class="author mb-0">- Michel Bouchard</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="wrapper">
        <div class="row">

        </div>
    </div>
</div>


<?php get_footer(); ?>
