<div class="content image-list-container bg-blue-light">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <ul class="list-group list-group-horizontal">
                    <?php
                    if (have_rows('global_brands', 'option')):
                        $list = '';
                        while (have_rows('global_brands', 'option')) : the_row();
                            $list .= '<li class="list-group-item flex-fill text-center">';
//                            $list .= '<h4>' . get_sub_field('global_brands_name', 'option') . '</h4>';
                            $list .= '<img src="' . get_sub_field('global_brands_image', 'option') . '" />';
                            $list .= '</li>';
                        endwhile;
                        echo $list;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>