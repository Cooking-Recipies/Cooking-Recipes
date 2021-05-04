<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends ModelWithoutTimestamps
{
    protected $table = "categories";

    protected $fillable = [
        "name",
    ];

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}