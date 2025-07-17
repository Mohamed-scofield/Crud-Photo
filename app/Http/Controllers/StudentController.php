<?php

namespace App\Http\Controllers;

use App\Models\note;
use App\Models\student;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = student::with('notes')->paginate(5);

        return view('Notes.index' , compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nom'=> 'required|string|max:255',
            'prenom'=> 'required|string|max:255',
            'email'=> 'required|email|unique:students,email',
            'photo'=> 'nullable|image|mimes:jpg,png,svg,jpeg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('students', 'public');
            $validateData['photo'] = $path;
        }

        Student::create($validateData);

        return redirect()->route('Notes.index')->with('success', 'Student added successfully !');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('Notes.show' , compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('Notes.edit' ,compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',

        ]);
        $student = Student::findOrFail($id);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('students','public');
            $validateData['photo'] = $path;
        }


        $student->update($validateData);
        return redirect()->route('Notes.index')->with('success' , 'Edited sucessfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('Notes.index')->with('success' , 'Deleted successfily !');
    }
}
