# 🌟 NEON THEME

A modern, neon-inspired personal portfolio theme for frontend developers built on the Underscores (_s) starter theme.

## 🎨 Design Features

### Color System
- **Dark Theme Base**: `#0b0f1a` - Deep dark background for reduced eye strain
- **Neon Accent Colors**:
  - Cyan: `#00f5ff` - Primary accent
  - Purple: `#a855f7` - Secondary accent
  - Pink: `#ff3df2` - Tertiary accent

### Design Elements
- ✨ Glassmorphism cards with backdrop blur effects
- 🔆 Neon glow effects on hover
- 🎭 Smooth CSS animations and transitions
- 📱 Fully responsive design (mobile-first approach)
- ♿ Accessibility-first implementation

## 🧩 Theme Structure

```
neon-theme/
├── assets/
│   ├── css/
│   │   └── neon-responsive.css      # Responsive & utility styles
│   └── js/
│       └── main.js                   # Main JavaScript interactions
├── template-parts/
│   └── content-project.php           # Project card template
├── inc/                              # Theme includes
├── js/                               # Navigation scripts
├── languages/                        # Translation files
├── front-page.php                    # Portfolio landing page
├── single-projects.php               # Single project template
├── header.php                        # Theme header
├── footer.php                        # Theme footer
├── style.css                         # Main stylesheet
├── neon-style.css                    # Neon design system
└── functions.php                     # Theme functions & setup
```

## 🚀 Features

### 1. Modern Navigation
- Sticky header with smooth scroll
- Mobile hamburger menu with animations
- Active menu item highlighting
- Keyboard accessible navigation

### 2. Portfolio Landing Page (front-page.php)
- **Hero Section**: Full-screen introduction with gradient text
- **About Section**: Profile image, bio, and CTA
- **Skills Section**: Categorized skill cards
- **Projects Section**: Grid display of portfolio projects
- **Contact Section**: Integrated contact form (Contact Form 7 compatible)

### 3. Custom Post Type - Projects
- Fully registered and featured in admin
- Supports: Title, Editor, Featured Image, Excerpt, Custom Fields
- Archive page support
- Single project template with navigation

### 4. Responsive Design
- Mobile-first breakpoints (768px, 1024px)
- Flexible grid system (1, 2, 3 columns)
- Hamburger menu for mobile
- Touch-friendly buttons and interactions

### 5. Interactive Features
- Smooth scroll navigation
- Lazy loading for images
- Form focus states with animations
- Intersection Observer for scroll animations
- Mobile menu toggle with animated hamburger

### 6. Accessibility
- WCAG compliant color contrast
- Semantic HTML structure
- ARIA labels and roles
- Keyboard navigation support
- Skip to content link
- Focus visible styles

## 🎯 Required Customizations

To fully use the theme, configure:

1. **Site Identity** (WordPress > Customization > Site Identity)
   - Site Title
   - Site Icon/Logo
   - Tagline

2. **Primary Menu** (WordPress > Appearance > Menus)
   - Create a menu and assign it to Primary Menu location

3. **Social Menu** (Optional)
   - Create social links menu for footer

4. **Contact Form** (If using Contact Form 7)
   - Create form in Contact Form 7 and add ID to theme options

5. **Projects**
   - Add projects via WordPress Admin (Projects > Add New)
   - Set featured image for each project
   - Add project details via ACF or custom meta boxes

## 📦 Installation

1. Extract theme folder to `/wp-content/themes/`
2. Activate from WordPress Admin
3. Configure theme options and menus
4. Add portfolio projects
5. Customize colors via CSS variables in `neon-style.css`

## 🎨 Customization

### Colors
Edit CSS variables in `neon-style.css`:
```css
:root {
	--neon-cyan: #00f5ff;
	--neon-purple: #a855f7;
	--neon-pink: #ff3df2;
	/* ... more variables */
}
```

### Typography
- **Primary Font**: Inter (sans-serif)
- **Display Font**: Poppins (sans-serif)
- Change in theme customizer or edit `@font-face` in CSS

### Layout Spacing
Adjust spacing variables:
```css
--spacing-xs: 0.5rem;
--spacing-sm: 1rem;
--spacing-md: 1.5rem;
--spacing-lg: 2rem;
--spacing-xl: 3rem;
--spacing-2xl: 4rem;
```

## 📱 Browser Support

- ✅ Chrome/Chromium (Latest)
- ✅ Firefox (Latest)
- ✅ Safari (Latest)
- ✅ Edge (Latest)
- ⚠️ IE 11 (Not supported - uses modern CSS features)

## 🔧 Development

### Required Tools
- WordPress 5.0+
- PHP 5.6+
- Modern browser with CSS Grid/Flexbox support

### Build Process
The theme uses vanilla CSS and JavaScript. No build tools required.

### File Modifications
- Modify `.php` files directly for template changes
- Edit `.css` files for styling
- Update `main.js` for interactions

## 📚 WordPress Standards

The theme follows:
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [WordPress Plugin Handbook](https://developer.wordpress.org/plugins/)
- [WordPress Theme Handbook](https://developer.wordpress.org/themes/)

## 🚀 Performance

- ✅ Optimized CSS (minimal unused code)
- ✅ Vanilla JavaScript (no jQuery dependency)
- ✅ Lazy loading images
- ✅ CSS Grid for efficient layouts
- ✅ Minimal DOM manipulation
- ✅ No external script dependencies

## 📄 Template Files

### Core Templates
- `index.php` - Fallback template
- `single.php` - Single post display
- `archive.php` - Archive/category pages
- `search.php` - Search results
- `404.php` - Not found page
- `page.php` - Single page display

### Custom Templates
- `front-page.php` - Portfolio landing page
- `single-projects.php` - Single project display

### Template Parts
- `template-parts/content.php` - Post content
- `template-parts/content-project.php` - Project card

## 🤝 Support

For questions or issues:
1. Check WordPress documentation
2. Review theme code comments
3. Check Contact Form 7 settings if forms aren't working
4. Verify menu assignments in Appearance > Menus

## 📝 License

GNU General Public License v2 or later
See LICENSE file for details

## 🙏 Credits

- Built on [Underscores](https://underscores.me/) starter theme
- Fonts from [Google Fonts](https://fonts.google.com/)
- Icons using inline SVG

---

**Version**: 1.0.0
**Last Updated**: 2026
**Author**: Frontend Developer
