<?php
/** @var array $content */
/** @var string $bodyView */

$meta        = $content['meta'] ?? [];
$title       = esc($meta['title'] ?? 'IronPDF for C++');
$description = esc($meta['description'] ?? '');
$canonical   = $meta['canonical'] ?? '/';
$canonicalUrl  = str_starts_with($canonical, 'http') ? $canonical : base_url(ltrim($canonical, '/'));
$ogImage     = $meta['ogImage'] ?? '';
$ogImageUrl  = $ogImage !== '' ? base_url($ogImage) : '';
$siteName    = esc($meta['siteName'] ?? 'Iron Software');
$locale      = esc($meta['locale'] ?? 'en_US');
$twitterHandle = esc($meta['twitterHandle'] ?? '');
$heroImage   = base_url($content['hero']['artwork']['image'] ?? '');
?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Iron Software">
  <title><?= $title ?></title>
  <meta name="description" content="<?= $description ?>">
  <link rel="canonical" href="<?= esc($canonicalUrl) ?>">

  <!-- Open Graph -->
  <meta property="og:type"        content="website">
  <meta property="og:title"       content="<?= $title ?>">
  <meta property="og:description" content="<?= $description ?>">
  <meta property="og:site_name"   content="<?= $siteName ?>">
  <meta property="og:locale"      content="<?= $locale ?>">
  <meta property="og:url"         content="<?= esc($canonicalUrl) ?>">
  <?php if ($ogImageUrl !== ''): ?>
    <meta property="og:image"       content="<?= esc($ogImageUrl) ?>">
    <meta property="og:image:alt"   content="IronPDF for C++ beta program">
  <?php endif; ?>

  <!-- Twitter / X -->
  <meta name="twitter:card"        content="summary_large_image">
  <meta name="twitter:title"       content="<?= $title ?>">
  <meta name="twitter:description" content="<?= $description ?>">
  <?php if ($twitterHandle !== ''): ?>
    <meta name="twitter:site"      content="<?= $twitterHandle ?>">
  <?php endif; ?>
  <?php if ($ogImageUrl !== ''): ?>
    <meta name="twitter:image"     content="<?= esc($ogImageUrl) ?>">
  <?php endif; ?>

  <meta name="theme-color" content="#2C0F29">

  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('favicon.ico') ?>" sizes="any">

  <!-- Preload LCP hero image -->
  <?php if ($heroImage !== ''): ?>
    <link rel="preload" as="image" href="<?= esc($heroImage) ?>" fetchpriority="high">
  <?php endif; ?>

  <!-- Bootstrap 5.3.8 — reboot + grid (selective, performance-optimised) -->
  <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap-reboot.min.css"
        crossorigin="anonymous">
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap-grid.min.css"
        crossorigin="anonymous">
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap-utilities.min.css"
        crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/_tokens.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/hero.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/intro.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/why.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/early-access.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css') ?>">

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json"><?= json_encode([
    '@context'            => 'https://schema.org',
    '@type'               => 'SoftwareApplication',
    'name'                => 'IronPDF for C++',
    'applicationCategory' => 'DeveloperApplication',
    'operatingSystem'     => 'Windows, Linux, macOS',
    'description'         => $meta['description'] ?? '',
    'url'                 => $canonicalUrl,
    'publisher'           => [
      '@type' => 'Organization',
      'name'  => 'Iron Software',
      'url'   => 'https://ironsoftware.com',
    ],
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
</head>
<body>
  <a class="skip-link" href="#main-content">Skip to content</a>
  <?= view('partials/header', ['nav' => $content['nav']]) ?>

  <main id="main-content">
    <?= $bodyView ?>
  </main>

  <?= view('partials/footer', ['footer' => $content['footer']]) ?>

  <!-- Bootstrap 5.3.8 JS bundle (includes Popper) -->
  <script defer
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
          crossorigin="anonymous"></script>
  <script defer src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>
