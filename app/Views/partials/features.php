<?php /** @var array $features */ ?>
<section id="features" class="features" aria-labelledby="features-heading">
  <div class="container">
    <header class="section-header">
      <?php if (! empty($features['eyebrow'])): ?>
        <p class="section-header__eyebrow"><?= esc($features['eyebrow']) ?></p>
      <?php endif; ?>
      <h2 id="features-heading" class="section-header__heading"><?= esc($features['heading']) ?></h2>
      <?php if (! empty($features['subheading'])): ?>
        <p class="section-header__subheading"><?= esc($features['subheading']) ?></p>
      <?php endif; ?>
    </header>

    <ul class="features__grid" role="list">
      <?php foreach (($features['items'] ?? []) as $item): ?>
        <li class="feature-card reveal">
          <span class="feature-card__icon feature-card__icon--<?= esc($item['icon']) ?>" aria-hidden="true"></span>
          <h3 class="feature-card__title"><?= esc($item['title']) ?></h3>
          <p class="feature-card__body"><?= esc($item['body']) ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
