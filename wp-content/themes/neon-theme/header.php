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
					<div class="top-bar-social">
						<a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="Twitter">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 5 20 0a9.5 9.5 0 0 0-9-5.5c4.75 2.25 7-7 7-7"/></svg>
						</a>
						<a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="Facebook">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
						</a>
						<a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="Instagram">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
						</a>
						<a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="YouTube">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 2C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
						</a>
						<a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-icon" title="LinkedIn">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
						</a>
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
				<div class="search-box">
					<button class="search-toggle" aria-label="<?php esc_attr_e( 'Toggle search', 'neon-theme' ); ?>">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
					</button>
					<div class="search-popover">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</header>


