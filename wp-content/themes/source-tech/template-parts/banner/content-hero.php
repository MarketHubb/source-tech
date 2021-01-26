<?php
$hero = isset($args['hero']) ? $args['hero'] : get_field('banner_details');

if ($hero) :
    // Image
    $image = isset($args['image']) ? $args['image'] : $hero['banner_image'];
    $linear_gradient = isset($args['linear_gradient']) ? $args['linear_gradient'] : 'rgba(0,0,0,0) 40%,rgba(0,0,0,.9) 55%,rgba(0,0,0,1) 75%,rgba(0,0,0,1) 100%)';
    $gradient_direction = isset($args['gradient_direction']) ? $args['gradient_direction'] : 'left';
    $gradient = isset($args['gradient']) ? $args['gradient'] : return_hero_gradient($gradient_direction, $linear_gradient);

    // Container + Alignment
//    $col_width = isset($args['col_width']) ? $args['col_width'] : $hero['banner_col_width'];
//    $col_width_class = !empty($col_width) ? $col_width : '6';
//    $text_align = isset($args['text_align']) ? $args['text_align'] : $hero['banner_text_align'];
//    $text_align_class = $text_align ?: 'left';
//    $justify_class = strtolower($text_align_class) === 'right' ? 'justify-content-end' : 'justify-content-start';

    // Copy + Button
//    $subheading = isset($args['subheading']) ? $args['subheading'] : $hero['banner_subheading'];
    $heading = isset($args['heading']) ? $args['heading'] : $hero['banner_heading'];
//    $description = isset($args['description']) ? $args['description'] : $hero['banner_description'];
//    $description_classes = isset($args['description_classes']) ? $args['description_classes'] : $hero['banner_description_classes'];
//    $button = $hero['banner_include_button'] ? get_hero_button($post->ID) : $args['button'];
//    $button['classes'] = $button['classes'] ?: 'btn btn-primary mt-3';
    ?>

    <div class="jumbotron hero bg-cover text-white mb-0"
         style="background-image: <?php echo $gradient; ?>,
             url(<?php echo $image ?>)">
        <div class="container-fluid">
            <div class="wrapper">
                <div class="row my-3 <?php echo $justify_class; ?>">
                    <div class="col-md-12>

                        <?php if (isset($subheading) && !empty($subheading)) { ?>
                            <p class="lead"><?php echo $subheading; ?></p>
                        <?php } ?>

                        <!-- Heading -->
                        <h1 class="display-5 text-white font-weight-bold section-heading"><?php echo $heading; ?></h1>

                        <?php
//                        if (isset($description) && !empty($description)) {
//                            echo return_hero_subheading($description, $description_classes);
//                        }
                        ?>

                        <?php
//                        if ( ! empty( $button ) && $button['text']) {
//                            echo return_hero_button($button);
//                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

