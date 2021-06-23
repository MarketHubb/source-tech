<?php // Template Name: We Buy Equipment

get_header();

$testimonial = [
    'testimonial' => 'Don’t wait to call to schedule an appointment for our buyers to make offers on what you want to sell. All major brands and models of enterprise level computers, networking and storage equipment are considered.',
    'topic' => 'Maintenance',
    'style' => 'full-width',
    'background' => 'blue',
    'lead' => 'Your IT assets may still have value'
];
set_query_var('testimonial', $testimonial);
?>

<!-- Hero Banner -->
<?php
$hero_args = array('section_classes' => 'mb-0');
if (get_field('page_include_banner')) {
    if (get_field('page_banner_style') === 'Split') {
        get_template_part('template-parts/global/content', 'hero-split', $hero_args);
    } else {
        get_template_part('template-parts/global/content', 'hero', $hero_args);
    }
} ?>

    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-12">
                <?php
                if( have_rows('logos') ):
                    $l = '<ul class="list-group list-group-horizontal ml-0 no-border">';
                    while ( have_rows('logos') ) : the_row();
                        $l .= '<li class="list-group-item flex-fill text-center no-border p-4 m-2 shadow">';
                        $l .= '<img src="' . get_sub_field('logo') . '" class="w-50" />';
                        $l .= '</li>';
                    endwhile;
                    $l .= '</ul>';
                    echo $l;
                endif;
                ?>
            </div>
        </div>
    </div>

    <!-- Services -->
    <div class="content" id="what">
        <div class="container-fluid">
            <div class="wrapper">
                <div class="row align-items-center">
                    <div class="col-md-4 pr-md-4">
                        <i class="far fa-globe-americas fa-2x blue"></i>
                        <h2 class="">We Buy Used Business-Class IT Assets</h2>
                        <p class="mb-0"><em>Asset recovery is easy when you sell us your surplus and used servers, storage and networking gear</em></p>
                        <a href="mailto:info@source-tech.net" class="text-link">Email Us Your Inventory <i class="fas fa-long-arrow-right"></i></a>
                    </div>
                    <div class="col-md-4">
                        <div class="panel shadow blue-top">
                            <p class="lead"><strong>All Major Brands & Devices</strong></p>
                            <p>We buy entry-level, mid-range and high-end servers from all of the major brands, including: Dell, HPE, NetApp, Lenovo, IBM, EMC and many more! We also bulk-buy workstations, networking equipment, like Cisco switches and routers, as well as storage devices and arrays.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel shadow blue-top">
                            <p class="lead"><strong>Large & Small Lots</strong></p>
                            <p>From small, single-unit lots to entire data centers and warehouses, SourceTech will buy or exchange your unused IT assets. We have distribution channels for legacy computing and networking equipment, as well as replacement and spare parts. Send your complete inventory list to find out what it's worth.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial -->
    <?php get_template_part('template-parts/global/content', 'testimonial'); ?>

    <div class="content">
        <div class="container-fluid">
            <div class="wrapper">
                <div class="row align-items-center justify-content-start">
                    <div class="col-md-4">
                        <div class="panel shadow orange-top">
                            <p class="lead"><strong>Data Erasure & Wiping</strong></p>
                            <p>Effective data risk management requires secure erasure and wiping of data. Don't risk your data being compromised without data sanitization. Services include data eradication, removal, erasure and destruction as appropriate, from hard disk drives, solid state storage, ROM devices and assets.

                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel shadow orange-top">
                            <p class="lead"><strong>Pickup & Shipping</strong></p>
                            <p>Arrangements for pick-up and shipment of your used servers and network components to our warehouse are made when our offer is accepted. When sellers do not have appropriate packing materials or skills for preparing equipment for shipment, we can arrange for packaging before pickup. Sellers needing help in disconnecting and de-installing equipment for sale can request a quote for those services.</p>
                        </div>
                    </div>
                    <div class="col-md-4 pl-md-4">
                        <i class="far fa-laptop-code fa-2x orange"></i>
                        <h2 class="">Sell Us Your IT Equipment &amp; Assets</h2>
                        <p class="mb-0"><em>Sell used business computer systems, memory, parts, upgrades, routers, switches and other networking components to SourceTech</em></p>
                        <a href="mailto:info@source-tech.net" class="text-link">Sell Us Your Used IT Assets <i class="fas fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->
    <div class="container-fluid my-4 py-4">
        <div class="wrapper">
            <div class="row">
                <?php
                if( have_rows('callout') ):
                    $c = '';
                    while ( have_rows('callout') ) : the_row();
                        $c .= '<div class="col-md-4 text-center">';
                        $c .= '<i class="' . get_sub_field('icon') . ' text-blue fa-3x font-weight-bold mb-4"></i>';
                        $c .= '<h5 class="font-weight-bold">' . get_sub_field('heading') . '</h5>';
                        $c .= '</div>';
                    endwhile;
                    echo $c;
                endif;
                ?>
            </div>
        </div>
    </div>


<?php get_footer();
