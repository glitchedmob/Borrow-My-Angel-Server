<?php

namespace App\Http\Controllers;

use App\LocalResource;
use App\ResourceCategory;
use Illuminate\Http\Request;

class LocalResourcesController extends Controller
{
    public function search(Request $request)
    {
        $categoryId = (int)$request->input('category_id');
        $zip = $request->input('zip');
        $city = $request->input('city');
        $state = $request->input('state');

        $resourceQuery = null;

        if($city && $state) {
            $resourceQuery = ResourceCategory::with(['localResources' => function($query) use($city, $state) {
                return $query->where('city', $city)->where('state', $state);
            }]);
        } elseif ($zip) {
            $resourceQuery = ResourceCategory::with(['localResources' => function($query) use($zip) {
                return $query->where('zip', $zip);
            }]);
        } else {
            $resourceQuery = ResourceCategory::with('localResources');
        }

        if($categoryId) {
            $resourceQuery = $resourceQuery->where('id', $categoryId);
        }

        $resources = $resourceQuery->get();

        return response()->json($resources);
    }

    public function show(Request $request)
    {
        $ids = json_decode($request->input('ids'));

        $resources = LocalResource::whereIn('id', $ids)->with('resourceCategory')->get();

        return response()->json($resources);
    }
}
