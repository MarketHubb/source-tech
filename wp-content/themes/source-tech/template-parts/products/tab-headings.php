<div class="row" id="model-page-tabs">
    <div class="col">
        <ul class="nav nav-tabs nav-fill" id="model-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#server" data-toggle="tab" role="tab"><i class="fal fa-server fa-lg"></i>Overview</a>
            </li>
            <li class="nav-item">
                <?php $specs_tab = (get_post_type() === 'servers') ? 'Specs' : 'Models'; ?>
                <a class="nav-link" href="#specs" data-toggle="tab" role="tab"><i class="fal fa-file-alt fa-lg"></i><?php echo $specs_tab; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#faq" data-toggle="tab" role="tab"><i class="fal fa-question-circle fa-lg"></i>FAQs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#warranty" data-toggle="tab" role="tab"><i class="fal fa-certificate fa-lg"></i>Warranty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#shipping" data-toggle="tab" role="tab"><i class="fal fa-shipping-fast fa-lg"></i>Shipping</a>
            </li>
        </ul>
    </div>
</div>