# IronPDF for C++ Beta Landing Page

CodeIgniter 4 implementation of the IronPDF for C++ beta program landing page. The page is built from the Figma reference, converted into a pixel-perfect, production-quality, fully responsive layout.

## Requirements

### System Requirements

| Requirement | Minimum version                                  |
| ----------- | ------------------------------------------------ |
| PHP         | 8.2                                              |
| Composer    | 2.x                                              |
| Web browser | Chrome 112+, Firefox 113+, Safari 16+, Edge 112+ |

### PHP Extensions

The following PHP extensions are required by CodeIgniter 4:

- `intl`
- `mbstring`
- `json`
- `xml`
- `curl` _(optional, for HTTP requests)_

Verify extensions are enabled:

```bash
php -m | grep -E 'intl|mbstring|json|xml'
```

### No Build Tools Required

CSS and JavaScript are plain files served directly from `public/assets/`. No Node.js, npm, Webpack, or Vite is needed.

## Technology

- PHP 8.2+
- CodeIgniter 4.7
- Bootstrap 5.3.8 reboot, grid, utilities, and JS bundle from CDN (SRI-verified)
- Modular custom CSS in `public/assets/css`
- Vanilla JavaScript in `public/assets/js/main.js`
- JSON-backed content source at `app/Data/content.json`

## Project Structure

- `app/Controllers/Home.php` renders the landing page route.
- `app/Models/ContentModel.php` loads structured JSON content.
- `app/Views/pages/home.php` composes the page sections.
- `app/Views/partials` contains header, hero, intro, why, early-access, and footer views.
- `public/assets/img` contains the supplied visual assets.
- `docs/QA_CHECKLIST.md` contains the self-review checklist.

## Setup

1. Install PHP dependencies:

```bash
composer install
```

2. Copy environment configuration if needed:

```bash
cp env .env
```

3. Run the local CodeIgniter server:

```bash
php spark serve --host localhost --port 8080
```

4. Open:

```text
http://localhost:8080
```

## Validation

Useful local checks:

```bash
php -l app/Controllers/Home.php
php -l app/Models/ContentModel.php
php spark routes
composer test
```

## Implementation Notes

- The homepage content is data-driven through `app/Data/content.json` to satisfy the simulated data-source requirement.
- The page uses semantic sections, accessible labels, metadata, Open Graph tags, JSON-LD, alt text, and keyboard-visible focus states.
- CTA forms are front-end only and provide accessible validation feedback without requiring a backend.
