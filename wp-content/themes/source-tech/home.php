<?php
/**
 * The template for displaying the blog post index page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Source_Tech
 */

get_header();
?>

<div class="blog">
    <div class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'blog');

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.

		the_posts_pagination();
		
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar('blog');  ?>
</div>
</div>

<?php get_footer(); ?>
