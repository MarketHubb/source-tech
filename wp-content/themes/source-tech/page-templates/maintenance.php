<?php // Template Name: Maintenance

get_header();

$testimonial = [
    'topic' => 'Maintenance',
    'style' => 'full-width',
    'background' => 'blue',
    'lead' => 'What our customers are saying'
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

<!-- Brands List -->
<?php
$image_list_args = array(
    'section_heading' => false,
    'section_classes' => 'bg-blue-light mt-0'
);
get_template_part('template-parts/global/content', 'image-list', $image_list_args); ?>


<!-- Services -->
    <div class="content">
        <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 pr-md-4">
                        <i class="far fa-globe-americas fa-2x blue"></i>
                        <h2 class="">Nationwide Maintenance & Installation Services</h2>
                        <p><em>Reduce downtime for critical systems without having to rely on expensive OEM contracts</em></p>
                    </div>
                    <div class="col-md-4">
                        <div class="panel shadow blue-top">
                            <p class="lead"><strong>24x7 Mission Critical</strong></p>
                            <p>Unexpected server downtime can cause disaster to your business. With our 24/7 mission
                                critical support, your equipment can be serviced by our certified IT personnel 24 hours
                                a day, 365 days a year, including holidays</p>
                            <a href="/request-a-quote/?type=maintenance" class="text-link">Request a Quote for 24x7</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel shadow blue-top">
                            <p class="lead"><strong>8×5 Next Business Day</strong></p>
                            <p>Next business day support is our affordable service for non-critical systems and
                                applications that need attention, but can wait until next business day. Our IT personnel
                                are available Monday to Friday, not including major holidays.</p>
                            <a href="/request-a-quote/?type=maintenance" class="text-link">Request a Quote for 8x5</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Testimonial -->
<?php get_template_part('template-parts/global/content', 'testimonial'); ?>

    <div class="content">
        <div class="container">
                <div class="row align-items-center justify-content-start">
                    <div class="col-md-4">
                        <div class="panel shadow orange-top">
                            <p class="lead"><strong>Remote Hardware Monitoring</strong></p>
                            <p>Easily monitor workstations, servers, network devices, and connected mobile devices from within a unified dashboard. Remote access allows you to resolve tickets faster by repairing any workstation or server without leaving your desk and monitor your network devices, such as printers, firewalls, routers, switches, uninterruptable power supplies (UPS), and more.</p>
                            <a href="/request-a-quote/?type=maintenance" class="text-link">Request a Quote for Monitoring</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel shadow orange-top">
                            <p class="lead"><strong>Backup & Restore</strong></p>
                            <p>Back up and restore files and full systems within minutes + keep all of your software up-to-date in a highly automated fashion for streamlined IT maintenance. Create scripts to automate routine tasks using a simple drag-and-drop interface—no need to learn a scripting language or write a line of code.</p>
                            <a href="/request-a-quote/?type=maintenance" class="text-link">Request a Quote for Backup</a>
                        </div>
                    </div>
                    <div class="col-md-4 pl-md-4">
                        <i class="far fa-laptop-code fa-2x orange"></i>
                        <h2 class="">Continuous Uptime &amp; Remote Systems Management</h2>
                        <p><em>Ensure network + device uptime and proactively monitor hardware - all 100% remote</em></p>
                    </div>
                </div>
            </div>
    </div>


<!--            <div class="col-md-8 text-center">-->
<!--                <h2 class="mb-4">Maintenance & Installation Services</h2>-->
<!--                <div class="row">-->
<!--                    <div class="col-md-6 text-center">-->
<!--                        <div class="panel shadow blue-top">-->
<!--                            <p class="lead"><strong>24/7 Mission Critical</strong></p>-->
<!--                            <p>Unexpected server downtime can cause hiccups to your business. With our 24/7 mission critical support, your equipment can be serviced by our certified IT personnel 24 hours a day, 365 days a year, including holidays</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 text-center">-->
<!--                        <div class="panel shadow blue-top">-->
<!--                            <p class="lead"><strong>8×5 Next Business Day</strong></p>-->
<!--                            <p>Next business day support is our affordable service for non-critical systems and applications that need attention, but can wait until next business day. Our IT personnel will be available to you Monday – Friday, not including major holidays.</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 text-center">-->
<!--                <h2 class="mb-4">Systems Management</h2>-->
<!--                <div class="panel shadow orange-top">-->
<!--                    <p class="lead"><strong>Continuous Uptime</strong></p>-->
<!--                    <p>Easily monitor workstations, servers, network devices from a unified dashboard. Back up and restore files and full systems within minutes. Keep all of your software up-to-date in a highly automated fashion for streamlined IT maintenance.</p>-->
<!--                </div>-->
<!--                <div class="panel shadow orange-top">-->
<!--                    <p class="lead"><strong>Backup & Restore</strong></p>-->
<!--                    <p>Easily monitor workstations, servers, network devices from a unified dashboard. Back up and restore files and full systems within minutes. Keep all of your software up-to-date in a highly automated fashion for streamlined IT maintenance.</p>-->
<!--                </div>-->
<!--            </div>-->

    <div class="content bg-blue-light" id="maintenance-parts">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2 class="mb-5">Equipment & Replacement Parts</h2>
                    </div>
                </div>
                <div class="row border-blue">
                    <div class="col-md-3 text-center">
                        <i class="fal fa-server fa-2x blue "></i>
                        <p class="lead mt-1 mb-3 lh-1"><strong>Refurbished<br>Servers</strong></p>
                        <p>From Dell to HPE & more, we carry new & factory-refurbished servers from the top manufacturers
                            and model lines and can save you thousands from OEM list prices.</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <i class="fal fa-router fa-2x blue "></i>
                        <p class="lead mt-1 mb-3 lh-1"><strong>Networking<br>Equipment</strong></p>
                        <p>We carry top of the line Cisco Catalyst routers & intelligent ethernet switches to ensure
                            your network remains fast & operational even under the highest loads.</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <i class="fal fa-hdd fa-2x blue"></i>
                        <p class="lead mt-1 mb-3 lh-1"><strong>Hardware<br>Parts</strong></p>
                        <p>From Processors to RAM and storage - including HDD and SSD - SourceTech has the replacement
                            parts to keep your existing hardware running for longer.</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <i class="fal fa-file-certificate fa-2x blue"></i>
                        <p class="lead mt-1 mb-3 lh-1"><strong>Best in Class<br>Warranty</strong></p>
                        <p>Post-warranty support from OEM's is expensive, that's why each part & piece of equipment we
                            sell comes with our best-in-class 2-year warranty & technical support.</p>
                    </div>

                    <?php
                    if (have_rows('page_maintenance_parts')):
                        $parts_callout = '';
                        while (have_rows('page_maintenance_parts')) : the_row();
                            $parts_callout .= '<div class="col-md-3 text-center">';
                            $parts_callout .= '<i class="' . get_sub_field('page_maintenance_parts_icon') . ' fa-2x blue"></i>';
                            $parts_callout .= '<p class="lead mt-1 mb-3 lh-1"><strong>' . get_sub_field('page_maintenance_parts_heading') . '</strong></p>';
                            $parts_callout .= '<p>' . get_sub_field('page_maintenance_parts_description') . '</p>';
                            $parts_callout .= '</div>';
                        endwhile;
                        //                echo $parts_callout;
                    endif;
                    ?>
                </div>
            </div>
        </div>


    <div class="content">
        <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <i class="fas fa-user-headset fa-2x blue"></i>
                        <h2>Why Customers Choose Us for Enterprise IT Hardware Management</h2>
                        <p><em>Factory-tested parts & hardware + nationwide uptime services for thousands less than the OEM</em></p>
                    </div>
                    <div class="col-md-7">
                        <ul class="ml-0 lst-none">
                            <li class="panel shadow mb-3 border-blue-left">
                                <p class="lead mb-0"><strong>Affordable Post Warranty Support</strong></p>
                                <p class="mb-0">If you need maintenance on expired warranty equipment, SourceTech can provide
                                    exceptional technical support and customer service that help keep your IT
                                    infrastructure up and running.</p>
                            </li>
                            <li class="panel shadow mb-3 border-blue-left">
                                <p class="lead mb-0"><strong>Hardware Installation & Data Center Moves</strong></p>
                                <p class="mb-0">Whether you just purchased IT equipment or need to move your entire data center,
                                    SourceTech will send you certified installers with experience in supporting large
                                    storage environments.</p>
                            </li>
                            <li class="panel shadow mb-3 border-blue-left">
                                <p class="lead mb-0"><strong>Custom Configuration Services</strong></p>
                                <p class="mb-0">SourceTech can also reconfigure one of your existing servers or storage arrays to
                                    your specifications. Our IT personnel will run complete tests on your equipment so
                                    you can be sure it functions properly. </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

<?php get_footer();
