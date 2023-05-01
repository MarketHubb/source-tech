<?php
$hero = get_field('page_banner_details');

if ($hero) : ?>

    <div class="container hero-banner content-section  <?php echo $args['section_classes']; ?>" id="banner-split">
        <div class="row justify-content-between align-items-center row-eq-height py-4">
            <!-- Content (left) -->
            <div class="col-md-5 my-4 p-4 py-md-0">

                <h1 class="fs-2"><?php echo $hero['page_banner_heading']; ?><br>
                <span class="font-weight-lighter"><?php echo $hero['page_banner_subheading']; ?></span></h1>
                <p class="pe-md-3 pe-lg-5 mb-4"><?php echo $hero['page_banner_description']; ?></p>

                <?php
                if ($hero['page_banner_button_type'] === 'Custom') {
                    $button_url = $hero['page_banner_button_url'];
                } else {
                    $button_url = $hero['page_banner_button_page_link'];
                }
                ?>

                <?php if ($hero['page_banner_button_type'] !== 'None') { ?>
                    <a class="btn btn-primary mb-3" href="<?php echo $button_url; ?>" role="button"><?php echo $hero['page_banner_button_text']; ?></a>
                <?php } ?>

            </div>

            <!-- Image (right) -->
            <div class="col-md-6 d-none d-md-flex">
                <div class=""><img
                            src="<?php echo $hero['page_banner_image']; ?>"
                            alt="">
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
