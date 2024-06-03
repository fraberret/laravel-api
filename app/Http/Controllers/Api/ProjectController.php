<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->orderByDesc('id')->paginate(12);
        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('technologies', 'type')->where('slug', $slug)->first();
        if ($project) {
            return response()->json([
                'success' => true,
                'response' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'response' => 'Error 404'
            ]);
        }
    }
}
