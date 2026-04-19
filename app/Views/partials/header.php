<?php /** @var array $nav */ ?>
<header class="site-header" role="banner">
  <div class="container-fluid site-header__inner">
    <a class="site-header__brand" href="<?= base_url('/') ?>" aria-label="<?= esc($nav['brand']) ?> home">
      <img src="<?= base_url($nav['logo']) ?>"
           alt="<?= esc($nav['brand']) ?>"
           width="<?= (int) ($nav['logoWidth'] ?? 230) ?>"
           height="<?= (int) ($nav['logoHeight'] ?? 29) ?>"
           decoding="async">
    </a>

    <button class="site-header__toggle" type="button"
            aria-controls="primary-navigation"
            aria-expanded="false"
            aria-label="Open navigation">
      <span class="site-header__toggle-bar"></span>
      <span class="site-header__toggle-bar"></span>
      <span class="site-header__toggle-bar"></span>
    </button>

    <nav id="primary-navigation" class="site-header__nav" aria-label="Primary navigation">
      <ul class="site-header__list">
        <?php foreach ($nav['items'] as $link): ?>
          <li>
            <a class="site-header__link" href="<?= esc($link['href'], 'attr') ?>">
              <?= esc($link['label']) ?>
              <?php if (! empty($link['hasMenu'])): ?>
                <span class="site-header__chevron" aria-hidden="true"></span>
              <?php endif; ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>
