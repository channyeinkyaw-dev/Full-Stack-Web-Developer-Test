<?php
/** @var array $content */

$sections = [
    view('partials/hero', ['hero' => $content['hero']]),
    view('partials/intro', ['intro' => $content['intro']]),
    view('partials/why', ['why' => $content['why']]),
    view('partials/early-access', ['earlyAccess' => $content['earlyAccess']]),
];

echo view('layouts/main', [
    'content' => $content,
    'bodyView' => implode('', $sections),
]);
