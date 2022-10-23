<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function get_all_education(){
        $education = Education::orderBy('id','DESC')->get();
    }
}
