<div class="d-flex flex-row justify-content-end">
    <div class="input-group me-3 qty-container">
        <label class="input-group-text" for="qty">Qty:</label>
        <select class="form-select" id="qty">
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="flex-grow-1 ps-md-4 ps-lg-5">
        <button id="custom-add" class="btn-new w-100 d-block shadow-sm">Add to Cart</button>
    </div>
</div>

