<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|string|min:3|max:100',
                'edad' => 'required|integer|min:3|max:100',
            ]
        );
        Student::create($request->all());

        return redirect()->route('students.index');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {

        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nombre' => 'required|string|min:3|max:100',
                'edad' => 'required|integer|min:3|max:100',
            ]
        );
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index');
    }


    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
