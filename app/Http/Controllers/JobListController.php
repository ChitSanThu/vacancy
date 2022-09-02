<?php

namespace App\Http\Controllers;

use App\Helper\FileUpload;
use App\Models\Application;
use App\Models\Vacancy;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobListController extends Controller
{
    public function index()
    {
        $vacancies=Vacancy::isActive()->with('position')->latest()->get();
        $mostApplyJobs=Vacancy::isActive()->withCount('applicants')->orderBy('applicants_count','desc')->take(10)->get();
        return view('web.index',compact('vacancies','mostApplyJobs'));
    }
    public function apply(Request $request,$vacancyId)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'birthday'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            'resume' => 'required|mimes:pdf',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors(),'status'=>400]);
        }

        $application = new Application();
        $application->vacancy_id=$vacancyId;
        $application->name=$request->name;
        $application->email=$request->email;
        $application->birthday=$request->birthday;
        $application->phone=$request->phone;
        $application->address=$request->address;
        $application->image=FileUpload::upload($request->image,'public/profile');
        $application->resume=FileUpload::upload($request->resume,'public/resume');
        $application->status=config('vacancy.application.cvdeck');
        $application->save();
        return response()->json(['success'=>'Successfully Applied','status'=>200]);
    }

    public function details($id)
    {
        $vacancy=Vacancy::isActive()->findOrFail($id);

        return view('web.details',compact('vacancy'));
    }
}
