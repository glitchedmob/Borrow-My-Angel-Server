<?php

namespace App\Http\Controllers;

use App\NationalResource;
use Illuminate\Http\Request;
use App\ResourceCategory;

class NationalResourcesController extends Controller
{
    public function search(Request $request)
    {
        $categoryId = (int)$request->input('category_id');

        $resourceQuery = ResourceCategory::with('nationalResources');

        if($categoryId) {
            $resourceQuery = $resourceQuery->where('id', $categoryId);
        }

        $resources = $resourceQuery->get();

        return response()->json($resources);
    }

    public function show(Request $request)
    {
        $ids = json_decode($request->input('ids'));

        $resources = NationalResource::whereIn('id', $ids)->with('resourceCategory')->get();

        return response()->json($resources);
    }
}
