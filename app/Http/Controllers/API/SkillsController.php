<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function get_all_skills(){
        $skills =Skills::with('service')->orderBy('id','DESC')->get();
        return response()->json([
            'skills'=>$skills
        ],200);
    }
}
