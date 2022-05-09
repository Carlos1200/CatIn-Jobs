<?php

namespace App\Http\Livewire;

use App\Models\HiringCV;
use Illuminate\Http\Request;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.create');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimetypes:application/pdf|max:10000',
        ]);
        $id=$request->id_hiring;
        $unique_name=uniqid();
        $file=$request->file('cv');
        $file->storeAs('public/hire_cv',$unique_name.'.pdf');
        $path='cv/'.$unique_name.'.pdf';

        $cv=new HiringCV();
        $cv->id_hiring=$id;
        $cv->cv_tittle=$file->getClientOriginalName();
        $cv->path=$path;
        $cv->save();

        return redirect()->route('jobs.showDetails',$id);
    }
}
