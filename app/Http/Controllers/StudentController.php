<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Pagination\Paginator;


class StudentController extends Controller
{
    public function index(Request $request){
        $students = Student::orderBy('updated_at', 'desc')
        ->paginate(8);
        if($request->isMethod('post')){
            $search_word = $request->input('search_name');
            $students = Student::select()
            ->where('student_name', 'like', '%'.$search_word.'%')
            ->orderBy('updated_at', 'desc')
            ->paginate(8);
            return view('student.index', compact('students', 'search_word'));
        } else {
        return view('student.index', compact('students'));
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
                            ->select('students.*')
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
            $studentSta->retire = $request->retire;
            $studentSta->last_visit_date = $request->last_visit_date;
            $studentSta->last_question_date	= $request->last_question_date;
            $studentSta->save();
            return back();
        }else{
            return view('student.edit', compact('studentInfo'));
        }
    }

    //sort機能を実装
    public function sort(){
        $students = Student::select()
        ->where('progress', 'DawnSNS')
        ->orderBy('updated_at', 'desc')
        ->paginate(8);
        return view('student.index', compact('students'));
    }
}
