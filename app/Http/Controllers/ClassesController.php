<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignClass;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Classes;
use App\Teacher;
use App\ClassList;
use Validator;
use Hash;
use Carbon\Carbon;


class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function assign()
    {
        $teachers = Teacher::get();
        $classLists = ClassList::get();
        $classBusy =Classes::with('teacher')->get();
        if(count($teachers) == 0 || count($classLists)==0){
            return redirect()->back()->with(['error'=>'Add Class or Teacher']);
        }
            return view('class.add' ,compact('teachers','classLists','classBusy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssignClass $request)
    {
        $classesValue= Classes::where('teacher_id',$request->teacher)
            ->where('class_id',$request->class)
            ->whereDate('created_at', Carbon::today()->toDateString())
            ->get();
        if(count($classesValue)==0){
            $Classess = new Classes;
            $Classess->teacher_id = $request->teacher;
            $Classess->class_id = $request->class;
            $Classess->save();
            return redirect()->back()->with(['success'=>'Class Asssign to teacher']);            
        }            
            return redirect()->back()->with(['error'=>'Already Assign: Class Cannot Asssign to teacher ']);            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function busyClass(Classes $classes)
    {  

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
