<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package NEON_THEME
 */
?>

	<footer id="colophon" class="site-footer">
		<!-- Footer Widgets -->
		<div class="footer-widgets">
			<div class="container">
				<div class="footer-widgets-grid">
					<div class="footer-widget-col">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
							<?php dynamic_sidebar( 'footer-1' ); ?>
						<?php else : ?>
							<div class="footer-widget">
								<h4 class="footer-widget-title"><?php esc_html_e( 'About', 'neon-theme' ); ?></h4>
								<div class="footer-about">
									<p><?php bloginfo( 'description' ); ?></p>
									<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. <?php esc_html_e( 'All rights reserved.', 'neon-theme' ); ?></p>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="footer-widget-col">
						<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
							<?php dynamic_sidebar( 'footer-2' ); ?>
						<?php else : ?>
							<div class="footer-widget">
								<h4 class="footer-widget-title"><?php esc_html_e( 'Recent Posts', 'neon-theme' ); ?></h4>
								<ul class="footer-recent-posts">
									<?php
									$recent = new WP_Query( array( 'posts_per_page' => 4, 'ignore_sticky_posts' => true ) );
									while ( $recent->have_posts() ) : $recent->the_post();
										?>
										<li>
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											<span class="post-date"><?php echo get_the_date(); ?></span>
										</li>
									<?php endwhile; wp_reset_postdata(); ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
					<div class="footer-widget-col">
						<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
							<?php dynamic_sidebar( 'footer-3' ); ?>
						<?php else : ?>
							<div class="footer-widget">
								<h4 class="footer-widget-title"><?php esc_html_e( 'Categories', 'neon-theme' ); ?></h4>
								<ul class="footer-categories">
									<?php
									$categories = get_categories( array( 'hide_empty' => true ) );
									foreach ( $categories as $cat ) :
										?>
										<li>
											<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
												<?php echo esc_html( $cat->name ); ?>
												<span class="cat-count">(<?php echo esc_html( $cat->count ); ?>)</span>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
					<div class="footer-widget-col">
						<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
							<?php dynamic_sidebar( 'footer-4' ); ?>
						<?php else : ?>
							<div class="footer-widget">
								<h4 class="footer-widget-title"><?php esc_html_e( 'Follow Us', 'neon-theme' ); ?></h4>
								<div class="footer-social">
									<a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="Twitter">
										<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 5 20 0a9.5 9.5 0 0 0-9-5.5c4.75 2.25 7-7 7-7"/></svg>
									</a>
									<a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="Facebook">
										<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
									</a>
									<a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="Instagram">
										<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
									</a>
									<a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="YouTube">
										<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
									</a>
									<a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="LinkedIn">
										<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
									</a>
								</div>
							</div>
							<div class="footer-widget">
								<h4 class="footer-widget-title"><?php esc_html_e( 'Newsletter', 'neon-theme' ); ?></h4>
								<p><?php esc_html_e( 'Subscribe to get the latest posts delivered to your inbox.', 'neon-theme' ); ?></p>
								<form class="footer-newsletter" action="#" method="post">
									<input type="email" placeholder="<?php esc_attr_e( 'Your email address', 'neon-theme' ); ?>" required>
									<button type="submit"><?php esc_html_e( 'Subscribe', 'neon-theme' ); ?></button>
								</form>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer Bottom Bar -->
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-inner">
					<div class="footer-bottom-left">
						<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. <?php esc_html_e( 'All rights reserved.', 'neon-theme' ); ?></p>
					</div>
					<div class="footer-bottom-right">
						<?php if ( has_nav_menu( 'footer' ) ) : ?>
							<nav class="footer-nav">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer',
										'depth'          => 1,
										'fallback_cb'    => false,
									)
								);
								?>
							</nav>
						<?php endif; ?>
						<button class="scroll-to-top" aria-label="<?php esc_attr_e( 'Scroll to top', 'neon-theme' ); ?>">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>
						</button>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
