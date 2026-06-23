<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package NEON_THEME
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card post-card-default' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="post-card-thumb">
			<?php the_post_thumbnail( 'medium_large' ); ?>
		</a>
	<?php endif; ?>
	<div class="post-card-body">
		<div class="post-card-categories">
			<?php $categories = get_the_category(); if ( ! empty( $categories ) ) : foreach ( $categories as $cat ) : ?>
				<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="post-cat"><?php echo esc_html( $cat->name ); ?></a>
			<?php endforeach; endif; ?>
		</div>
		<?php the_title( '<h3 class="post-card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		<div class="post-card-meta">
			<?php if ( 'post' === get_post_type() ) : ?>
				<span class="post-card-date"><?php echo get_the_date(); ?></span>
				<span class="post-card-author"><?php esc_html_e( 'By', 'neon-theme' ); ?> <?php the_author(); ?></span>
			<?php endif; ?>
		</div>
		<p class="post-card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
		<a href="<?php the_permalink(); ?>" class="read-more-link"><?php esc_html_e( 'Read More', 'neon-theme' ); ?> &rarr;</a>
	</div>
</article>
