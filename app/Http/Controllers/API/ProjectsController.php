<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function get_all_projects(){
        $data = Projects::orderBy('id','DESC')->get();

        return response()->json([
            'projects'=> $data
        ],200);
    }
}
