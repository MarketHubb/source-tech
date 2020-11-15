<?php
$hero = get_field('page_banner_details');

if ($hero) : ?>

    <div class="jumbotron bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.75) 0%,rgba(0,0,0,0.75) 100%), url(<?php echo $hero['page_banner_image']; ?>)">
        <div class="container">
            <h1 class="display-4"><?php echo $hero['page_banner_heading']; ?></h1>
            <p class="lead"><?php echo $hero['page_banner_description']; ?></p>
            <hr class="my-4">

            <?php 
                if ($hero['page_banner_button_type'] === 'Custom') {
                    $button_url = $hero['page_banner_button_url'];
                } else {
                    $button_url = $hero['page_banner_button_page_link'];        
                }
            ?>

            <?php if ($hero['page_banner_button_type'] !== 'None') { ?>
                <a class="btn btn-primary btn-lg" href="<?php echo $button_url; ?>" role="button"><?php echo $hero['page_banner_button_text']; ?></a>
            <?php } ?>

        </div>
    </div>

<?php endif; ?>