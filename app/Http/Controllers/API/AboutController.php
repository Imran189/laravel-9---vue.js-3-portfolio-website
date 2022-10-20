<?php

namespace App\Http\Controllers\API;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function edit_about(){
        return About::orderBy('id','desc')->first();
    }

    public function update_about(Request $request,$id){
        $about= About::find($id);
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required'
        ]);

        if ($about->photo != $request->photo) {
            $newImg = $request->photo;
            $strpos = strpos($request->photo,';');
            $sub= substr($request->photo,0,$strpos);
            $ex=explode('/',$sub)[1];
            $imageName=time().".".$ex;
            Image::make($newImg)->resize(700,500)->save('img/upload/'. $imageName);
            $upload_path= public_path()."/img/upload";
            $image=$upload_path.$about->photo;
           // $img->save($upload_path,$imageName);

            if (file_exists($image)) {
                @unlink($image);
            }else{
                $imageName=$about->photo;
            }
        }

      

        $about->name =$request->name;
        $about->email =$request->email;
        $about->phone =$request->phone;
        $about->address =$request->address;
        $about->description =$request->description;
       // $about->photo = $imageName;
       // $about->cv =$namecv;
        $about->save();


    }
}