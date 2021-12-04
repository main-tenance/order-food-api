<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryCompany extends Pivot
{
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function companies(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function dishes()
    {
        return $this->hasManyThrough(
            Dish::class,
            Category::class
        );
    }
}
