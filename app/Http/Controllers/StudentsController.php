<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        return view('students/index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //Cara 1
    //    $student = new Student;
    //    $student->nama = $request->nama;
    //    $student->nim = $request->nim;
    //    $student->email = $request->email;
    //    $student->jurusan = $request->jurusan;
    //    $student->save();

        //Cara 2
    //  Student::create([
    //      'nama'=>$request->nama,
    //      'nim'=>$request->nim,
    //      'email'=>$request->email,
    //      'jurusan'=>$request->jurusan

    //  ]);
    
    $request->validate([
        'nama'=>'required',
        'nim'=>'required|size:10',

    ]);

        Student::create($request->all());
        return redirect('/students')->with('status','Data Mahasiswa Berhasil Ditambahkan');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //menampilkan 1 data
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}