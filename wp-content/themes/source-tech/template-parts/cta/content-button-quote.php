<!-- CTA Button -->
<?php
$primary_btn = array(
    'text' => '<i class="fa-solid fa-file-lines me-2"></i> Request a Quote',
    'data' => 'data-bs-toggle="modal" data-bs-target="#customModal" data-product="' . get_the_title() . '"',
    'type' => 'primary'
);
echo return_cta_btn($primary_btn);
?>