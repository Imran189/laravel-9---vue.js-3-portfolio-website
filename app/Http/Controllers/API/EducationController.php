<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function get_all_education(){
        $educations = Education::orderBy('id','DESC')->get();

        return response()->json([
            'educations'=>$educations
        ],200);
    }

    public function create_education(Request $request){

        $this->validate($request,[
            'institution'=>'required'
        ]);

        $educations = new Education();
        $educations->institution=$request->institution;
        $educations->period=$request->period;
        $educations->degree=$request->degree;
        $educations->department=$request->department;
        $educations->save();

    }

    public function update_education(Request $request,$id){
        $educations=Education::find($id);

        $this->validate($request,[
            'institution'=>'required'
        ]);

        $educations->institution=$request->institution;
        $educations->period=$request->period;
        $educations->degree=$request->degree;
        $educations->department=$request->department;
        $educations->save();
    }

    public function delete_education(Request $request,$id){
        $educations = Education::findOrFail($id);
        $educations->delete();

        
    }
}
