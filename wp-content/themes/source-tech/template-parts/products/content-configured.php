<div class="container">
    <div class="wrapper">
        <div class="row content h-section-left align-items-center">
            <div class="col-md-4 pr-md-4">
                <i class="<?php echo get_field('global_server_configured_icon', 'option'); ?> fa-2x blue"></i>
                <h2><?php echo get_field('global_server_configured_heading', 'option'); ?></h2>
                <p class="mb-0"><em><?php echo get_field('global_server_configured_description', 'option'); ?></em></p>
                <a href="#prevent" onclick='$zoho.salesiq.floatwindow.visible("show");'
                   class="text-link"><?php echo get_field('global_server_configured_link_text', 'option'); ?></a>
            </div>

            <?php
            if (have_rows('post_servers_pre_configured')):
                $config = '';
                while (have_rows('post_servers_pre_configured')) : the_row();
                    $config .= '<div class="col-md-4">';
                    $config .= '<div class="panel shadow blue-top">';
                    $config .= '<p class="lead mb-0"><strong>' . get_sub_field('post_servers_pre_configured_name') . '</strong></p>';
                    $config .= '<p class="font-weight-normal">$' . get_sub_field('post_servers_pre_configured_price');
                    $config .= '<span class="dib ml-3 line-through">$' . get_sub_field('post_servers_pre_configured_price_retail') . '</span></p>';

                    $options = explode_content("\n", get_sub_field('post_servers_pre_configured_options'));

                    $config .= '<ul class="no-border flush">';
                    foreach ($options as $option) {
                        $config .= '<li class="bb-grey lst-none">' . $option . '</li>';
                    }
                    $config .= '</ul>';
                    $config .= '</div></div>';
                endwhile;
                echo $config;
            endif;
            ?>

        </div>
    </div>
</div>