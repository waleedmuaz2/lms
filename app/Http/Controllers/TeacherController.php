<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use Illuminate\Validation\Rule;
use App\AttendenceList;
use App\Teacher;
use Carbon\Carbon;
use Validator;
use Hash;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::get();
        return view('teacher.add',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TeacherRequest $request)
    {
        $teacher = new Teacher;
        $teacher->first_name=$request->first_name;
        $teacher->last_name=$request->last_name;
        $teacher->email=$request->email;
        $teacher->password=Hash::make($request->password);
        $teacher->save();
        return redirect()->back()->with(['success'=>'Add Teacher Successfully']);
    }
    public function showupdate(Request $request,$id){
        
        $teacher=Teacher::where('id',$id)->first();
        return view('teacher.update',compact('teacher'));        
    }
    public function saveupdate(TeacherRequest $request){

        Teacher::where('id',$request->id)->update(['first_name'=>$request->first_name ,'last_name'=>$request->last_name ]);
        return redirect()->back()->with(['success'=>'Update Teacher Successfully']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::where('id', $id)->delete();
        return redirect()->back()->with(['success'=>'Teacher Delete Successfully']);
    }
    public function listTeacher()
    {
        $status=0;
        $dateCurrent=AttendenceList::with('teacher')->whereDate('created_at', Carbon::today())->get();   
        if(count($dateCurrent) != 0){
            $status=1;
        }
        $teachers=Teacher::get();
        return view('teacher.attendence',compact('teachers','status','dateCurrent'));
    }
    public function attendenceStore(Request $request)
    {
        if(!empty($request->teacher_id)){
            foreach ($request->teacher_id as $key) {
                $attend = new AttendenceList;
                $attend->teacher_id = $key;
                $attend->is_attend=1;
                $attend->save();
            }
        }
        if(!empty($request->un_teacher_id)){
            foreach ($request->un_teacher_id as $key) {
                $attend = new AttendenceList;
                $attend->teacher_id = $key;
                $attend->is_attend=0;
                $attend->save();
            }
        }
        return 1;
    }
}
