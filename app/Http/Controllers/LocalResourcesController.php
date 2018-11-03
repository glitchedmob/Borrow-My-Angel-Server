<?php

namespace App\Http\Controllers;

use App\ResourceCategory;
use Illuminate\Http\Request;

class LocalResourcesController extends Controller
{
    public function index()
    {
        $resources = ResourceCategory::with('localResources')->all();
        return response()->json($resources);
    }
}
