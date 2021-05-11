<?php

namespace App\Http\Controllers\Rate\Properties;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\RecipeCategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipeCategoryController extends Controller
{
    public function index(): ResourceCollection
    {
        return RecipeCategoryResource::collection(Category::query()->get());
    }
}