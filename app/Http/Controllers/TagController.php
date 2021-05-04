<?php

namespace App\Http\Controllers;

use App\Http\Resources\Name\NameCollection;
use App\Services\Recipe\Tag\Getter\TagGetterInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TagController extends Controller
{
    public function index(Request $request, TagGetterInterface $getter): ResourceCollection
    {
        $tagsWithPagination = $getter->getPaginated($request->query("name"), $request->query("per-page"));

        return new NameCollection($tagsWithPagination);
    }
}