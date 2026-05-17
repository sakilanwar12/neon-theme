<?php
/**
 * Template part for displaying a project in project grid
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NEON_THEME
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?> data-project-category="<?php echo esc_attr( get_the_ID() ); ?>">
	
	<?php
	if ( has_post_thumbnail() ) :
		?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php
				the_post_thumbnail( 'medium_large', array(
					'alt' => the_title_attribute( array( 'echo' => false ) ),
				) );
				?>
			</a>
		</div><!-- .post-thumbnail -->
		<?php
	endif;
	?>

	<div class="entry-header" style="padding: var(--spacing-lg);">
		<h3 class="entry-title" style="margin: 0 0 var(--spacing-sm) 0;">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h3>

		<?php
		if ( has_excerpt() ) :
			?>
			<div class="entry-summary" style="margin: var(--spacing-md) 0 0 0; padding: 0;">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<?php
		endif;
		?>

		<div style="display: flex; gap: var(--spacing-md); margin-top: var(--spacing-lg);">
			<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm" style="font-size: 0.75rem; padding: 0.5rem 1rem;">
				<?php esc_html_e( 'View Project', 'neon-theme' ); ?>
			</a>
		</div>
	</div><!-- .entry-header -->

</article><!-- #post-<?php the_ID(); ?> -->
