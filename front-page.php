<?php
/**
 * Perlovs. Front page template.
 *
 *
 * @since 1.0.0
 */
get_header();
?>
	<div class="container">
		<div class="row">
			<div id="primary" <?php perlovs_primary_attr(); ?>>
				<?php
				while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php if ( ! is_front_page() ) { ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
							<?php } ?>

						    <div class="entry-content">
							    <?php the_content( __( 'Read more &rarr;', 'ward' ) ); ?>
						    </div><!-- .entry-content -->

						    <?php get_template_part( 'content', 'footer' ); ?>
					</article><!-- #post-<?php the_ID(); ?> -->

					<?php
				endwhile;
				$args = array(
		  			'orderby' => 'name',
		  			'parent' => 0
		  		);
				$categories = get_categories( $args );
				foreach ( $categories as $category ) {
					echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a><br/>';
				}
				?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>