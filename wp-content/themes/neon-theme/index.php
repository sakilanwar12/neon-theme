<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package NEON_THEME
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="content-with-sidebar">

			<div class="content-main">
				<header class="page-header-archive">
					<h1 class="page-title">
						<?php
						if ( is_home() && ! is_front_page() ) {
							single_post_title();
						} elseif ( is_archive() ) {
							the_archive_title();
						} else {
							esc_html_e( 'Latest News', 'neon-theme' );
						}
						?>
					</h1>
					<?php if ( is_archive() ) { the_archive_description( '<div class="archive-description">', '</div>' ); } ?>
				</header>

				<?php if ( have_posts() ) : ?>
					<div class="posts-grid">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card post-card-default' ); ?>>
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" class="post-card-thumb">
										<?php the_post_thumbnail( 'medium_large' ); ?>
									</a>
								<?php endif; ?>
								<div class="post-card-body">
									<div class="post-card-categories">
										<?php $categories = get_the_category(); foreach ( $categories as $cat ) : ?>
											<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="post-cat"><?php echo esc_html( $cat->name ); ?></a>
										<?php endforeach; ?>
									</div>
									<h3 class="post-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="post-card-meta">
										<span class="post-card-date"><?php echo get_the_date(); ?></span>
										<span class="post-card-author"><?php esc_html_e( 'By', 'neon-theme' ); ?> <?php the_author(); ?></span>
									</div>
									<p class="post-card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
									<a href="<?php the_permalink(); ?>" class="read-more-link"><?php esc_html_e( 'Read More', 'neon-theme' ); ?> &rarr;</a>
								</div>
							</article>
						<?php endwhile; ?>
					</div>

					<div class="pagination-wrapper">
						<?php the_posts_pagination(); ?>
					</div>

				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
			</div>

			<aside class="content-sidebar">
				<?php get_sidebar(); ?>
			</aside>

		</div>
	</div>
</main>

<?php
get_footer();
