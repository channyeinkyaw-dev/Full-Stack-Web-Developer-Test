<?php /** @var array $why */ ?>
<section class="why" id="about" aria-labelledby="why-heading">
  <div class="container why__grid">
    <div class="why__media">
      <img src="<?= base_url($why['image']) ?>"
           alt="<?= esc($why['imageAlt']) ?>"
           width="<?= (int) $why['imageWidth'] ?>"
           height="<?= (int) $why['imageHeight'] ?>"
           loading="lazy"
           decoding="async">
    </div>
    <div class="why__content">
      <h2 id="why-heading">
        <?= esc($why['headingPlain']) ?> <span><?= esc($why['headingAccent']) ?></span>
      </h2>
      <?php foreach ($why['paragraphs'] as $paragraph): ?>
        <p><?= esc($paragraph) ?></p>
      <?php endforeach; ?>
    </div>
  </div>
</section>
