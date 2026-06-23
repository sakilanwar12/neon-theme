<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package NEON_THEME
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'neon-theme' ); ?></a>

	<!-- Top Bar -->
	<div class="top-bar">
		<div class="container">
			<div class="top-bar-inner">
				<div class="top-bar-date">
					<span class="current-date"><?php echo esc_html( date_i18n( 'l, F j, Y' ) ); ?></span>
				</div>
				<div class="top-bar-breaking">
					<span class="breaking-label"><?php esc_html_e( 'Breaking', 'neon-theme' ); ?></span>
					<div class="breaking-news-ticker">
						<?php
						$breaking_args = array(
							'posts_per_page' => 5,
							'ignore_sticky_posts' => true,
						);
						$breaking_query = new WP_Query( $breaking_args );
						if ( $breaking_query->have_posts() ) :
							?>
							<div class="ticker-items">
								<?php while ( $breaking_query->have_posts() ) : $breaking_query->the_post(); ?>
									<span class="ticker-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="top-bar-right">
					<?php if ( has_nav_menu( 'top-bar' ) ) : ?>
						<nav class="top-bar-nav">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'top-bar',
									'depth'          => 1,
									'fallback_cb'    => false,
								)
							);
							?>
						</nav>
					<?php endif; ?>
					<div class="search-box">
						<button class="search-toggle" aria-label="<?php esc_attr_e( 'Toggle search', 'neon-theme' ); ?>">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
						</button>
						<div class="search-popover">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Header / Masthead -->
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-header-content">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					?>
					<?php
					$neon_description = get_bloginfo( 'description', 'display' );
					if ( $neon_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $neon_description; ?></p>
					<?php endif; ?>
				</div>

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="hamburger-icon">
							<span></span>
							<span></span>
							<span></span>
						</span>
						<span class="menu-label"><?php esc_html_e( 'Menu', 'neon-theme' ); ?></span>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'fallback_cb'    => 'wp_page_menu',
							'depth'          => 3,
						)
					);
					?>
				</nav>
			</div>
		</div>
	</header>


