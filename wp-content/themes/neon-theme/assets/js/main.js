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
			if (mainNav && mainNav.classList.contains('toggled')) {
				mainNav.classList.remove('toggled');
				if (menuToggle) menuToggle.setAttribute('aria-expanded', false);
			}
		});
	});

	// Add dropdown toggles to menu items with children
	document.querySelectorAll('.main-navigation .menu-item-has-children').forEach(item => {
		if (!item.querySelector('.dropdown-toggle')) {
			const toggle = document.createElement('button');
			toggle.className = 'dropdown-toggle';
			toggle.setAttribute('aria-expanded', 'false');
			toggle.setAttribute('aria-label', 'Toggle submenu');
			toggle.innerHTML = '<span class="dropdown-arrow"></span>';
			item.appendChild(toggle);

			toggle.addEventListener('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				item.classList.toggle('active');
				const expanded = this.getAttribute('aria-expanded') === 'true';
				this.setAttribute('aria-expanded', !expanded);
				this.classList.toggle('active');
			});
		}
	});

	// Search Popover
	const searchBox = document.querySelector('.search-box');
	const searchToggle = document.querySelector('.search-toggle');
	const searchPopover = document.querySelector('.search-popover');
	if (searchToggle && searchPopover && searchBox) {
		searchToggle.addEventListener('click', function(e) {
			e.preventDefault();
			e.stopPropagation();
			const isOpen = searchBox.classList.contains('search-open');
			searchBox.classList.toggle('search-open');
			if (!isOpen) {
				setTimeout(() => searchPopover.querySelector('input')?.focus(), 100);
			}
		});
		document.addEventListener('click', function(e) {
			if (!searchBox.contains(e.target)) {
				searchBox.classList.remove('search-open');
			}
		});
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape') {
				searchBox.classList.remove('search-open');
			}
		});
	}

	// Smooth Scroll Navigation
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function(e) {
			const href = this.getAttribute('href');
			if (href !== '#' && document.querySelector(href)) {
				e.preventDefault();
				const target = document.querySelector(href);
				target.scrollIntoView({
					behavior: 'smooth',
					block: 'start'
				});
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

	document.querySelectorAll('.section, .card, .post, .post-card').forEach(el => {
		observer.observe(el);
	});

	// Scroll to Top Button
	const scrollTopButton = document.querySelector('.scroll-to-top');
	if (scrollTopButton) {
		window.addEventListener('scroll', function() {
			if (window.pageYOffset > 300) {
				scrollTopButton.classList.add('visible');
				scrollTopButton.style.opacity = '1';
				scrollTopButton.style.pointerEvents = 'auto';
			} else {
				scrollTopButton.classList.remove('visible');
				scrollTopButton.style.opacity = '0';
				scrollTopButton.style.pointerEvents = 'none';
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

	// Lazy load images
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

})();
