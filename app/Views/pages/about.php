<?php
/** @var array $content */
ob_start();
?>
<section class="about" aria-labelledby="about-heading">
  <div class="container about__inner">
    <h1 id="about-heading" class="about__heading">About <span class="accent">Iron Software</span></h1>
    <p class="about__lead">
      Iron Software builds developer libraries that make document and data processing delightful.
      IronPDF is our flagship — already loved by .NET and Java teams, now coming to C++, Python, and Node.js.
    </p>
    <p class="about__body">
      This page demonstrates the CodeIgniter 4 routing and shared JSON data source: both
      <code>/</code> and <code>/about</code> read from <code>writable/data/content.json</code> via the same
      controller and model.
    </p>
    <p><a class="btn btn--primary" href="<?= base_url('/') ?>">← Back to IronPDF for C++</a></p>
  </div>
</section>
<?php
$bodyView = ob_get_clean();
echo view('layouts/main', ['content' => $content, 'bodyView' => $bodyView]);
