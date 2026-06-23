<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package NEON_THEME
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="content-with-sidebar">

			<div class="content-main">
				<header class="page-header-archive">
					<h1 class="page-title">
						<?php
						printf( esc_html__( 'Search Results for: %s', 'neon-theme' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header>

				<?php if ( have_posts() ) : ?>
					<div class="posts-grid">
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', 'search' );
						endwhile;
						?>
					</div>

					<div class="pagination-wrapper">
						<?php the_posts_pagination(); ?>
					</div>

				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
			</div>

			<aside class="content-sidebar">
				<?php get_sidebar(); ?>
			</aside>

		</div>
	</div>
</main>

<?php
get_footer();
