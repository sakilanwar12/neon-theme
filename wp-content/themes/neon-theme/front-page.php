<?php
/**
 * Template Name: Front Page
 * The front page template for the Neon Theme portfolio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NEON_THEME
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<!-- Hero Section -->
		<section id="hero" class="section hero-section" style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
			<div class="container">
				<div class="hero-content" style="text-align: center;">
					<h1 class="hero-title">
						<?php
						$hero_title = get_theme_mod( 'neon_hero_title', 'Hi, I\'m a Frontend Developer' );
						echo wp_kses_post( $hero_title );
						?>
					</h1>
					<p class="hero-subtitle">
						<?php
						$hero_subtitle = get_theme_mod( 'neon_hero_subtitle', 'Crafting beautiful digital experiences with modern web technologies' );
						echo wp_kses_post( $hero_subtitle );
						?>
					</p>
					<div class="hero-buttons" style="display: flex; justify-content: center; gap: 1.5rem; flex-wrap: wrap; margin-top: 2.5rem;">
						<a href="#projects" class="btn btn-primary">View My Work</a>
						<a href="#contact" class="btn btn-secondary">Get In Touch</a>
					</div>
				</div>
			</div>
		</section><!-- #hero -->

		<!-- About Section -->
		<section id="about" class="section about-section" style="padding: 4rem 0; background: var(--neon-dark-secondary);">
			<div class="container">
				<h2 class="section-title">About Me</h2>
				<div class="grid grid-cols-2" style="align-items: center;">
					<div class="about-image" style="margin-bottom: 2rem;">
						<?php
						$about_image = get_theme_mod( 'neon_about_image' );
						if ( $about_image ) :
							?>
							<img src="<?php echo esc_url( $about_image ); ?>" alt="Profile" style="border-radius: 12px; border: 2px solid var(--neon-cyan);">
							<?php
						endif;
						?>
					</div>
					<div class="about-content">
						<?php
						$about_text = get_theme_mod( 'neon_about_text', 'I\'m a passionate frontend developer with expertise in modern web technologies. I love creating intuitive, visually stunning web applications that users love.' );
						echo wp_kses_post( wpautop( $about_text ) );
						?>
						<a href="#" class="btn btn-primary" style="margin-top: 1.5rem;">Download CV</a>
					</div>
				</div>
			</div>
		</section><!-- #about -->

		<!-- Skills Section -->
		<section id="skills" class="section skills-section" style="padding: 4rem 0;">
			<div class="container">
				<h2 class="section-title">Skills</h2>
				<div class="grid grid-cols-3">
					<?php
					$skills = array(
						array(
							'title' => 'Frontend',
							'items' => array( 'HTML/CSS', 'JavaScript', 'React', 'Responsive Design' ),
						),
						array(
							'title' => 'Backend',
							'items' => array( 'PHP', 'WordPress', 'MySQL', 'REST APIs' ),
						),
						array(
							'title' => 'Tools',
							'items' => array( 'Git', 'VS Code', 'Figma', 'Webpack' ),
						),
					);

					foreach ( $skills as $skill_category ) :
						?>
						<div class="card skill-card">
							<h3><?php echo esc_html( $skill_category['title'] ); ?></h3>
							<ul style="list-style: none; padding: 0; margin: 0;">
								<?php foreach ( $skill_category['items'] as $skill ) : ?>
									<li style="padding: 0.5rem 0; color: var(--neon-text-secondary);">
										<span style="display: inline-block; width: 6px; height: 6px; background: var(--neon-cyan); border-radius: 50%; margin-right: 0.5rem;"></span>
										<?php echo esc_html( $skill ); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php
					endforeach;
					?>
				</div>
			</div>
		</section><!-- #skills -->

		<!-- Projects Section -->
		<section id="projects" class="section projects-section" style="padding: 4rem 0; background: var(--neon-dark-secondary);">
			<div class="container">
				<h2 class="section-title">Featured Projects</h2>
				
				<?php
				$projects = new WP_Query(
					array(
						'post_type'      => 'projects',
						'posts_per_page' => 6,
						'orderby'        => 'date',
						'order'          => 'DESC',
					)
				);

				if ( $projects->have_posts() ) :
					?>
					<div class="grid grid-cols-3">
						<?php
						while ( $projects->have_posts() ) :
							$projects->the_post();
							get_template_part( 'template-parts/content', 'project' );
						endwhile;
						wp_reset_postdata();
						?>
					</div>
					<div style="text-align: center; margin-top: 3rem;">
						<a href="<?php echo esc_url( get_post_type_archive_link( 'projects' ) ); ?>" class="btn btn-outline">View All Projects</a>
					</div>
					<?php
				else :
					?>
					<div class="no-projects" style="text-align: center; padding: 3rem;">
						<p><?php esc_html_e( 'No projects found yet. Start adding your portfolio projects!', 'neon-theme' ); ?></p>
					</div>
					<?php
				endif;
				?>
			</div>
		</section><!-- #projects -->

		<!-- Contact Section -->
		<section id="contact" class="section contact-section" style="padding: 4rem 0;">
			<div class="container">
				<h2 class="section-title">Get In Touch</h2>
				<div style="max-width: 600px; margin: 0 auto;">
					<?php
					// Check if Contact Form 7 plugin is active
					if ( shortcode_exists( 'contact-form-7' ) ) {
						$contact_form_id = get_theme_mod( 'neon_contact_form_id', '' );
						if ( $contact_form_id ) {
							echo do_shortcode( '[contact-form-7 id="' . intval( $contact_form_id ) . '"]' );
						} else {
							?>
							<p><?php esc_html_e( 'Contact form not configured. Please add a Contact Form 7 form ID in the theme settings.', 'neon-theme' ); ?></p>
							<?php
						}
					} else {
						?>
						<form class="contact-form" style="display: grid; gap: 1.5rem;">
							<div>
								<label for="name"><?php esc_html_e( 'Name', 'neon-theme' ); ?></label>
								<input type="text" id="name" name="name" required>
							</div>
							<div>
								<label for="email"><?php esc_html_e( 'Email', 'neon-theme' ); ?></label>
								<input type="email" id="email" name="email" required>
							</div>
							<div>
								<label for="message"><?php esc_html_e( 'Message', 'neon-theme' ); ?></label>
								<textarea id="message" name="message" rows="5" required></textarea>
							</div>
							<button type="submit" class="btn btn-primary"><?php esc_html_e( 'Send Message', 'neon-theme' ); ?></button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</section><!-- #contact -->

	</main><!-- #main -->
</div><!-- #primary -->

<style>
	.hero-title {
		font-size: clamp(2.5rem, 8vw, 4rem);
		background: linear-gradient(135deg, var(--neon-cyan) 0%, var(--neon-purple) 50%, var(--neon-pink) 100%);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		background-clip: text;
		margin-bottom: 1.5rem;
		animation: slideInLeft 0.8s ease-out;
	}

	.hero-subtitle {
		font-size: clamp(1rem, 3vw, 1.5rem);
		color: var(--neon-text-secondary);
		max-width: 600px;
		margin: 0 auto 2.5rem;
		animation: slideInRight 0.8s ease-out 0.2s both;
	}

	.hero-buttons {
		animation: fadeIn 0.8s ease-out 0.4s both;
	}

	@media (max-width: 768px) {
		.grid-cols-2,
		.grid-cols-3 {
			grid-template-columns: 1fr;
		}

		.hero-buttons {
			flex-direction: column;
		}

		.btn {
			width: 100%;
			text-align: center;
		}
	}

	/* Skill Cards Animation */
	.skill-card {
		animation: fadeIn 0.6s ease-out forwards;
	}

	.skill-card:nth-child(2) {
		animation-delay: 0.2s;
	}

	.skill-card:nth-child(3) {
		animation-delay: 0.4s;
	}
</style>

<?php
get_footer();
