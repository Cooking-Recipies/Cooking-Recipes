<?php

namespace App\Http\Controllers\Rate\Properties;

use App\Http\Controllers\Controller;
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