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
							<div class="single-post-header-row">
								<div class="single-post-header-left">
									<?php the_title( '<h1 class="single-post-title">', '</h1>' ); ?>
									<div class="single-post-meta">
										<span class="single-post-author">
											<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
											<span><?php esc_html_e( 'By', 'neon-theme' ); ?> <?php the_author(); ?></span>
										</span>
										<span class="single-post-date"><?php echo get_the_date(); ?></span>
										<span class="single-post-comments"><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></span>
									</div>
								</div>
								<div class="single-post-header-share">
									<div class="single-post-share">
										<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ); ?>&url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="share-icon" title="Twitter">
											<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 5 20 0a9.5 9.5 0 0 0-9-5.5c4.75 2.25 7-7 7-7"/></svg>
										</a>
										<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="share-icon" title="Facebook">
											<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
										</a>
										<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="share-icon" title="LinkedIn">
											<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
										</a>
									</div>
								</div>
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

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile;
				?>
			</div>

			<aside class="content-sidebar">
				<?php
				// Sidebar related posts
				$current_id = get_the_ID();
				$cat_ids = wp_get_post_categories( $current_id );
				$tag_ids = wp_get_post_tags( $current_id, array( 'fields' => 'ids' ) );

				// Try same category posts first
				$sidebar_args = array(
					'posts_per_page'      => 4,
					'post__not_in'        => array( $current_id ),
					'category__in'        => $cat_ids,
					'ignore_sticky_posts' => true,
					'no_found_rows'       => true,
				);

				$sidebar_query = new WP_Query( $sidebar_args );
				$found = $sidebar_query->post_count;

				// If fewer than 4, try same tags
				if ( $found < 4 && ! empty( $tag_ids ) ) {
					$exclude = array_merge( array( $current_id ), wp_list_pluck( $sidebar_query->posts, 'ID' ) );
					$tag_args = array(
						'posts_per_page'      => 4 - $found,
						'post__not_in'        => $exclude,
						'tag__in'             => $tag_ids,
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
					);
					$tag_query = new WP_Query( $tag_args );
					foreach ( $tag_query->posts as $tag_post ) {
						$sidebar_query->posts[] = $tag_post;
					}
					$sidebar_query->post_count = count( $sidebar_query->posts );
				}

				// If still fewer than 4, fill with latest posts
				if ( $sidebar_query->post_count < 4 ) {
					$exclude = array_merge( array( $current_id ), wp_list_pluck( $sidebar_query->posts, 'ID' ) );
					$latest_args = array(
						'posts_per_page'      => 4 - $sidebar_query->post_count,
						'post__not_in'        => $exclude,
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
					);
					$latest_query = new WP_Query( $latest_args );
					foreach ( $latest_query->posts as $latest_post ) {
						$sidebar_query->posts[] = $latest_post;
					}
					$sidebar_query->post_count = count( $sidebar_query->posts );
				}

				if ( $sidebar_query->have_posts() ) :
					$sidebar_label = $found > 0 ? esc_html__( 'Related Articles', 'neon-theme' ) : esc_html__( 'Latest Posts', 'neon-theme' );
					?>
					<div class="sidebar-posts">
						<h3 class="widget-title"><?php echo $sidebar_label; ?></h3>
						<?php foreach ( $sidebar_query->posts as $sidebar_post ) : setup_postdata( $sidebar_post ); ?>
							<article class="sidebar-post-item">
								<?php if ( has_post_thumbnail( $sidebar_post->ID ) ) : ?>
									<a href="<?php echo esc_url( get_permalink( $sidebar_post->ID ) ); ?>" class="sidebar-post-thumb">
										<?php echo get_the_post_thumbnail( $sidebar_post->ID, 'thumbnail' ); ?>
									</a>
								<?php endif; ?>
								<div class="sidebar-post-body">
									<h4 class="sidebar-post-title">
										<a href="<?php echo esc_url( get_permalink( $sidebar_post->ID ) ); ?>"><?php echo esc_html( get_the_title( $sidebar_post->ID ) ); ?></a>
									</h4>
									<span class="sidebar-post-date"><?php echo get_the_date( '', $sidebar_post->ID ); ?></span>
								</div>
							</article>
						<?php endforeach; wp_reset_postdata(); ?>
					</div>
				<?php endif; ?>

				<?php get_sidebar(); ?>
			</aside>

		</div>
	</div>
</main>

<?php
get_footer();
