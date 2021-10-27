<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    public function index(Request $request){
        $student = Student::get();
        if($request->isMethod('post')){
            $search_word = $request->input('search_name');
            $searchName = Student::select()
            ->where('student_name', 'like', '%'.$search_word.'%')
            ->get();
            return view('student.index', compact('searchName'));
        } else {
        return view('student.index', compact('student'));
        }
    }

    //カリキュラム生の追加
    public function create(Request $request){
        $studentName = $request->input('student_name');
        $student = new Student();
    	$student->student_name = $studentName;
    	$student->save();
        return redirect('/');
    }

    //カリキュラム生とのステータス変更
    public function edit(Int $id, Request $request){
        $studentInfo = Student::where('student_id', $id)
                            ->select('student_id','student_name','progress','last_question','comprehension','memo','retire')
                            ->first();
        // dd($studentInfo);
        if($request->isMethod('post')){
            // dd($request);
            // $studentSta = $request->input();
            $studentSta = Student::where('student_id', $id)
            ->first();

        	$studentSta->progress = $request->progress;
            $studentSta->last_question = $request->last_question;
            $studentSta->comprehension = $request->comprehension;
            $studentSta->memo = $request->memo;
            $studentSta->retire = $request->retire;
    	    $studentSta->save();
            return back();
        }else{
            return view('student.edit', compact('studentInfo'));
        }
    }
}
