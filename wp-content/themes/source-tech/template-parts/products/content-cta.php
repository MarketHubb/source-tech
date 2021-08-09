<div class="bg-light-blue py-5">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row mb-4">
                <?php
                $manufacturers = get_the_terms($post->ID, 'server_manufacturers');
                $manufacturer = $manufacturers[0]->name;
                ?>
                <div class="col-md-12 text-center">
                    <p class="lead mb-0">Need help ordering?</p>
                    <h2 class="text-blue-dark">Get in touch with a <?php echo $manufacturer; ?> solutions expert now</h2>
                </div>
            </div>
                <div class="row pt-4">
                    <div class="col-md-4 text-center">
                        <i class="fa-light text-blue fa-phone fa-4x block mb-3"></i>
                        <a href="tel:713-932-0657" class="cta-phone cta-copy">713-932-0657</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fa-light text-blue fa-envelope-dot fa-4x block mb-3"></i>
                        <a href="mailto:info@source-tech.net?subject=Website%20inquiry%20for%20Dell%20PowerEdge%20R740%20%7C%20SourceTech%20Systems" class="cta-email cta-copy">info@source-tech.net</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fa-light text-blue fa-comment-quote fa-4x block mb-3"></i>
                        <span class="cta-chat cta-copy" onclick="$zoho.salesiq.floatwindow.visible(&quot;show&quot;);">Live Chat</span>
                    </div>
            </div>
        </div>
    </div>
</div>