<?php

namespace App\Services;

use App\Models\Document;

class DocumentService
{
    public function all(): array
    {
        return Document::all()->toArray();
    }

    public function create(array $data): void
    {
        $document = new Document();
        $document->name = $data['name'];
        $document->url = $data['url'];
        $document->save();
    }
}
