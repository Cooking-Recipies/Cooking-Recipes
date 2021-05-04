<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\RecipeCategoryResource;
use App\Models\RecipeCategory;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipeCategoryController extends Controller
{
    public function index(): ResourceCollection
    {
        return RecipeCategoryResource::collection(RecipeCategory::query()->get());
    }
}