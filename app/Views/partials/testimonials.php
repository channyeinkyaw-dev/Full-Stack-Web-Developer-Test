<?php /** @var array $testimonials */ ?>
<section id="testimonials" class="testimonials" aria-labelledby="testimonials-heading">
  <div class="container">
    <header class="section-header">
      <?php if (! empty($testimonials['eyebrow'])): ?>
        <p class="section-header__eyebrow"><?= esc($testimonials['eyebrow']) ?></p>
      <?php endif; ?>
      <h2 id="testimonials-heading" class="section-header__heading"><?= esc($testimonials['heading']) ?></h2>
    </header>

    <ul class="testimonials__grid" role="list">
      <?php foreach (($testimonials['items'] ?? []) as $t): ?>
        <li class="testimonial reveal">
          <blockquote class="testimonial__quote">
            <p>&ldquo;<?= esc($t['quote']) ?>&rdquo;</p>
          </blockquote>
          <figcaption class="testimonial__author">
            <img class="testimonial__avatar"
                 src="<?= base_url($t['avatar']) ?>"
                 alt=""
                 width="48" height="48"
                 loading="lazy" decoding="async">
            <div>
              <p class="testimonial__name"><?= esc($t['author']) ?></p>
              <p class="testimonial__role"><?= esc($t['role']) ?><?php if (! empty($t['company'])): ?>, <?= esc($t['company']) ?><?php endif; ?></p>
            </div>
          </figcaption>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
