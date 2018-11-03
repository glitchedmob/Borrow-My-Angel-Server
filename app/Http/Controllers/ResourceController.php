<?php

namespace App\Http\Controllers;

use App\ResourceCategory;
use Illuminate\Http\Request;
use App\Resource;

class ResourceController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $city = $request->input('city');
        $state = $request->input('state');
        $locationLevel = 'national';
        $categoryId = (int)$request->input('category_id');

        if ($city && $state) {
            $locationLevel = 'local';
        }

        $resourcesQuery = Resource::with(['categories'])->where('location_level', $locationLevel);

        if ($locationLevel === 'local') {
            $resourcesQuery = $resourcesQuery->where('city', $city)->where('state', $state);
        }

        if ($categoryId) {
            $resourcesQuery = $resourcesQuery->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('id', $categoryId);
            });
        }

        error_log($locationLevel);

        $resources = $resourcesQuery->get();

        return response()->json($resources);
    }
}
