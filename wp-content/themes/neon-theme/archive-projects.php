<?php
/**
 * The archive template for projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NEON_THEME
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :
			?>
			<header class="page-header" style="padding: 3rem 0; background: var(--neon-dark-secondary);">
				<div class="container">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div>
			</header><!-- .page-header -->

			<div class="container" style="padding: 3rem 0;">
				<?php
				// Filter buttons (optional)
				?>
				<div class="projects-grid grid grid-cols-3">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'project' );
					endwhile;
					?>
				</div>

				<?php
				the_posts_navigation(
					array(
						'prev_text' => esc_html__( '← Older Projects', 'neon-theme' ),
						'next_text' => esc_html__( 'Newer Projects →', 'neon-theme' ),
					)
				);
			endif;
			?>
			</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
