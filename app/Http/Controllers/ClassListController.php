<?php

namespace App\Http\Controllers;

use App\ClassList;
use Illuminate\Http\Request;
use App\Http\Requests\storeClassList;
use Illuminate\Validation\Rule;
use Validator;


class ClassListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classLists = ClassList::get();
        return view('home',compact('classLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(storeClassList $request)
    {
        $classList = new ClassList;
        $classList->class_name=$request->class_name;
        $classList->save();
        return redirect()->back()->with(['success'=>'Add Class Successfully']);

    }
    public function showupdate(Request $request,$id){
        
        $classList=ClassList::where('id',$id)->first();
        return view('classlist.update',compact('classList'));        
    }
    public function saveupdate(Request $request){
             $request->validate([
            'class_name' => [
                'required',
                 Rule::unique('class_lists')->ignore($request->id),
            ],
        ]);

        ClassList::where('id',$request->id)->update(['class_name'=>$request->class_name]);
        return redirect()->back()->with(['success'=>'Update Class Successfully']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassList  $classList
     * @return \Illuminate\Http\Response
     */
    public function show(ClassList $classList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassList  $classList
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassList $classList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassList  $classList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassList $classList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassList  $classList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClassList::where('id', $id)->delete();
        return redirect()->back()->with(['success'=>'Class Delete Successfully']);
    }
}
