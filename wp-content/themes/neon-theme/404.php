<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package NEON_THEME
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="content-with-sidebar">

			<div class="content-main">
				<section class="error-404 not-found" style="text-align:center;padding:4rem 0;">
					<header class="page-header-archive" style="border-bottom:none;">
						<h1 class="page-title" style="font-size:6rem;margin:0;background:linear-gradient(135deg,var(--neon-cyan),var(--neon-purple),var(--neon-pink));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">404</h1>
						<p style="font-size:1.5rem;color:var(--neon-text-primary);margin-top:1rem;"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'neon-theme' ); ?></p>
					</header>

					<div class="page-content" style="max-width:500px;margin:0 auto;">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'neon-theme' ); ?></p>
						<div style="margin:2rem 0;"><?php get_search_form(); ?></div>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Go to Homepage', 'neon-theme' ); ?></a>
					</div>
				</section>
			</div>

			<aside class="content-sidebar">
				<?php get_sidebar(); ?>
			</aside>

		</div>
	</div>
</main>

<?php
get_footer();
