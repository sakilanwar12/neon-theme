<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NEON_THEME
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-social">
				<?php
				// Display social menu if available
				if ( has_nav_menu( 'social' ) ) {
					wp_nav_menu(
						array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links',
							'link_before'    => '<span class="sr-only">',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
							'depth'          => 1,
						)
					);
				} else {
					// Fallback social links
					?>
					<a href="https://twitter.com" target="_blank" rel="noopener noreferrer" title="Twitter">
						<span class="sr-only">Twitter</span>
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2s9 5 20 5a9.5 9.5 0 00-9-5.5c4.75 2.25 7-7 7-7"></path>
						</svg>
					</a>
					<a href="https://github.com" target="_blank" rel="noopener noreferrer" title="GitHub">
						<span class="sr-only">GitHub</span>
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0020 4.77c-1.5-.49-3-1.2-3-1.2l-.5-1.2s-1.38 0-3.38 1.2c-.46-.15-.9-.2-1.35-.2h-1.34c-.45 0-.89.05-1.35.2-2 -1.2-3.38-1.2-3.38-1.2l-.5 1.2s-1.5.71-3 1.2v0a5.07 5.07 0 000 .77 5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"></path>
						</svg>
					</a>
					<a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" title="LinkedIn">
						<span class="sr-only">LinkedIn</span>
						<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
							<path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
							<circle cx="4" cy="4" r="2"></circle>
						</svg>
					</a>
					<?php
				}
				?>
			</div><!-- .footer-social -->

			<div class="site-info">
				<p>
					&copy; <?php echo date( 'Y' ); ?> 
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
					<span class="sep"> | </span>
				</p>
				<p>
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Built with %s', 'neon-theme' ), '<a href="https://wordpress.org/">WordPress</a>' );
					?>
					<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s', 'neon-theme' ), 'Neon Theme' );
					?>
				</p>
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
