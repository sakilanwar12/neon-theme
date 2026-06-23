<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package NEON_THEME
 */

?>

<section class="no-results not-found" style="text-align:center;padding:3rem 0;">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'neon-theme' ); ?></h1>
	</header>

	<div class="page-content">
		<?php
		if ( is_search() ) :
			?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'neon-theme' ); ?></p>
			<div style="max-width:400px;margin:2rem auto;"><?php get_search_form(); ?></div>
			<?php
		else :
			?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'neon-theme' ); ?></p>
			<div style="max-width:400px;margin:2rem auto;"><?php get_search_form(); ?></div>
			<?php
		endif;
		?>
	</div>
</section>
