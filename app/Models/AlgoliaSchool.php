<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class AlgoliaSchool extends Model
{
    use Searchable;

    public $timestamps = false;

    public function searchableAs()
    {
        return 'dummySchools';
    }
}
