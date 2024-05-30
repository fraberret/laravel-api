<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $posts = Project::with('type', 'technologies')->orderByDesc('id')->paginate(12);
        return response()->json([
            'success' => true,
            'posts' => $posts
        ]);
    }
}
