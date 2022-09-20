<div class="sticky-top">
<?php
$tab_links = ['Order', 'specs', 'warranty', 'support'];
$tabs = '<ul class="nav nav-pills nav-fill ms-0" id="productOverviewTabs">';
$tab_content = '<div class="tab-content" id="singleTabContent">';
$i = 1;

foreach ($tab_links as $link) {
    $active = $i === 1 ? ' active' : '';

    $tabs .= '<li class="nav-item" role="presentation">';
    $tabs .= '<a class="nav-link' . $active . '" id="' . $link . '-tab" data-bs-toggle="tab" ';
    $tabs .= 'data-bs-target="#' . $link . '" type="button" role="tab" aria-controls="' . $link . '" aria-selected="true" href="#">' . ucfirst($link) . '</a>';
    $tabs .= '</li>';

    $tab_content .= '<div class="tab-pane fade show' . $active . '" id="' . $link . '" ';
    $tab_content .= 'role="tabpanel" aria-labelledby="' . $link . '-tab">';
    $tab_content .= "<h3>{$link}</h3>";

    if ($link === 'Order') {
        $tab_content .= get_all_server_components(get_the_ID());
    }

    $tab_content .= '</div>';

    $i++;
}
$tabs .= '</ul>';
$tab_content .= '</div>';
echo $tabs;
echo $tab_content;
// get_template_part('template-parts/components/lists');
?>
</div>