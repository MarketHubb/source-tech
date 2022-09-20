<div class="order-type-container" id="custom-config">
    <div class="sticky-md-top p-5 p-lg-5  bg-light border border-1 rounded-1 product-summary">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4 class="mb-4">Configuration Summary</h4>
                </div>
            </div>
        </div>
        <table class="table table-borderless">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>
                    <span class="fw-bold">Price as configured</span>
                    <div class="" id="summary-config">
                        <?php echo return_formatted_component_summary(get_the_ID()); ?>
                    </div>
                </th>
                <th id="total-qty" data-quantity="1">1</th>
                <th id="total-price" data-base="1995" data-configured="1995" data-total="1995">$1995.00</th>
            </tr>
            </tbody>
        </table>

        <div class="my-1">
            <hr class="">
        </div>

        <form class="row align-items-end justify-content-between" action="">
            <div class="col-2">
                <label for="server_qty" class="form-label">Qty:</label>
                <?php
                $server_qty = '<select id="qty-select" class="form-select" aria-label="select">';
                for ($i = 1; $i < 11; $i++) {
                    $server_qty .= '<option value="' . $i . '">';
                    $server_qty .= $i . '</option>';
                }
                $server_qty .= '</select>';
                echo $server_qty;
                ?>
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-primary w-100">Add to cart</button>
            </div>

        </form>
    </div>
</div>