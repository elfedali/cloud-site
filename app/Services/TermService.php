<?php

namespace App\Services;

use App\Models\Term;

class TermService
{
    public function all(string $taxonomy): array
    {
        return Term::where('taxonomy', $taxonomy)->get()->toArray();
    }

    public function create(array $data): void
    {
        $term = new Term();
        $term->name = $data['name'];
        $term->slug = $data['slug'];
        $term->taxonomy = $data['taxonomy'];
        $term->save();
    }
}
