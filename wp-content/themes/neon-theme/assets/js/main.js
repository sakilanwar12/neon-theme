/**
 * Neon Theme - Main JavaScript
 * Handles interactions, animations, and mobile menu
 */

(function() {
	'use strict';

	// Mobile Menu Toggle
	const menuToggle = document.querySelector('.menu-toggle');
	const mainNav = document.querySelector('.main-navigation');

	if (menuToggle) {
		menuToggle.addEventListener('click', function() {
			mainNav.classList.toggle('toggled');
			const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
			menuToggle.setAttribute('aria-expanded', !expanded);
		});
	}

	// Close mobile menu when clicking on a link
	const navLinks = document.querySelectorAll('.main-navigation a');
	navLinks.forEach(link => {
		link.addEventListener('click', function() {
			if (mainNav.classList.contains('toggled')) {
				mainNav.classList.remove('toggled');
				menuToggle.setAttribute('aria-expanded', false);
			}
		});
	});

	// Smooth Scroll Navigation
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function(e) {
			const href = this.getAttribute('href');
			
			// Only smooth scroll if the target exists
			if (href !== '#' && document.querySelector(href)) {
				e.preventDefault();
				const target = document.querySelector(href);
				
				target.scrollIntoView({
					behavior: 'smooth',
					block: 'start'
				});

				// Update URL without triggering navigation
				history.pushState(null, null, href);
			}
		});
	});

	// Scroll Animation Observer
	const observerOptions = {
		threshold: 0.1,
		rootMargin: '0px 0px -100px 0px'
	};

	const observer = new IntersectionObserver(function(entries) {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				entry.target.classList.add('fade-in');
				observer.unobserve(entry.target);
			}
		});
	}, observerOptions);

	// Observe elements with animation classes
	document.querySelectorAll('.section, .card, .post').forEach(el => {
		observer.observe(el);
	});

	// Scroll to Top Button (if implemented)
	const scrollTopButton = document.querySelector('.scroll-to-top');
	if (scrollTopButton) {
		window.addEventListener('scroll', function() {
			if (window.pageYOffset > 300) {
				scrollTopButton.classList.add('visible');
			} else {
				scrollTopButton.classList.remove('visible');
			}
		});

		scrollTopButton.addEventListener('click', function() {
			window.scrollTo({
				top: 0,
				behavior: 'smooth'
			});
		});
	}

	// Keyboard Navigation for Accessibility
	const menuItems = document.querySelectorAll('.main-navigation li');
	menuItems.forEach((item, index) => {
		const link = item.querySelector('a');
		
		if (link) {
			link.addEventListener('keydown', function(e) {
				if (e.key === 'ArrowRight' && index < menuItems.length - 1) {
					e.preventDefault();
					menuItems[index + 1].querySelector('a').focus();
				}
				if (e.key === 'ArrowLeft' && index > 0) {
					e.preventDefault();
					menuItems[index - 1].querySelector('a').focus();
				}
			});
		}
	});

	// Lazy load images (for better performance)
	if ('IntersectionObserver' in window) {
		const imageObserver = new IntersectionObserver((entries, observer) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					const img = entry.target;
					
					if (img.dataset.src) {
						img.src = img.dataset.src;
						img.removeAttribute('data-src');
					}
					
					imageObserver.unobserve(img);
				}
			});
		});

		document.querySelectorAll('img[data-src]').forEach(img => {
			imageObserver.observe(img);
		});
	}

	// Add active class to current menu item
	function setActiveMenuItem() {
		const currentLocation = location.pathname;
		const menuItems = document.querySelectorAll('.main-navigation a');

		menuItems.forEach(item => {
			if (item.pathname === currentLocation) {
				item.parentElement.classList.add('current-menu-item');
			} else {
				item.parentElement.classList.remove('current-menu-item');
			}
		});
	}

	// Initialize active menu item on page load
	document.addEventListener('DOMContentLoaded', setActiveMenuItem);

	// Handle form focus states
	const formInputs = document.querySelectorAll('input, textarea, select');
	formInputs.forEach(input => {
		input.addEventListener('focus', function() {
			this.parentElement.classList.add('focused');
		});

		input.addEventListener('blur', function() {
			this.parentElement.classList.remove('focused');
		});
	});

	// Contact Form 7 - Enhance styling if present
	if (typeof wpcf7 !== 'undefined') {
		document.addEventListener('wpcf7:submit', function(event) {
			// Add custom handling if needed
		});
	}

	// Project Grid Filtering (if implemented)
	const filterButtons = document.querySelectorAll('[data-filter]');
	const projectItems = document.querySelectorAll('[data-project-category]');

	if (filterButtons.length > 0) {
		filterButtons.forEach(button => {
			button.addEventListener('click', function() {
				const filterValue = this.getAttribute('data-filter');

				// Update active button
				filterButtons.forEach(btn => btn.classList.remove('active'));
				this.classList.add('active');

				// Filter items
				projectItems.forEach(item => {
					if (filterValue === 'all' || item.getAttribute('data-project-category') === filterValue) {
						item.style.display = 'block';
						setTimeout(() => item.classList.add('fade-in'), 10);
					} else {
						item.style.display = 'none';
						item.classList.remove('fade-in');
					}
				});
			});
		});
	}

	// Prevent form submission on enter in search boxes
	document.addEventListener('keypress', function(e) {
		if (e.target.classList.contains('search-field') && e.key === 'Enter') {
			// Allow normal form submission
		}
	});

	console.log('Neon Theme initialized');

})();
