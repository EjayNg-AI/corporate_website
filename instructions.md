The theme files are found in ./corporate-theme

────────────────────────────────────────

1.  BLOCK-TEMPLATE ERRORS
    ────────────────────────────────────────
    1-a Non-existent core block `core/site-url`
    • File: templates/404.html  
     • Symptom: The template is rendered with a “This block has encountered an error and cannot be previewed” notice and the WP editor will mark the file as having invalid markup.

         Fix: Replace the whole Buttons section with a normal button block that points to the homepage:

         ```html
         <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
         <div class="wp-block-buttons">
             <!-- wp:button {"backgroundColor":"light-primary","textColor":"white"} -->
             <div class="wp-block-button">
                 <a class="wp-block-button__link wp-element-button" href="{{homeUrl}}">Go&nbsp;to&nbsp;Homepage</a>
             </div>
             <!-- /wp:button -->
         </div>
         <!-- /wp:buttons -->
         ```

         (`{{homeUrl}}` is replaced automatically when the template is opened in the editor.)

1-b Wrong block nesting inside that same Buttons section  
 • You put a second block _inside_ a `core/button` wrapper.  
 • When the “site-url” problem above is fixed, the nesting issue disappears because the button now contains only its anchor element.

1-c Duplicate / nested `<main>` tags  
 • Front-page, 404, archive, index, page… all wrap their content in a Group block (`"tagName":"main"`).  
 • Inside those Groups there is sometimes another Group with `"tagName":"main"` or direct manual `<main>` markup.  
 • HTML allows only **one** `<main>` element per page.

     Fix: keep a single `<main>` element.
     Example for templates/front-page.html:

     ```html
     <!-- wp:template-part {"slug":"header"} /-->

     <!-- One single main element -->
     <!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
     <main class="wp-block-group">
       …all the sections…
     </main>
     <!-- /wp:group -->

     <!-- wp:template-part {"slug":"footer"} /-->
     ```

1-d blank.html lacks basic semantics  
 • It only contains `<!-- wp:post-content /-->` which is legal but produces invalid HTML (no `<html>`, `<body>`, etc.) when it is used directly in the front end.  
 • Always include header/footer (or at least a wrapping `<main>`).

     Minimal safe blank template:

     ```html
     <!-- wp:template-part {"slug":"header"} /-->
     <!-- wp:group {"tagName":"main"} -->
     <main class="wp-block-group">
         <!-- wp:post-content {"layout":{"type":"constrained"}} /-->
     </main>
     <!-- /wp:group -->
     <!-- wp:template-part {"slug":"footer"} /-->
     ```

──────────────────────────────────────── 2. theme.json – INVALID / DEPRECATED KEYS
────────────────────────────────────────
2-a settings.typography.fontWeights  
 • `fontWeights` is _not_ part of the public schema.  
 • WordPress will throw “Unknown property” notices and the CSS custom properties ( `--wp--preset--font-weight--medium` etc. ) are _not_ generated, so everything in style.css that depends on them fails.

     Fix:
     •  Remove the whole `fontWeights` array.
     •  If you need weight tokens, add them to the `custom` section or hard-code the number in CSS.

2-b settings.spacing.padding and settings.spacing.margin  
 • Keys accepted by the schema are `customPadding` and `customMargin` (boolean) – or omit them (they are `true` by default for block themes).  
 • Your current booleans are silently ignored.

     Fix: delete those two lines or rename them to `customPadding`, `customMargin`.

2-c settings.spacing.spacingScale.steps = 0  
 • 0 makes no sense (nothing gets generated).  
 • Omit `spacingScale` entirely or set a real integer ( e.g. 7 ).

2-d Referenced design-tokens not generated because of 2-a/2-b  
 • In style.css you use `var(--wp--preset--font-weight--medium)` and so on.  
 • After removing `fontWeights`, change the CSS to raw numbers or create a custom token:

       theme.json → "custom":{"fontWeight":{"medium":"500"}}
       style.css → `font-weight:var(--wp--custom--font-weight--medium);`

──────────────────────────────────────── 3. functions.php – CLEAN-UP & BEST PRACTICE
────────────────────────────────────────
3-a Unneeded theme-supports in a block theme  
 • `add_theme_support( 'customize-selective-refresh-widgets' );` – widgets are not used in FSE.  
 • `add_theme_support( 'align-wide' );` is **already** on for all block themes.

     Fix: remove both calls.

3-b Editor styles  
 • With theme.json in place the stylesheet is _already_ loaded in the editor.  
 • If you still want a separate file, enqueue it with `add_editor_style( 'editor.css' );` and keep front-end CSS in style.css.

3-c Enqueue script dependencies  
 `php
     wp_enqueue_script(
         'corporate-theme-script',
         get_template_directory_uri() . '/assets/js/theme.js',
         array( 'wp-dom-ready' ),        // dependency
         wp_get_theme()->get( 'Version' ),
         true
     );
     `

3-d Inline admin-bar CSS  
 • Instead of hard-coding `32px/46px`, use the CSS variable WordPress provides:

       ```css
       header {
         top: var(--wp-admin--admin-bar--height, 0);
       }
       ```

     •  You can then remove the whole `wp_add_inline_style()` section.

3-e Translation domain  
 • Text-domain in header comment is `corporate-theme`.  
 • Load it with `load_theme_textdomain( 'corporate-theme', get_stylesheet_directory() . '/languages' );` so that a child-theme keeps working.

──────────────────────────────────────── 4. CSS PROBLEMS
────────────────────────────────────────
4-a Variables that never exist (see theme.json fixes)  
4-b Hard-coded colour values instead of tokens inside dark-mode rules  
 → Use `var(--wp--preset--color--*)` everywhere so Global Styles can overwrite them.

4-c Accessibility: colour contrast of the outline button (“Get Started”) fails WCAG on the light background (#0057b8 on #fff).  
 → Adjust token or provide a darker hover/focus outline.

──────────────────────────────────────── 5. PATTERNS & CATEGORIES
────────────────────────────────────────
5-a You register a custom pattern-category `corporate-theme` **after** you call `register_block_pattern()` in sections.php and navigation.php (both are loaded immediately).  
 • Because of the priority (9) that still works, but it is fragile.

     Fix:
     •  Call `register_block_pattern_category()` in the same callback as the pattern registration or be sure the category runs *before* you register the patterns (priority < 9).

──────────────────────────────────────── 6. MISCELLANEOUS / REQUIRED FILES
────────────────────────────────────────
6-a Add a **`/screenshot.png`** (1200×900 or larger, 2:3 ratio) to meet the theme-directory rules.

6-b Add a minimal **index.php**  
 Even block themes are expected to ship one PHP file:

     ```php
     <?php
     // Silence is golden.  This theme is 100 % block-based.
     ```

     (Prevents “Directory access forbidden” on some hosts.)

6-c Provide `readme.txt` if you intend to submit to wp.org.

──────────────────────────────────────── 7. SUMMARY OF THE REQUIRED CODE CHANGES
────────────────────────────────────────

1. Replace the invalid button block in 404.html (and fix its nesting).
2. Ensure each template contains _one_ `<main>` element only.
3. Add header/footer or at least a wrapper to blank.html.
4. Clean theme.json: remove `fontWeights`, incorrect spacing keys, 0-step scale; create custom tokens if you still need them.
5. Search & replace in style.css → point to the new custom tokens or hard numbers.
6. Trim functions.php:  
   • remove obsolete theme-supports,  
   • change text-domain path,  
   • enqueue script with dependency,  
   • switch to CSS admin-bar variable.
7. Make sure pattern category registration always runs _before_ the pattern files are included.
8. Add screenshot.png and a placeholder index.php.
