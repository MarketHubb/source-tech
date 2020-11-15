<?php
$banner_url = get_field('post_page_banner_image');
$heading = (get_field('post_banner_title')) ? get_field('post_banner_title') : get_the_title();
$sub_heading = (get_field('post_banner_subtitle')) ? get_field('post_banner_subtitle') : '';

?>
<!-- Page Title (Banner) -->
<div class="container-fluid p-0">
    <div class="banner-container" style="background-image: url('<?php echo $banner_url; ?>');">
        <div class="banner-overlay dark">
            <div class="container h-100 content-section">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center">
                        <h1 class="banner-headline"><?php echo $heading; ?></h1>
                        <p class="banner-subheadline"><?php echo $sub_heading; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>