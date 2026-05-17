<?php
/**
 * The template for displaying single projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package NEON_THEME
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header" style="text-align: center; padding: 3rem 0;">
					<div class="container">
						<h1 class="entry-title" style="margin: 0 0 1rem 0;">
							<?php the_title(); ?>
						</h1>
						<div class="entry-meta" style="margin: 1rem 0;">
							<span class="posted-on">
								<?php
								printf(
									esc_html__( 'Posted on %s', 'neon-theme' ),
									'<time class="entry-date published updated" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time>'
								);
								?>
							</span>
							<span class="byline">
								<?php
								printf(
									esc_html__( ' by %s', 'neon-theme' ),
									'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
								);
								?>
							</span>
						</div>
					</div>
				</header><!-- .entry-header -->

				<?php
				if ( has_post_thumbnail() ) :
					?>
					<div class="post-thumbnail" style="margin: 3rem 0; border-radius: 12px; overflow: hidden;">
						<?php
						the_post_thumbnail( 'large' );
						?>
					</div><!-- .post-thumbnail -->
					<?php
				endif;
				?>

				<div class="entry-content">
					<div class="container" style="max-width: 900px;">
						<?php
						the_content(
							sprintf(
								wp_kses(
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'neon-theme' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);
						?>

						<?php
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'neon-theme' ),
								'after'  => '</div>',
							)
						);
						?>
					</div>
				</div><!-- .entry-content -->

				<!-- Project Details -->
				<?php
				$project_details = array(
					'client'      => get_post_meta( get_the_ID(), '_project_client', true ),
					'year'        => get_post_meta( get_the_ID(), '_project_year', true ),
					'technologies' => get_post_meta( get_the_ID(), '_project_technologies', true ),
					'url'         => get_post_meta( get_the_ID(), '_project_url', true ),
				);

				if ( ! empty( array_filter( $project_details ) ) ) :
					?>
					<div style="padding: 3rem 0; border-top: 1px solid var(--neon-dark-border);">
						<div class="container" style="max-width: 900px;">
							<h3><?php esc_html_e( 'Project Details', 'neon-theme' ); ?></h3>
							<div class="grid grid-cols-2" style="gap: 2rem;">
								<?php if ( ! empty( $project_details['client'] ) ) : ?>
									<div>
										<h4 style="color: var(--neon-cyan);"><?php esc_html_e( 'Client', 'neon-theme' ); ?></h4>
										<p><?php echo esc_html( $project_details['client'] ); ?></p>
									</div>
								<?php endif; ?>

								<?php if ( ! empty( $project_details['year'] ) ) : ?>
									<div>
										<h4 style="color: var(--neon-cyan);"><?php esc_html_e( 'Year', 'neon-theme' ); ?></h4>
										<p><?php echo esc_html( $project_details['year'] ); ?></p>
									</div>
								<?php endif; ?>

								<?php if ( ! empty( $project_details['technologies'] ) ) : ?>
									<div>
										<h4 style="color: var(--neon-cyan);"><?php esc_html_e( 'Technologies', 'neon-theme' ); ?></h4>
										<p><?php echo esc_html( $project_details['technologies'] ); ?></p>
									</div>
								<?php endif; ?>

								<?php if ( ! empty( $project_details['url'] ) ) : ?>
									<div>
										<h4 style="color: var(--neon-cyan);"><?php esc_html_e( 'Visit Project', 'neon-theme' ); ?></h4>
										<p><a href="<?php echo esc_url( $project_details['url'] ); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary"><?php esc_html_e( 'View Live', 'neon-theme' ); ?></a></p>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php
				endif;
				?>

				<footer class="entry-footer" style="padding: 3rem 0; border-top: 1px solid var(--neon-dark-border);">
					<div class="container" style="max-width: 900px;">
						<?php neon_theme_entry_footer(); ?>
					</div>
				</footer><!-- .entry-footer -->
			</article><!-- #post-<?php the_ID(); ?> -->

			<?php
			// If comments are open or there is at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<!-- Navigation to other projects -->
		<nav class="navigation post-navigation" aria-label="Posts">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'neon-theme' ); ?></h2>
			<div class="nav-links" style="padding: 3rem 0;">
				<div class="container">
					<div class="grid grid-cols-2">
						<?php
						$prev_post = get_previous_post();
						if ( ! empty( $prev_post ) ) :
							?>
							<div class="nav-previous">
								<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="btn btn-outline">
									<?php esc_html_e( '← Previous Project', 'neon-theme' ); ?>
								</a>
							</div>
							<?php
						endif;

						$next_post = get_next_post();
						if ( ! empty( $next_post ) ) :
							?>
							<div class="nav-next" style="text-align: right;">
								<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="btn btn-outline">
									<?php esc_html_e( 'Next Project →', 'neon-theme' ); ?>
								</a>
							</div>
							<?php
						endif;
						?>
					</div>
				</div>
			</div>
		</nav><!-- .navigation -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
