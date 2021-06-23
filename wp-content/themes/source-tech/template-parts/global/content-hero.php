<?php
$hero = get_field('page_banner_details');

if ($hero) : ?>

    <div class="jumbotron bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.75) 0%,rgba(0,0,0,0.75) 100%), url(<?php echo $hero['page_banner_image']; ?>)">
        <div class="container-fluid">
            <div class="wrapper">
                <div class="row justify-content-start">
                    <!-- Banner Text Container -->
                    <div class="col-md-7">

                        <h1 class="display-4 mb-1"><?php echo $hero['page_banner_heading']; ?></h1>
                        <p class="lead font-weight-bold"><?php echo $hero['page_banner_description']; ?></p>

                        <?php
                            if ($hero['page_banner_button_type'] === 'Custom') {
                                $button_url = $hero['page_banner_button_url'];
                            } else {
                                $button_url = $hero['page_banner_button_page_link'];
                            }
                        ?>

                        <?php if ($hero['page_banner_button_type'] !== 'None') { ?>
                            <a class="btn btn-primary font-weight-bold" href="<?php echo $button_url; ?>" role="button"><?php echo $hero['page_banner_button_text']; ?></a>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php endif; ?>