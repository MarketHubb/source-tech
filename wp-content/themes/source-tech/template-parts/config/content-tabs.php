<nav class="nav nav-fill" id="order-links">
    <a class="nav-link fw-bold anti pb-0 active" aria-current="page" data-type="custom-config">
        <span>Custom Configure</span>
    </a>
    <a class="nav-link fw-bold anti pb-0" data-type="pre-config">
        <span>Browse Pre-configured</span>
    </a>
</nav>

<div class="pb-4 order-container">
    <?php get_template_part('template-parts/products/content', 'customconfigured'); ?>
    <?php get_template_part('template-parts/products/content', 'preconfigured'); ?>
</div>
