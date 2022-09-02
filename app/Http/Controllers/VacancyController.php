<?php

namespace App\Http\Controllers;

use App\Helper\FileUpload;
use App\Models\Location;
use App\Models\Position;
use App\Models\Vacancy;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies=Vacancy::latest()->get();
        return view('admin.vacancy.index',compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations=Location::orderBy('name')->pluck('name');
        $positions=Position::pluck('name','id');
        return view('admin.vacancy.create',compact('positions','locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'position'=>'required',
            'description'=>'required',
            'requirement'=>'required',
            'location'=>'required',
            'required_employee'=>'required|numeric|min:1',
        ],
        [
            'position.required'=>'Position must be filled !',
            'position.unique'=>'Position has already been taken !',
            'description.required'=>'Job Description must be filled !',
            'requirement.required'=>'Job Requirement must be filled !',
            'location.required'=>'Location must be filled !',
            'required_employee.required'=>'No. of Required Employee must be filled !',
        ]);
        $coverImage="";
        if($request->hasFile('image')){
            $coverImage=FileUpload::upload($request->file('image'),'/public/vacancy-cover');
        }
        $vacancy=new Vacancy();
        $vacancy->position_id=$request->position;
        $vacancy->cover_image=$coverImage;
        $vacancy->description=$request->description;
        $vacancy->requirements=$request->requirement;
        $vacancy->location_id=$this->location($request->location);
        $vacancy->required_employee=$request->required_employee;
        $vacancy->job_type=config('vacancy.job_type.'.$request->job_type);
        $vacancy->save();
        return redirect()->route('vacancies.index')->with('success','Successfully Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }

    private function location($location){
        return Location::firstOrCreate(['name'=>$location])->id;
    }

    public function changeStatus($id)
    {
        $vacancy=Vacancy::findOrFail($id);
        $vacancy->is_active=!$vacancy->is_active;
        return $vacancy->save();
    }

}
