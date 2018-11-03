<?php

namespace App\Http\Controllers;

use App\ResourceCategory;
use Illuminate\Http\Request;

class ResourceCategoryController extends Controller
{
    public function index()
    {
        $categories = ResourceCategory::all();
        return response()->json($categories);
    }
}
