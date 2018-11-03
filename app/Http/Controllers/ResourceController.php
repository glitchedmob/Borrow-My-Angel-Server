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
        $location = $request->input('location');
        $location_level = 'national';
        $category = $request->input('category_id');

        if($location) {
            $location_level = 'local';
        }

        $resources = Resource::with(['categories'])->get();

        return response()->json($resources);
    }
}
