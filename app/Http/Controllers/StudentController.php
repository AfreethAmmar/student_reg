<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student-reg', ['students' => $students]);
    }

    public function addStudent(Request $request)
    {
        //dd($request->all());
        Student::create($request->all());
        return redirect()->route('home')->with('success', 'Student added successfully!');
    }
}
