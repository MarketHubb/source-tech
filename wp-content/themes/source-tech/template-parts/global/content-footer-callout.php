<?php
$hero = get_field('page_banner_details');

if ($hero) : ?>

    <div class="jumbotron bg-cover text-white mb-0" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.85) 0%,rgba(0,0,0,0.85) 100%), url(<?php echo $hero['page_banner_image']; ?>)">
        <div class="container text-center">
            <h2 class="display-4 font-weight-bold">Let's Get in Touch</h2>
            <p class="lead">SourceTech has the enterprise IT hardware, replacement parts and service expertise to help you.</p>
            <hr class="my-4">
            <ul class="list-group w-100 list-group-horizontal no-border">
                <li class="list-group-item flex-fill no-border text-center text-white bg-transparent">
                    <i class="fas inline-block mb-3 fa-comments-alt text-white fa-2x"></i>
                    <p class="lead font-weight-bold text-white alert-cta" onclick='$zoho.salesiq.floatwindow.visible("show");'>Live Chat</p>
                </li>
                <li class="list-group-item flex-fill no-border text-center text-white bg-transparent">
                    <i class="fas inline-block mb-3 fa-phone text-white fa-2x"></i>
                    <p class="lead font-weight-bold text-white alert-cta"><a class="text-white" href="tel:800-932-0657">800-932-0657</a></p>
                </li>
                <li class="list-group-item flex-fill no-border text-center text-white bg-transparent">
                    <i class="fas inline-block mb-3 fa-envelope text-white fa-2x"></i>
                    <p class="lead font-weight-bold text-white alert-cta"><a class="text-white" href="mailto:info@source-tech.net">info@source-tech.net</a></p>
                </li>
            </ul>

        </div>
    </div>

<?php endif; ?>