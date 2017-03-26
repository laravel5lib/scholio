<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class AlgoliaSchool extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'dummySchools';
    }
}
