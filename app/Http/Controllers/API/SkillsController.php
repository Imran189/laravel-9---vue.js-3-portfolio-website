<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function get_all_skills(){
        $skills = Skills::with('service')->orderBy('id','DESC')->get();
        return response()->json([
            'skills'=>$skills
        ],200);
    }
    public function create_skills(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ]);

        $skill= new Skills();
        $skill->name=$request->name;
        $skill->proficiency=$request->proficiency;
        $skill->service_id=$request->service_id;
        $skill->save();
    }

    public function update_skill(Request $request,$id){
        $skill= Skills::find($id);
        $this->validate($request,[
            'name'=>'required'
        ]);

        $skill->name=$request->name;
        $skill->proficiency=$request->proficiency;
        $skill->service_id=$request->service_id;
        $skill->save();
    }

    public function delete_skill(Request $request, $id){
        $skill= Skills::findOrFail($id);
        $skill->delete();
    }
}
