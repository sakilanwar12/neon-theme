<?php
/**
 * Template Name: Front Page
 * The front page template for the Neon Theme newspaper
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package NEON_THEME
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<div class="container">
			<div class="newspaper-layout">

				<!-- Featured Post (Hero) -->
				<section class="featured-post-section">
					<?php
					$featured = new WP_Query( array(
						'posts_per_page'      => 1,
						'ignore_sticky_posts' => true,
					) );
					if ( $featured->have_posts() ) : while ( $featured->have_posts() ) : $featured->the_post(); ?>
						<article class="featured-post">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="featured-thumbnail">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'full' ); ?>
									</a>
								</div>
							<?php endif; ?>
							<div class="featured-content">
								<div class="featured-categories">
									<?php $categories = get_the_category(); foreach ( $categories as $cat ) : ?>
										<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="category-badge"><?php echo esc_html( $cat->name ); ?></a>
									<?php endforeach; ?>
								</div>
								<h2 class="featured-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="featured-meta">
									<span class="featured-date"><?php echo get_the_date(); ?></span>
									<span class="featured-author"><?php esc_html_e( 'By', 'neon-theme' ); ?> <?php the_author(); ?></span>
								</div>
								<p class="featured-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 30 ); ?></p>
								<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php esc_html_e( 'Read More', 'neon-theme' ); ?></a>
							</div>
						</article>
					<?php endwhile; wp_reset_postdata(); endif; ?>
				</section>

				<!-- Breaking News Bar -->
				<section class="breaking-news-bar">
					<span class="breaking-title"><?php esc_html_e( 'Latest News', 'neon-theme' ); ?></span>
					<div class="breaking-posts">
						<?php
						$latest = new WP_Query( array(
							'posts_per_page'      => 5,
							'ignore_sticky_posts' => true,
							'offset'              => 1,
						) );
						if ( $latest->have_posts() ) : while ( $latest->have_posts() ) : $latest->the_post(); ?>
							<span class="breaking-item">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<span class="breaking-sep">|</span>
							</span>
						<?php endwhile; wp_reset_postdata(); endif; ?>
					</div>
				</section>

				<!-- Main Content Area: Grid Posts + Sidebar -->
				<div class="content-with-sidebar">

					<div class="content-main">

						<!-- Category Sections -->
						<?php
						$categories = get_categories( array( 'hide_empty' => true, 'number' => 3 ) );
						foreach ( $categories as $category ) :
							$cat_posts = new WP_Query( array(
								'posts_per_page'      => 4,
								'cat'                 => $category->term_id,
								'ignore_sticky_posts' => true,
							) );
							if ( $cat_posts->have_posts() ) :
								?>
								<section class="category-section">
									<div class="section-header">
										<h2 class="section-title-left">
											<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
										</h2>
										<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="view-all-link"><?php esc_html_e( 'View All', 'neon-theme' ); ?> &rarr;</a>
									</div>
									<div class="category-posts-grid">
										<?php
										$count = 0;
										while ( $cat_posts->have_posts() ) : $cat_posts->the_post();
											$count++;
											if ( $count === 1 ) :
												// First post: large
												?>
												<article class="post-card post-card-large">
													<?php if ( has_post_thumbnail() ) : ?>
														<a href="<?php the_permalink(); ?>" class="post-card-thumb">
															<?php the_post_thumbnail( 'large' ); ?>
														</a>
													<?php endif; ?>
													<div class="post-card-body">
														<h3 class="post-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
														<div class="post-card-meta">
															<span class="post-card-date"><?php echo get_the_date(); ?></span>
														</div>
														<p class="post-card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
													</div>
												</article>
												<?php
											else :
												// Remaining posts: small
												?>
												<article class="post-card post-card-small">
													<?php if ( has_post_thumbnail() ) : ?>
														<a href="<?php the_permalink(); ?>" class="post-card-thumb">
															<?php the_post_thumbnail( 'medium' ); ?>
														</a>
													<?php endif; ?>
													<div class="post-card-body">
														<h3 class="post-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
														<div class="post-card-meta">
															<span class="post-card-date"><?php echo get_the_date(); ?></span>
														</div>
													</div>
												</article>
												<?php
											endif;
										endwhile;
										wp_reset_postdata();
										?>
									</div>
								</section>
								<?php
							endif;
						endforeach;
						?>

						<!-- Latest Posts Grid -->
						<section class="latest-posts-section">
							<div class="section-header">
								<h2 class="section-title-left"><?php esc_html_e( 'Latest Articles', 'neon-theme' ); ?></h2>
							</div>
							<div class="posts-grid">
								<?php
								$latest_posts = new WP_Query( array(
									'posts_per_page'      => 9,
									'ignore_sticky_posts' => true,
									'offset'              => 1,
								) );
								if ( $latest_posts->have_posts() ) :
									while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
										<article class="post-card post-card-default">
											<?php if ( has_post_thumbnail() ) : ?>
												<a href="<?php the_permalink(); ?>" class="post-card-thumb">
													<?php the_post_thumbnail( 'medium_large' ); ?>
												</a>
											<?php endif; ?>
											<div class="post-card-body">
												<div class="post-card-categories">
													<?php $cats = get_the_category(); foreach ( $cats as $c ) : ?>
														<a href="<?php echo esc_url( get_category_link( $c->term_id ) ); ?>" class="post-cat"><?php echo esc_html( $c->name ); ?></a>
													<?php endforeach; ?>
												</div>
												<h3 class="post-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<div class="post-card-meta">
													<span class="post-card-date"><?php echo get_the_date(); ?></span>
													<span class="post-card-comments"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?> <?php esc_html_e( 'Comments', 'neon-theme' ); ?></a></span>
												</div>
												<p class="post-card-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
											</div>
										</article>
									<?php endwhile;
									wp_reset_postdata();
								endif;
								?>
							</div>
						</section>

						<!-- Pagination -->
						<div class="pagination-wrapper">
							<?php
							$big = 999999999;
							echo paginate_links( array(
								'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format'  => '?paged=%#%',
								'current' => max( 1, get_query_var( 'paged' ) ),
								'total'   => $latest_posts->max_num_pages,
							) );
							?>
						</div>

					</div>

					<!-- Sidebar -->
					<aside class="content-sidebar">
						<?php get_sidebar(); ?>
					</aside>

				</div>

			</div>
		</div>

	</main>
</div>

<?php get_footer(); ?>
