<?php

namespace App\Http\Controllers\Recipe\Properties;

use App\Http\Controllers\Controller;
use App\Http\Resources\Name\NameCollection;
use App\Services\Recipe\Properties\Contracts\ComponentGetterInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ComponentController extends Controller
{
    public function index(Request $request, ComponentGetterInterface $getter): ResourceCollection
    {
        $componentsWithPagination = $getter->getPaginated($request->query("name"), $request->query("per-page"));

        return new NameCollection($componentsWithPagination);
    }
}