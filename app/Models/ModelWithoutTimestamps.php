<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelWithoutTimestamps extends Model
{
    public $timestamps = false;
}