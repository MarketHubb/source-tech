<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Source_Tech
 */

?>
<div class="bg-"></div>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title test"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				source_tech_posted_on();
				source_tech_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php source_tech_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
            $excerpt = the_excerpt(sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'source-tech'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ));

            if (!empty($excerpt)) {
                echo $excerpt;
            } else {
                echo '<p>' . get_field('pos_quick_read') . '</p>';
            }

		?>
		<p><a href="<?php echo get_permalink(); ?>" class="button read-more">Read More</a></p>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php source_tech_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
