<?php /** @var array $cta */ ?>
<section id="cta" class="cta-banner" aria-labelledby="cta-heading">
  <div class="container cta-banner__inner">
    <h2 id="cta-heading" class="cta-banner__heading"><?= esc($cta['heading']) ?></h2>
    <?php if (! empty($cta['subheading'])): ?>
      <p class="cta-banner__subheading"><?= esc($cta['subheading']) ?></p>
    <?php endif; ?>
    <div class="cta-banner__actions">
      <?php if (! empty($cta['button'])): ?>
        <a class="btn btn--primary btn--lg" href="<?= esc($cta['button']['href']) ?>"><?= esc($cta['button']['label']) ?></a>
      <?php endif; ?>
      <?php if (! empty($cta['secondary'])): ?>
        <a class="btn btn--ghost btn--lg" href="<?= esc($cta['secondary']['href']) ?>"><?= esc($cta['secondary']['label']) ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>
