<?php /** @var array $intro */ ?>
<section class="intro" id="products" aria-labelledby="intro-heading">
  <div class="container intro__inner">
    <h2 id="intro-heading" class="intro__heading">
      <?= esc($intro['heading']['plain']) ?>
      <img class="intro__badge"
           src="<?= base_url('assets/img/badge.png') ?>"
           alt="<?= esc($intro['heading']['badge']) ?>"
           width="82"
           height="82"
           decoding="async">
    </h2>

    <ul class="intro__bullets" aria-label="IronPDF for C++ capabilities">
      <?php foreach ($intro['bullets'] as $bullet): ?>
        <li><span aria-hidden="true">#</span><?= esc($bullet) ?></li>
      <?php endforeach; ?>
    </ul>

    <div class="intro__body">
      <?php foreach ($intro['paragraphs'] as $paragraph): ?>
        <p><?= $paragraph ?></p>
      <?php endforeach; ?>
    </div>
  </div>
</section>
