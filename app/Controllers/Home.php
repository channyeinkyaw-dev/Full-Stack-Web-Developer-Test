<?php

namespace App\Controllers;

use App\Models\ContentModel;

class Home extends BaseController
{
    private function content(): array
    {
        return (new ContentModel())->get();
    }

    public function index(): string
    {
        return view('pages/home', [
            'content' => $this->content(),
        ]);
    }

    public function about()
    {
        return redirect()->to('/');
    }
}
