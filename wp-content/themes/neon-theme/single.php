<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package NEON_THEME
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="content-with-sidebar">

			<div class="content-main">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-article' ); ?>>
						<header class="single-post-header">
							<div class="single-post-categories">
								<?php $categories = get_the_category(); foreach ( $categories as $cat ) : ?>
									<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="category-badge"><?php echo esc_html( $cat->name ); ?></a>
								<?php endforeach; ?>
							</div>
							<?php the_title( '<h1 class="single-post-title">', '</h1>' ); ?>
							<div class="single-post-meta">
								<span class="single-post-author">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
									<span><?php esc_html_e( 'By', 'neon-theme' ); ?> <?php the_author(); ?></span>
								</span>
								<span class="single-post-date"><?php echo get_the_date(); ?></span>
								<span class="single-post-comments"><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></span>
							</div>
						</header>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="single-post-thumbnail">
								<?php the_post_thumbnail( 'full' ); ?>
							</div>
						<?php endif; ?>

						<div class="single-post-content">
							<?php the_content(); ?>
						</div>

						<footer class="single-post-footer">
							<div class="single-post-tags">
								<?php the_tags( '<span class="tags-label">' . esc_html__( 'Tags:', 'neon-theme' ) . '</span> ', ' ' ); ?>
							</div>
							<div class="single-post-share">
								<span class="share-label"><?php esc_html_e( 'Share:', 'neon-theme' ); ?></span>
								<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ); ?>&url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="share-icon" title="Twitter">
									<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 5 20 0a9.5 9.5 0 0 0-9-5.5c4.75 2.25 7-7 7-7"/></svg>
								</a>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="share-icon" title="Facebook">
									<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
								</a>
								<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="share-icon" title="LinkedIn">
									<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
								</a>
							</div>
						</footer>
					</article>

					<?php
					// Author bio box
					$author_desc = get_the_author_meta( 'description' );
					if ( $author_desc ) :
						?>
						<div class="author-bio-box">
							<div class="author-avatar">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
							</div>
							<div class="author-info">
								<h4 class="author-name"><?php the_author(); ?></h4>
								<p class="author-bio"><?php echo wp_kses_post( $author_desc ); ?></p>
							</div>
						</div>
					<?php endif; ?>

					<?php
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-label">' . esc_html__( 'Previous Article', 'neon-theme' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-label">' . esc_html__( 'Next Article', 'neon-theme' ) . '</span> <span class="nav-title">%title</span>',
						)
					);

					// Related posts
					$related = new WP_Query( array(
						'posts_per_page'      => 3,
						'post__not_in'        => array( get_the_ID() ),
						'category__in'        => wp_get_post_categories( get_the_ID() ),
						'ignore_sticky_posts' => true,
					) );
					if ( $related->have_posts() ) : ?>
						<section class="related-posts">
							<h3 class="related-posts-title"><?php esc_html_e( 'Related Articles', 'neon-theme' ); ?></h3>
							<div class="posts-grid posts-grid-3">
								<?php while ( $related->have_posts() ) : $related->the_post(); ?>
									<article class="post-card post-card-default">
										<?php if ( has_post_thumbnail() ) : ?>
											<a href="<?php the_permalink(); ?>" class="post-card-thumb">
												<?php the_post_thumbnail( 'medium' ); ?>
											</a>
										<?php endif; ?>
										<div class="post-card-body">
											<h4 class="post-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											<div class="post-card-meta">
												<span class="post-card-date"><?php echo get_the_date(); ?></span>
											</div>
										</div>
									</article>
								<?php endwhile; wp_reset_postdata(); ?>
							</div>
						</section>
					<?php endif;

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile;
				?>
			</div>

			<aside class="content-sidebar">
				<?php get_sidebar(); ?>
			</aside>

		</div>
	</div>
</main>

<?php
get_footer();
