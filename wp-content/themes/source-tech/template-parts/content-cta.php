<?php
$manufacturer = get_query_var('manufacturer');

if ($post->post_type == 'servers' || $post->post_type == 'networking') {
    $mail_subject = 'Website inquiry for ' . get_the_title() . ' | SourceTech Systems';
} else {
    $mail_subject = "Website Inquiry | SourceTech Systems";
}
?>

<div class="inline-block cta-card shadow">
    <ul class="list-group list-group-flush">
        <li class="list-group-item bg-orange text-white">3 Easy Ways to Get a Quote</li>
        <li class="list-group-item">
            <p class="cta-lead-copy text-right mb-0 pb-0">Live Chat 24x7 <i class="fas fa-comments-alt"></i></p>
            <span class="cta-chat cta-copy" onclick='$zoho.salesiq.floatwindow.visible("show");'>Chat Now <i class="far fa-long-arrow-right"></i></span>
        </li>
        <li class="list-group-item">
            <p class="cta-lead-copy text-right mb-0 pb-0">Call our <?php echo $manufacturer; ?> experts <i class="fas fa-phone"></i></p>
            <a href="tel:800-932-0657" class="cta-phone cta-copy">800-932-0657 <i class="far fa-long-arrow-right"></i></a>
        </li>
        <li class="list-group-item">
            <p class="cta-lead-copy text-right mb-0 pb-0">Email configuration details <i
                        class="fas fa-envelope-open-text"></i></p>
            <a href="mailto:info@source-tech.net?subject=<?php echo rawurlencode($mail_subject); ?>" class="cta-email cta-copy">info@source-tech.net <i class="far fa-long-arrow-right"></i></a>
        </li>
    </ul>
</div>