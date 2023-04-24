<?php
$custom_config = get_query_var('custom_config');

if (!$custom_config) { ?>
    <div class="row">
        <div class="col-12 col-md-12">
            <h5 class="my-1 text-blue-800">Save up to 30%</h5>
            <p class="mb-0">In stock. Fast, free shipping</p>
        </div>
    </div>
<?php } else { ?>
    <div class="d-flex flex-row justify-content-between">
        <div class="">
            <h5 class="d-inline-block my-1 text-blue-800">Total:</h5>
            <p class="d-block mb-0 invisible unit-labels">Per Server</p>
        </div>
        <div class="">
            <h5 class="d-inline-block mb-0 text-end anti" id="total-price">$0</h5>
            <p class="d-block mb-0 text-end invisible unit-labels" id="unit-price">$0</p>
        </div>
    </div>
<!--    <div class="row">-->
<!--        <div class="col-6 col-md-6">-->
<!--            <h5 class="my-1 text-blue-800">Total:</h5>-->
<!--            <p class="mb-0 invisible unit-labels"></p>-->
<!--        </div>-->
<!--        <div class="col-6 col-md-6">-->
<!--            <h5 class="mb-0 text-end" id="total-price">$0</h5>-->
<!--            <p class="mb-0 text-end invisible unit-labels" id="unit-price">$0</p>-->
<!--        </div>-->
<!--    </div>-->
<?php } ?>
