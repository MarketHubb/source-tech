<?php
$categories = get_the_category();
$heading = (get_field('post_banner_title')) ? get_field('post_banner_title') : get_the_title();
$sub_heading = (get_field('post_banner_subtitle')) ? get_field('post_banner_subtitle') : '';
$dates = compare_published_updated_dates($post->ID);
$published_read = '';
foreach ($dates as $key => $val) {
    $published_read .= '<p><i class="fas fa-calendar-week"></i> ' . ucwords($key) . ': <strong>' . $val . '</strong></p>';
}
if (get_field('post_read_time')) {
    $published_read .= '<p><i class="fas fa-clock"></i> Read Time: ' . '<strong>' . get_field('post_read_time') . ' minutes</strong></p>';
}
?>

<?php if (!get_field('post_featured_image')) { ?>
<div class="bg-blue">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1 class="blog-title pt-3 pb-3 mt-2 mb-2"><?php echo $heading; ?></h1>
                <p class="blog-subtitle"><?php echo $sub_heading; ?></p>
                <div class="publish-container">
                    <?php echo $published_read; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } else {
    $banner_url = get_field('post_featured_image');
?>
<!-- Page Title (Banner) -->
<div class="container-fluid p-0">
    <div class="banner-container" style="background-image: url('<?php echo $banner_url; ?>');">
        <div class="banner-overlay dark">
            <div class="container h-100 py-5">
                <div class="row h-100 pt-4 pb-4 align-items-center">
                    <div class="col-12 text-center">
                        <?php
                        $cats = '<ul class="post-categories">';
                        foreach ($categories as $category) {
                            if ($category->name != 'Uncategorized') {
                                $cats .= '<li><i class="fas fa-tag text-blue mr-2"></i>' . $category->name . '</li>';
                            }
                        }
                        $cats .= '</ul>';
                        echo $cats;
                        ?>
                        <h1 class="banner-headline mt-2"><?php echo $heading; ?></h1>
                        <p class="banner-subheadline mb-5"><?php echo $sub_heading; ?></p>
                        <div class="publish-container">
                            <?php echo $published_read; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>


