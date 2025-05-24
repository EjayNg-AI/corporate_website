# Corporate Theme

A modern, Full Site Editor (FSE) WordPress theme built with the latest WordPress best practices. Features responsive navigation, dark mode toggle, and clean corporate design.

## Features

- **Pure FSE Theme**: Built exclusively for WordPress Site Editor (no classic theme fallbacks)
- **Modern WordPress Standards**: Uses theme.json v2 with latest schema
- **Block Patterns**: Pre-designed patterns for quick page building
- **Dark Mode**: Built-in dark/light mode toggle with localStorage persistence
- **Responsive Navigation**: Mobile-first navigation with WordPress Navigation block
- **Fluid Typography**: Responsive font sizes that scale with viewport
- **Accessibility Ready**: ARIA labels and keyboard navigation support
- **Performance Optimized**: Minimal dependencies, optimized assets

## Requirements

- WordPress 6.0 or higher
- PHP 7.4 or higher

## Installation

1. Download the `corporate-theme` folder
2. Upload to `/wp-content/themes/` directory
3. Activate through WordPress admin panel

## Theme Structure

```
corporate-theme/
├── assets/
│   ├── css/
│   │   └── style.css          # Main theme styles
│   ├── js/
│   │   └── theme.js           # Theme JavaScript (dark mode toggle)
│   └── images/
├── parts/
│   ├── header.html            # Header template part
│   ├── footer.html            # Footer template part
│   └── post-meta.html         # Post metadata template part
├── patterns/
│   ├── sections.php           # Content section patterns
│   └── navigation.php         # Navigation patterns
├── templates/
│   ├── index.html             # Default template
│   ├── front-page.html        # Homepage template
│   ├── single.html            # Single post template
│   ├── page.html              # Page template
│   ├── archive.html           # Archive template
│   ├── search.html            # Search results template
│   └── 404.html               # Error page template
├── functions.php              # Theme functions (FSE support only)
├── style.css                  # Theme metadata
├── theme.json                 # FSE configuration
└── screenshot.png             # Theme screenshot
```

## Customization

### Using the Site Editor

1. Go to **Appearance > Editor** in WordPress admin
2. Customize templates, template parts, and styles
3. Save changes directly in the editor

### Global Styles

- Access via **Appearance > Editor > Styles**
- Modify colors, typography, spacing, and layout
- All settings are defined in `theme.json`

### Block Patterns

Available patterns in the block inserter:
- **Corporate Theme Patterns**:
  - Hero Section
  - Mission Section
  - Services Section
  - Why Choose Us Section
  - Contact Section
  - Three Column Services
- **Navigation Patterns**:
  - Main Navigation with Dropdowns
  - Simple Navigation
  - Footer Navigation

### Dark Mode

The theme includes automatic dark mode support. Users can toggle between modes using the moon/sun button in the header. The preference is saved in localStorage.

To customize dark mode styles, edit the CSS variables in `assets/css/style.css`.

## Template Hierarchy

All templates are block-based HTML files:
- `front-page.html` - Homepage
- `single.html` - Blog posts
- `page.html` - Static pages
- `archive.html` - Category/tag/date archives
- `search.html` - Search results
- `404.html` - Error pages
- `index.html` - Fallback template

## Development

### Adding New Block Patterns

1. Add pattern registration to `patterns/` directory
2. Include the file in `functions.php`
3. Use `register_block_pattern()` function

### Modifying Styles

1. Edit `assets/css/style.css` for custom styles
2. Use `theme.json` for global style settings
3. Styles are automatically loaded in both frontend and editor

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## License

GPL v2 or later

## Credits

- Default hero image from Unsplash
- System fonts for optimal performance
- Built following WordPress coding standards