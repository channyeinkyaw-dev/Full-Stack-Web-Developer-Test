<?php

namespace App\Models;

use JsonException;
use RuntimeException;

class ContentModel
{
    private string $path;

    public function __construct(?string $path = null)
    {
        $this->path = $path ?? APPPATH . 'Data/content.json';
    }

    public function get(): array
    {
        if (! is_file($this->path)) {
            throw new RuntimeException("Content file not found: {$this->path}");
        }

        $raw = file_get_contents($this->path);
        if ($raw === false) {
            throw new RuntimeException("Unable to read content file: {$this->path}");
        }

        try {
            $data = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new RuntimeException('Invalid JSON content data.', 0, $exception);
        }

        if (! is_array($data)) {
            throw new RuntimeException('Content JSON must decode to an array.');
        }

        return $data;
    }
}
