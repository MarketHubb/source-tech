<?php $image = get_home_url() . '/wp-content/uploads/2020/10/Home-Banner-6.jpg'; ?>

    <div class="jumbotron hero bg-cover text-white mb-0"
         style="background-image: url(<?php echo $image ?>)">
        <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-12 text-center">
                        <div class="hero-copy py-5">

                            <?php if (isset($subheading) && !empty($subheading)) { ?>
                                <p class="lead"><?php echo $subheading; ?></p>
                            <?php } ?>

                            <!-- Heading -->
                            <p class="lead fs-5  mb-0 pb-0">"Our company has been doing business with SourceTech for about 1 year and they have become our primary 3rd party company when it comes to pre-owned server and storage. They always provide the lowest pricing, systems are properly setup and turn around is usually 1 week. If there are any issues their response is always quick and extremely helpful."</p>
                            <p class="mt-4">- Timothy Deleon</p>

                            <?php
                            if (isset($description) && !empty($description)) {
                                echo return_hero_subheading($description, $description_classes);
                            }
                            ?>

                            <?php
                            if (!empty($button) && $button['text']) {
                                echo return_hero_button($button);
                            }
                            ?>

                        </div>
                    </div>

                </div>
            </div>
    </div>
