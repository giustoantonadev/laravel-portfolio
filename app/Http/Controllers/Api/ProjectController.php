<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'results' => Project::with('type')->get()
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('type')->where('slug', $slug)->first();

        if (!$project) {
            return response()->json([
                'success' => false,
                'error' => 'Project not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}
