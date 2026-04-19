<?php /** @var array $earlyAccess */ ?>
<section class="early-access" id="career" aria-labelledby="early-access-heading">

  <div class="early-access__top">
    <div class="container early-access__inner">
      <h2 id="early-access-heading">
        <?= esc($earlyAccess['headingPlain']) ?> <span><?= esc($earlyAccess['headingAccent']) ?></span>
      </h2>
      <p class="early-access__intro"><?= esc($earlyAccess['intro']) ?></p>

      <ul class="product-tiles" aria-label="IronPDF product availability">
        <?php foreach ($earlyAccess['products'] as $product): ?>
          <li class="product-tile product-tile--<?= esc($product['status'], 'attr') ?>">
            <span class="product-tile__status"><?= esc($product['label']) ?></span>
            <span class="product-tile__name">
              <strong>
                <?php $n = esc($product['name']); ?>
                <?= substr($n, 0, -3) ?><span><?= substr($n, -3) ?></span>
              </strong>
              <?= esc($product['variant']) ?>
            </span>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="early-access__signup">
    <h3>
      <?= esc($earlyAccess['signup']['headingPlain']) ?> <span><?= esc($earlyAccess['signup']['headingAccent']) ?></span>
    </h3>
    <form class="signup-form signup-form--wide" action="#" method="post" novalidate data-success="<?= esc($earlyAccess['signup']['success'], 'attr') ?>">
      <label class="visually-hidden" for="beta-email">Email address</label>
      <input id="beta-email"
             class="signup-form__input"
             type="email"
             name="email"
             placeholder="<?= esc($earlyAccess['signup']['placeholder']) ?>"
             autocomplete="email"
             required>
      <button class="signup-form__submit" type="submit">
        <?= esc($earlyAccess['signup']['button']) ?><span aria-hidden="true"></span>
      </button>
      <p class="signup-form__message" role="status" aria-live="polite"></p>
    </form>
  </div>
</section>
