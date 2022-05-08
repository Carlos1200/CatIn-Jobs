<?php

namespace App\Http\Controllers;

use App\Models\Hiring_Publication;
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

    public function getInfo()
    {
        $jobs = Hiring_Publication::select(
            'company_information.company_name',
            'company_information.work_area',
            'company_information.location',
            'hiring_publication.title',
            'hiring_publication.hiring_type',
            'hiring_publication.created_at',
            'hiring_publication.salary',
            'hiring_publication.id'
        )
            ->join('users', 'users.id', '=', 'hiring_publication.id_user')
            ->join('company_information', 'user_id', '=', 'users.id')
            ->get();

        return view('dashboard', compact('jobs'));
    }

    public function showDetails()
    {
        return view('jobinfo');
    }
}
