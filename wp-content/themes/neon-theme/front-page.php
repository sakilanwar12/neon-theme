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

		<!-- Breaking News Bar (Full Width) -->
		<section class="breaking-news-bar">
			<div class="container">
				<span class="breaking-title"><?php esc_html_e( 'Latest News', 'neon-theme' ); ?></span>
				<div class="breaking-posts">
					<?php
					$latest = new WP_Query( array(
						'posts_per_page'      => 8,
						'ignore_sticky_posts' => true,
					) );
					if ( $latest->have_posts() ) :
						while ( $latest->have_posts() ) : $latest->the_post(); ?>
							<span class="breaking-item">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<span class="breaking-sep">|</span>
							</span>
						<?php endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
		</section>

		<!-- Hero Masonry Grid (Full Width) -->
		<section class="hero-masonry">
			<div class="container">
				<div class="masonry-grid">
					<?php
					$hero_posts = new WP_Query( array(
						'posts_per_page'      => 6,
						'ignore_sticky_posts' => true,
					) );
					$count = 0;
					if ( $hero_posts->have_posts() ) :
						while ( $hero_posts->have_posts() ) : $hero_posts->the_post();
							$count++;
							$class = 'masonry-item';
							if ( $count === 1 ) $class .= ' masonry-featured';
							elseif ( $count <= 3 ) $class .= ' masonry-medium';
							else $class .= ' masonry-small';
							?>
							<article class="<?php echo $class; ?>">
								<a href="<?php the_permalink(); ?>" class="masonry-link">
									<?php if ( has_post_thumbnail() && $count <= 3 ) : ?>
										<div class="masonry-thumb">
											<?php the_post_thumbnail( $count === 1 ? 'full' : 'medium_large' ); ?>
										</div>
									<?php endif; ?>
									<div class="masonry-body">
										<?php $cats = get_the_category(); if ( ! empty( $cats ) ) : ?>
											<span class="masonry-cat"><?php echo esc_html( $cats[0]->name ); ?></span>
										<?php endif; ?>
										<h3 class="masonry-title"><?php the_title(); ?></h3>
										<?php if ( $count === 1 ) : ?>
											<p class="masonry-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 25 ); ?></p>
										<?php endif; ?>
										<span class="masonry-date"><?php echo get_the_date(); ?></span>
									</div>
								</a>
							</article>
						<?php endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
		</section>

		<!-- Secondary Featured (Full Width) -->
		<section class="secondary-featured">
			<div class="container">
				<?php
				$sec = new WP_Query( array(
					'posts_per_page'      => 4,
					'offset'              => 6,
					'ignore_sticky_posts' => true,
				) );
				if ( $sec->have_posts() ) :
					while ( $sec->have_posts() ) : $sec->the_post(); ?>
						<article class="sec-post-card">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="sec-thumb">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
								</div>
							<?php endif; ?>
							<div class="sec-body">
								<?php $scats = get_the_category(); if ( ! empty( $scats ) ) : ?>
									<a href="<?php echo esc_url( get_category_link( $scats[0]->term_id ) ); ?>" class="category-badge category-badge-sm"><?php echo esc_html( $scats[0]->name ); ?></a>
								<?php endif; ?>
								<h3 class="sec-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p class="sec-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 12 ); ?></p>
							</div>
						</article>
					<?php endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</section>

		<!-- Newspaper Content Grid (Full Width) -->
		<div class="newspaper-content-grid">
			<div class="container">
				<div class="grid-inner">
					<div class="col-main">
						<?php
						$categories = get_categories( array( 'hide_empty' => true, 'number' => 4 ) );
						foreach ( $categories as $category ) :
							$cat_posts = new WP_Query( array(
								'posts_per_page'      => 6,
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
									</div>
									<div class="news-grid">
										<?php
										$i = 0;
										while ( $cat_posts->have_posts() ) : $cat_posts->the_post();
											$i++;
											if ( $i <= 3 ) :
											?>
											<article class="news-card news-card-medium">
												<?php if ( has_post_thumbnail() ) : ?>
													<div class="news-thumb">
														<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
													</div>
												<?php endif; ?>
												<div class="news-body">
													<h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
													<p class="news-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 14 ); ?></p>
													<div class="news-meta"><?php echo get_the_date(); ?></div>
												</div>
											</article>
										<?php else : ?>
											<article class="news-card">
												<div class="news-body">
													<h3 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
													<div class="news-meta"><?php echo get_the_date(); ?></div>
												</div>
											</article>
										<?php endif; endwhile;
											wp_reset_postdata();
										?>
									</div>
								</section>
								<?php
							endif;
						endforeach;
						?>
					</div>

					<div class="col-sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>

		<!-- More Top Stories (Full Width) -->
		<section class="more-top-stories">
			<div class="container">
				<div class="section-header">
					<h2 class="section-title-left"><?php esc_html_e( 'More Top Stories', 'neon-theme' ); ?></h2>
				</div>
				<div class="stories-row">
					<?php
					$more_stories = new WP_Query( array(
						'posts_per_page'      => 9,
						'offset'              => 10,
						'ignore_sticky_posts' => true,
					) );
					if ( $more_stories->have_posts() ) :
						while ( $more_stories->have_posts() ) : $more_stories->the_post(); ?>
							<article class="story-card">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="story-thumb">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
									</div>
								<?php endif; ?>
								<h4 class="story-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							</article>
						<?php endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
		</section>

		<!-- Opinion Section (Full Width) -->
		<section class="opinion-section">
			<div class="container">
				<div class="section-header">
					<h2 class="section-title-left"><?php esc_html_e( 'Opinion', 'neon-theme' ); ?></h2>
				</div>
				<div class="opinion-grid">
					<?php
					$opinion = new WP_Query( array(
						'posts_per_page'      => 5,
						'category_name'      => 'opinion',
						'ignore_sticky_posts' => true,
					) );
					if ( $opinion->have_posts() ) :
						while ( $opinion->have_posts() ) : $opinion->the_post(); ?>
							<article class="opinion-card">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="opinion-thumb">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
									</div>
								<?php endif; ?>
								<h4 class="opinion-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<p class="opinion-author"><?php the_author(); ?></p>
							</article>
						<?php endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
		</section>

		<!-- Pictures Section (Full Width) -->
		<section class="pictures-section">
			<div class="container">
				<div class="section-header">
					<h2 class="section-title-left"><?php esc_html_e( 'Pictures', 'neon-theme' ); ?></h2>
				</div>
				<div class="pictures-grid">
					<?php
					$pics = new WP_Query( array(
						'posts_per_page'      => 8,
						'meta_key'           => '_thumbnail_id',
						'ignore_sticky_posts' => true,
					) );
					if ( $pics->have_posts() ) :
						while ( $pics->have_posts() ) : $pics->the_post(); ?>
							<article class="pic-card">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
								<?php endif; ?>
								<h4 class="pic-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							</article>
						<?php endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
		</section>

		<!-- Sports Section (Full Width) -->
		<section class="sports-section">
			<div class="container">
				<div class="section-header">
					<h2 class="section-title-left"><?php esc_html_e( 'Sports', 'neon-theme' ); ?></h2>
				</div>
				<div class="sports-grid">
					<?php
					$sports = new WP_Query( array(
						'posts_per_page'      => 6,
						'category_name'      => 'sports',
						'ignore_sticky_posts' => true,
					) );
					if ( $sports->have_posts() ) :
						$s = 0;
						while ( $sports->have_posts() ) : $sports->the_post();
							$s++;
							if ( $s === 1 ) :
					?>
						<article class="sports-main">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="sports-thumb">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
								</div>
							<?php endif; ?>
							<h3 class="sports-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</article>
						<div class="sports-list">
					<?php else : ?>
						<article class="sports-item">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</article>
					<?php endif; endwhile; ?>
						</div>
					<?php wp_reset_postdata(); endif; ?>
				</div>
			</div>
		</section>

	</main>
</div>

<?php get_footer(); ?>
