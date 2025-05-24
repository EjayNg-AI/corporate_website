# Corporate Theme

A minimalist, Gutenberg-ready WordPress theme with Full Site Editor (FSE) support, featuring responsive navigation, dark mode toggle, and clean corporate design.

## Features

- **Full Site Editor (FSE) Support**: Fully compatible with WordPress Site Editor
- **Block Patterns**: Pre-designed patterns for quick page building
- **Dark Mode**: Built-in dark/light mode toggle with localStorage persistence
- **Responsive Navigation**: Mobile-first navigation with dropdown support
- **Classic Theme Compatibility**: Works with both FSE and classic WordPress
- **Accessibility Ready**: ARIA labels and keyboard navigation support
- **Performance Optimized**: Minimal dependencies, optimized assets

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
│   │   └── theme.js           # Theme JavaScript
│   └── images/
├── parts/
│   ├── header.html            # FSE header template part
│   └── footer.html            # FSE footer template part
├── patterns/
│   ├── sections.php           # Content section patterns
│   └── navigation.php         # Navigation patterns
├── templates/
│   ├── index.html             # FSE index template
│   └── front-page.html        # FSE front page template
├── index.php                  # Classic theme fallback
├── header.php                 # Classic header
├── footer.php                 # Classic footer
├── functions.php              # Theme functions
├── style.css                  # Theme metadata
├── theme.json                 # FSE configuration
└── screenshot.png             # Theme screenshot
```

## Customization

### Colors
Edit color palettes in `theme.json` or use the Site Editor's Global Styles panel.

### Typography
Font families and sizes are defined in `theme.json`.

### Navigation
- Primary menu location: Header navigation
- Mobile menu location: Mobile navigation
- Edit menus through Appearance > Menus or Site Editor

### Dark Mode
The theme includes automatic dark mode support. Users can toggle between modes using the moon/sun icon in the header.

## Block Patterns

Available patterns:
- Hero Section
- Mission Section
- Services Section
- Why Choose Us Section
- Contact Section
- Three Column Services
- Main Navigation with Dropdowns
- Simple Navigation
- Footer Navigation

Access patterns through the block inserter's Patterns tab.

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