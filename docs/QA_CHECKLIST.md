# QA Checklist

## Pixel and Layout Review

- Desktop reviewed against `IronPDF.png` for header spacing, hero text hierarchy, hero artwork placement, CTA band, section spacing, product status pills, and footer placement.
- Confirm diagonal background shapes remain decorative and do not cover text.
- Confirm images use fixed intrinsic dimensions to reduce layout shift.
- Confirm page content remains centered within the intended max-width container.

## Typography Review

- Headings use the supplied Gotham-style stack with bold weights and zero letter-spacing where required.
- Navigation and CTA labels use uppercase, heavier weights, and spacing consistent with the reference.
- Body copy uses lighter weight, generous line-height, and muted contrast to match the design.
- Long text wraps cleanly on mobile without overflowing its parent.

## Responsive Review

- Desktop: verify at 1440px and 1600px widths.
- Tablet: verify at 768px and 1024px widths.
- Mobile: verify at 320px, 375px, and 430px widths.
- Confirm the nav collapses on smaller screens and remains keyboard accessible.
- Confirm signup forms stack on mobile and remain usable with touch input.
- Confirm product cards stack before their text becomes cramped.

## Accessibility Review

- Confirm heading order starts with one `h1` and progresses by section.
- Confirm skip link appears on focus.
- Confirm all meaningful images have alt text and decorative images are hidden from assistive technology.
- Confirm form inputs have labels and validation messages use live regions.
- Confirm focus states are visible for nav links, menu toggle, inputs, and buttons.
- Confirm color contrast is acceptable for body text, buttons, and badges.

## SEO Review

- Confirm page has title, description, canonical link, Open Graph tags, and theme color.
- Confirm JSON-LD describes the software application.
- Confirm visible copy matches the IronPDF beta program topic.
- Confirm nav anchors resolve to valid in-page sections.

## Browser Review

- Chrome: verify layout, form validation, and responsive nav.
- Firefox: verify layout, form validation, and responsive nav.
- Safari: verify if available, focusing on form control rendering and image scaling.

## Core Web Vitals and Performance

- Hero image uses explicit width and height plus `fetchpriority="high"`.
- Below-fold imagery uses lazy loading.
- JavaScript is deferred and limited to nav/form enhancements.
- CSS is split by section and avoids layout-shifting animations.
- Bootstrap 5.3.8 usage limited to reboot/grid/utilities/bundle; full CSS avoided to minimise payload.
- Bootstrap JS bundle SRI integrity hash verified.
- Hero image preloaded via `<link rel="preload">` and marked `fetchpriority="high"` for LCP.

## Lighthouse Checklist

- Run Lighthouse in Chrome DevTools against the local app.
- Target strong scores for Performance, Accessibility, Best Practices, and SEO.
- Record any issues that require design or asset changes before submission.
