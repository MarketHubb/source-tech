<?php
/**
* Template Name: Model Demo
*/
get_header(); ?>

<?php 
$query_args = array(
	'post_type' => 'product',
	'p' => 1323
);

$query = new WP_Query($query_args);

while ($query->have_posts()) : $query->the_post();
	
	$post_id = get_the_ID();
	
endwhile;

$model = ri_remove_model_name_adjectives($post_id);

?>

<div class="custom-page-content" id="custom-model-page-template">
	<!-- Banner -->
	<div class="row model-page-title">
		<div class="col">
			<h1 class="page-title"><?php echo get_the_title($post_id); ?></h1>
			<?php 
			if( have_rows('post_product_tags') ):
				$tags = '';
			    while ( have_rows('post_product_tags') ) : the_row();
			        $tags .= '<span class="badge badge-pill badge-primary model-page-tags">' . get_sub_field('post_product_tags_tag') . '</span>';
			    endwhile;
			    echo $tags;
			endif;
				
				
			 ?>
		</div>
	</div>
	<div class="row">
		<div class="col col-md-6 col-lg-6" id="model-page-image-container">
			<?php 
			if( have_rows('post_product_product_images') ):
				$i = 1;
				$images = '<div class="row image-thumb-container">';
			    while ( have_rows('post_product_product_images') ) : the_row();
			    	if ($i === 1) {
			    		$image_class = ' active';
			    		$load_image  = '<img src="' . get_sub_field('post_product_product_images_image') . '" class="model-page-featured-image" />';
			    		// $load_image .= '<p class="model-page-featured-description">' .  get_sub_field('post_product_product_images_description') . '</p>';
			    	} else {
			    		$image_class = ' ';
			    	}
					$images .= '<div class="col col-md-3 col-lg-3' . $image_class . '">';
			        $images .= '<img src="' . get_sub_field('post_product_product_images_image') . '" class="img-thumbnail rounded float-left" />';
					$images .= '</div>';
			        
			        $i++;
			    endwhile;
			    $images .= '</div>';
			endif;
			echo $load_image;
			echo $images;
			
				
				
			 ?>
		</div>
		<div class="col col-md-6 col-lg-6">
			<h4 class="model-page-description-label">Description:</h4>
			<p class="model-page-description"><?php the_field('post_product_product_description'); ?></p>
		</div>
	</div>
	
	<!-- Testimonial -->
	<div class="row model-page-testimonial">
		<div class="col">
			<blockquote class="blockquote text-center">
				<i class="fal fa-quote-right"></i>
				<p class="mb-0">"Abundant supply. Fastest service. Lowest prices. Proven in multiple deals. Our #1 choice"</p>
				<footer class="blockquote-footer"><cite title="Source Title">UMMC Tidwell</cite></footer>
			</blockquote>
		</div>
	</div>
	
	<!-- Tabs -->
	<div class="row" id="model-page-tabs">
		<div class="col">
			<ul class="nav nav-tabs nav-fill">
				<li class="nav-item">
					<a class="nav-link active" href="#specs" data-toggle="tab" role="tab"><i class="fal fa-server fa-lg"></i><?php echo $model . ' Specs'; ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#why" data-toggle="tab" role="tab"><i class="fal fa-hdd fa-lg"></i>Why SourceTech</a>
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
	
	<!-- Tab Content -->
	<div class="row" id="model-page-tabs-content">
		<div class="col">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="specs" role="tabpanel" aria-labelledby="specs-tab">
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Label</th>
								<th scope="col">Values</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if( have_rows('post_product_specs') ):
								$specs_table = '';
							    while ( have_rows('post_product_specs') ) : the_row();
							    	$specs_table .= '<tr>';
							        $specs_table .= '<th scope="row">' . get_sub_field('post_product_specs_label') . '</th>';
							        $specs_table .= '<td>' . get_sub_field('post_product_specs_value') . '</td>';
							    	$specs_table .= '</tr>';
							    endwhile;
							endif;
							
							echo $specs_table;
							 ?>
						</tbody>
					</table>
				</div>
				
				<div class="tab-pane fade" id="why" role="tabpanel" aria-labelledby="why-tab">...</div>
				<div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">...</div>
			</div>
		</div>
	</div>
	
	
</div><!-- custom-model-page-template -->

<?php get_footer(); ?>
