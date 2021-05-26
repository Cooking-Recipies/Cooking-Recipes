<?php

namespace App\Http\Controllers\Recipe\Properties;

use App\Http\Controllers\Controller;
use App\Http\Resources\Name\NameCollection;
use App\Services\Recipe\Properties\Contracts\TagGetterInterface;
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