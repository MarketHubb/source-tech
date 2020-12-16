<?php
$container_color_class = 'bg-blue';
?>

<div class="content testimonial-container <?php echo $container_color_class; ?>">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col-md-5 h-100">
                    <h3 class="display-4">What our customers are saying</h3>
                </div>
                <div class="col-md-7 h-100">
                    <p class="lead mb-0">"<?php the_field('post_servers_testimonial'); ?>"</p>
                    <p class="mt-3 mb-0"><strong>- <?php the_field('post_servers_author'); ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>