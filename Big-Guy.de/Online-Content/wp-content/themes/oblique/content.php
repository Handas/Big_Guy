<?php
/**
 * The template used for displaying page content
 *
 * @package Oblique
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="svg-container post-svg svg-block">
		<?php echo oblique_svg_3(); ?>
	</div>	

	<?php if ( has_post_thumbnail() && ( get_theme_mod( 'index_feat_image' ) != 1 ) ) : ?>
		<div class="entry-thumb">
			<?php the_post_thumbnail( 'oblique-entry-thumb' ); ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumb-link-wrap">
				<span class="thumb-link"><i class="fa fa-link"></i></span>
			</a>
		</div>
	<?php endif; ?>	


	<?php if ( ! get_theme_mod( 'read_more' ) ) : ?>
	<div class="read-more">
		<a href="<?php the_permalink(); ?>"><?php echo __( 'Continue reading &hellip;','oblique' ); ?></a>
	</div>		
	<?php endif; ?>
	<div class="svg-container post-bottom-svg svg-block">
		<?php echo oblique_svg_1(); ?>
	</div>	
</article><!-- #post-## -->
