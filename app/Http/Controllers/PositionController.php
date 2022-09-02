<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions=Position::all();
        return view('admin.position.index',compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.position.create');
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
            'name'=>'required|unique:positions',
            'short_description'=>'required|max:255',
        ],
        [
            'name.required'=>'Position must be filled !',
            'name.unique'=>'Position has already been taken !',
            'short_description.required'=>'Short Description must be filled to show the vacancy page !',
        ]);
        $position=new Position();
        $position->name=$request->name;
        $position->slug=Str::slug($request->name);
        $position->short_description=$request->short_description;
        $position->save();
        return redirect()->route('positions.index')->with('success','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        $positions=Position::orderBy('name','desc')->pluck('name','slug');
        $applications=$position->employees;
        $title=$position->name;
        return view('admin.application.hire',compact('positions','applications','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }
    public function position($id)
    {
        return response()->json(Position::find($id));
    }
    public function employeeList($position)
    {

    }
}
