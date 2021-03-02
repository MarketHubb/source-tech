<?php $order_class = ($args['row_index'] % 2 == 0) ? 'order-md-last' : ''; ?>
<div class="content">
    <div class="container-fluid">
        <div class="wrapper">

            <div class="row align-items-center justify-content-between">

                <!-- Heading -->
                <div class="col-md-5 <?php echo $order_class; ?>">
                    <?php
                    foreach ($args['section_heading'] as $key => $val) {
                        echo $val;
                    }
                    ?>
                </div>

                <!-- Content -->
                <div class="col-md-5 px-sm-2 px-md-4 px-lg-5">
                    <?php echo $args['section_content']; ?>
                </div>

            </div>
        </div>
    </div>
</div>