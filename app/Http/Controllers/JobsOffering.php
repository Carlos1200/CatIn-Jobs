<?php

namespace App\Http\Controllers;

use App\Models\Hiring_Publication;
use App\Models\SaveJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsOffering extends Controller
{
    //
    public function show()
    {
        return view('publish');
    }

    public function store(Request $request)
    {

        $id = Auth::user()->id;

        $request->validate([
            'title' => 'required|max:255',
            'hiring_type' => 'required|max:255',
            'description' => 'required',
            'salary' => 'required|numeric',
        ]);

        $job = new Hiring_Publication();
        $job->id_user = $id;
        $job->title = $request->title;
        $job->hiring_type = $request->hiring_type;
        $job->description = $request->description;
        $job->salary = $request->salary;
        $job->save();

        return redirect()->route('home');
    }

    public function getInfo(){
        $jobs=Hiring_Publication::select('company_information.company_name','company_information.work_area',
        'company_information.location','hiring_publication.title','hiring_publication.hiring_type',
        'hiring_publication.created_at','hiring_publication.salary','hiring_publication.id')
        ->join('users','users.id','=','hiring_publication.id_user')
        ->join('company_information','user_id','=','users.id')
        ->get();
        
        $save_jobs=SaveJob::select('hiring_publication.title','hiring_publication.id')
        ->join('hiring_publication','hiring_publication.id','=','save_jobs.id_job')
        ->where('save_jobs.id_user',Auth::user()->id)
        ->get();

        return view('dashboard',compact('jobs','save_jobs'));
    }

    public function saveJob(Request $request){
        $id=Auth::user()->id;
        //validate if the job is already saved
        $job_exist=SaveJob::where('id_user',$id)->where('id_job',$request->job_id)->first();
        if($job_exist){
            return redirect()->back();
        }
        $job=new SaveJob();
        $job->id_user=$id;
        $job->id_job=$request->job_id;
        $job->save();
        return redirect()->back();
    }

    public function unsaveJob(Request $request){
        $id=Auth::user()->id;
        $job=SaveJob::where('id_user',$id)->where('id_job',$request->job_id)->first();
        var_dump($job);
        $job->delete();
        return redirect()->back();
    }

    public function showDetails($id){
        $job=Hiring_Publication::select('company_information.company_name','company_information.work_area',
        'company_information.location','hiring_publication.title','hiring_publication.hiring_type','hiring_publication.description',
        'hiring_publication.salary','hiring_publication.id')
        ->join('users','users.id','=','hiring_publication.id_user')
        ->join('company_information','user_id','=','users.id')
        ->where('hiring_publication.id',$id)
        ->get()[0];
        return view('jobinfo',compact('job'));
    }
}
