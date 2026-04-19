<?php
/** @var array $hero */
$hasArtwork = ! empty($hero['artwork']['image']);
?>
<section class="hero<?= $hasArtwork ? ' hero--has-art' : ' hero--no-art' ?>" aria-labelledby="hero-heading">
  <?php if ($hasArtwork): ?>
    <img class="hero__artwork"
         src="<?= base_url($hero['artwork']['image']) ?>"
         alt=""
         aria-hidden="true"
         width="805"
         height="710"
         loading="eager"
         decoding="async"
         fetchpriority="high">
  <?php endif; ?>
  <div class="container hero__inner">
    <div class="hero__copy">
      <div class="hero__product">
        <img class="hero__product-logo"
             src="<?= base_url($hero['productBadge']['image']) ?>"
             alt="<?= esc($hero['productBadge']['alt']) ?>"
             width="465"
             height="80"
             decoding="async">
        <?php if (! empty($hero['productBadge']['suffix'])): ?>
          <span><?= esc($hero['productBadge']['suffix']) ?></span>
        <?php endif; ?>
      </div>

      <p class="hero__supertitle"><?= esc($hero['supertitle']) ?></p>
      <h1 id="hero-heading" class="hero__heading">
        <?= esc($hero['heading']['plain']) ?>
        <span><?= esc($hero['heading']['accent']) ?></span>
      </h1>
      <p class="hero__status"><?= esc($hero['status']) ?></p>
    </div>
  </div>

  <div class="hero__signup-band">
    <div class="container hero__signup-inner">
      <div class="hero__signup-copy">
        <h2><?= esc($hero['signupTitle'] ?? 'Be one of the first') ?></h2>
        <p><?= esc($hero['signupSubtitle'] ?? 'Sign up NOW to get early access!') ?></p>
      </div>
      <form class="signup-form" action="#" method="post" novalidate data-success="<?= esc($hero['signup']['success'], 'attr') ?>">
        <label class="visually-hidden" for="hero-email">Email address</label>
        <input id="hero-email"
               class="signup-form__input"
               type="email"
               name="email"
               placeholder="<?= esc($hero['signup']['placeholder']) ?>"
               autocomplete="email"
               required>
        <button class="signup-form__submit" type="submit">
          <?= esc($hero['signup']['button']) ?><span aria-hidden="true"></span>
        </button>
        <p class="signup-form__message" role="status" aria-live="polite"></p>
      </form>
      <p class="hero__notice">
        <span><?= esc($hero['notice']['badge']) ?></span>
        <?= esc($hero['notice']['text']) ?>
        <?php foreach ($hero['notice']['languages'] as $index => $language): ?>
          <strong><?= esc($language) ?></strong><?= $index < count($hero['notice']['languages']) - 1 ? ' | ' : '' ?>
        <?php endforeach; ?>
      </p>
    </div>
  </div>
</section>
