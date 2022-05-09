<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Formation;
use App\Models\Idioms;
use App\Models\Knowledges;
use App\Models\Laboral_Experience;
use App\Models\Reference;
use App\Models\Soft_Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use stdClass;

class EditorController extends Controller
{
    public function show(){
        $id=Auth::user()->id;
        //get user curriculum
        $curriculums=Curriculum::where('id_user',$id)->get();
        return view('editor',compact('curriculums'));
    }

    public function uploadFile(Request $request){
        // validate the request have the pdf file
        $request->validate([
            'cv' => 'required|mimetypes:application/pdf|max:10000',
        ]);
        $id=Auth::user()->id;
        $unique_name=uniqid();
        $file=$request->file('cv');
        $file->storeAs('public/cv',$unique_name.'.pdf');
        $path='cv/'.$unique_name.'.pdf';

        $cv=new Curriculum();
        $cv->id_user=$id;
        $cv->cv_tittle=$file->getClientOriginalName();
        $cv->cv_template=$path;
        $cv->save();

        return redirect()->route('cv.show');
    }

    public function downloadFile(Request $request){
        $path=storage_path('app/public/'.$request->cv_path);
        return response()->download($path,$request->cv_tittle);
    }

    public function deleteFile(Request $request){
        $id=Auth::user()->id;
        $cv=Curriculum::where('id_user',$id)->where('cv_template',$request->cv_path)->first();
        $cv->delete();
        $path=storage_path('app/public/'.$request->cv_path);
        Storage::delete($path);
        return redirect()->route('cv.show');
    }
}
