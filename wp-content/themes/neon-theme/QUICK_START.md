# 🚀 NEON THEME - QUICK START GUIDE

## Installation Steps

### 1. Activate the Theme
- Go to **WordPress Admin > Appearance > Themes**
- Find **NEON THEME** and click **Activate**

### 2. Create Menu (Required)
- Go to **Appearance > Menus**
- Create a new menu (name it "Main Menu")
- Add menu items (Home, About, Projects, Contact, etc.)
- Under "Display location", check **Primary Menu**
- Click **Save Menu**

### 3. Set Home Page
- Go to **Settings > Reading**
- Under "Your homepage displays", select **A static page**
- Choose a page or create new page called "Home"
- Set this page as your **Homepage**
- Make sure the homepage is using **front-page.php** template

### 4. Configure Logo (Optional)
- Go to **Customization > Site Identity**
- Upload a custom logo (will appear in header)
- Set logo width: 60px (recommended)

### 5. Add Projects (Optional)
- Go to **Projects > Add New**
- Add your portfolio projects
- Set featured image for each project
- Publish projects

### 6. Setup Contact Form (If Using Contact Form 7)
- Install Contact Form 7 plugin
- Create a contact form
- Copy the form ID
- Go to **Customization** and paste form ID in contact form setting
- Or edit `front-page.php` line ~180 to add form ID

### 7. Add Social Links (Optional)
- Go to **Appearance > Menus**
- Create a new menu called "Social"
- Add links to your social profiles
- Under "Display location", check **Social Menu**
- Icons will display in footer

### 8. Customize Colors (Optional)
- Open `/neon-theme/neon-style.css`
- Edit CSS variables at the top (`:root` section)
- Change `--neon-cyan`, `--neon-purple`, `--neon-pink` colors

## Key Files You Can Customize

| File | Purpose |
|------|---------|
| `front-page.php` | Edit homepage sections, hero text, skills list |
| `neon-style.css` | Edit colors, fonts, spacing |
| `footer.php` | Add/edit social links, copyright text |
| `header.php` | Modify header structure |
| `functions.php` | Add/remove features, register widgets |

## Quick Customizations

### Change Hero Title & Subtitle
Edit `front-page.php` lines ~30-40:
```php
$hero_title = get_theme_mod( 'neon_hero_title', 'Hi, I\'m a Frontend Developer' );
$hero_subtitle = get_theme_mod( 'neon_hero_subtitle', 'Crafting beautiful digital experiences...' );
```

### Change Primary Color
Edit `neon-style.css` line ~32:
```css
--neon-cyan: #00f5ff; /* Change this hex color */
```

### Add More Skills
Edit `front-page.php` lines ~115-130 to add more skill categories.

### Modify Skills Section
Edit the `$skills` array in `front-page.php` to customize skill categories.

## Troubleshooting

### Menu not showing?
- Check menu is assigned to **Primary Menu** location
- Verify menu has items added
- Clear WordPress cache if using caching plugin

### Projects not showing?
- Make sure you've published projects
- Check Project post type is enabled in **Settings > Visibility**
- Verify `front-page.php` is set as homepage

### Styles not loading?
- Clear browser cache (Ctrl+Shift+Delete / Cmd+Shift+Delete)
- Deactivate any caching plugins temporarily
- Check file permissions on CSS files

### Contact form not working?
- Install Contact Form 7 plugin
- Create and publish a form
- Add form ID to `front-page.php` or theme customizer

## Useful WordPress Hooks

### Add Custom CSS
In `functions.php`:
```php
add_action( 'wp_head', function() {
	echo '<style>/* Your custom CSS */</style>';
});
```

### Add Custom JS
In `functions.php`:
```php
wp_enqueue_script( 'my-script', get_stylesheet_directory_uri() . '/js/my-script.js', array(), '1.0', true );
```

## Next Steps

1. ✅ Install & Activate theme
2. ✅ Create & assign menu
3. ✅ Set homepage
4. ✅ Add projects
5. ✅ Customize colors (optional)
6. ✅ Add logo (optional)
7. ✅ Setup contact form (optional)
8. ✅ Review and publish

## Support Resources

- [WordPress Documentation](https://wordpress.org/support/)
- [Theme Code Comments](./front-page.php) - Code is well-commented
- [Neon Theme README](./NEON_THEME_README.md) - Full documentation

## Common CSS Classes

```css
.card           /* Cards with glow effect */
.section        /* Major sections */
.btn            /* Primary button */
.btn-secondary  /* Secondary button */
.grid           /* Grid container */
.grid-cols-3    /* 3-column grid */
.container      /* Max-width container */
.fade-in        /* Fade animation */
```

---

**Ready to go!** Your portfolio website is now running on Neon Theme. 🌟
