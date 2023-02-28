<div class="d-flex flex-row justify-content-center">
    <div class="flex-grow-1 p-3 p-md-4 px-md-5 text-center">
        <?php $btn_data = 'data-bs-toggle="modal" data-bs-target="#customModal" data-product="' . get_the_title() . '"'; ?>
        <button id="custom-add" class="btn-new w-100 d-inline-block shadow-sm" <?php echo $btn_data; ?>>Request a Quote</button>
        <p class="mt-3 small fst-italic">Get a fast, free same business-day quote on the <?php the_title(); ?></p>
    </div>
</div>

