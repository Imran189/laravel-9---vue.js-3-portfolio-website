<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function get_experiences(){
        $data= Experience::orderBy('id','DESC')->get();

        return response()->json([
            'experiences'=> $data
        ],200);
    }
}
