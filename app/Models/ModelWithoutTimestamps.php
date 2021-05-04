<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class ModelWithoutTimestamps extends Model
{
    public $timestamps = false;
}