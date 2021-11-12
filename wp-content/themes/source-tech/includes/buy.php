<?php
function return_price($price, $callout, $features=array())
{
    $p  = '<div class="row align-items-center my-3">';
    $p .= '<div class="col">';
    $p .= '<h3 class="d-inline-block price-red mb-3">$' . $price . '</h3>';

    if ($callout) {
        $p .= '<span class="text-secondary px-3">|</span>';
        $p .= '<span class="text-success fw-bold">In-stock: Qty 41</span>';
    }

    if ($features && !empty($features)) {
        foreach ($features as $feature) {
            $p .= '<p class="mb-0 fst-italic"><i class="fa-regular fa-check text-success me-2"></i>';
            $p .= $feature;
            $p .= '</p>';
        }
    }

    $p .= '</div></div>';

    return $p;
}
