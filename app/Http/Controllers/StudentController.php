<?php

namespace App\Http\Controllers;

use App\Classes;
use \App\Student;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with(['user', 'class'])->get();
        // dd($students);
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::get();

        return view('student.add', [
            'classes' => $classes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // Check Validate Field Students
        $request->validate([
            'name' => 'required|min:3|max:255',
            'registration_number' => 'required|unique:students|min:3|numeric',
            'class' => 'required',
            'gender' => 'required',
            'phoneNumber' => 'required|min:3|max:255'
        ]);
        return $request;
        // Insert to table Users
        $user = User::create([
            'name' => $request->name,
            'username' => $request->registration_number,
            'password' => bcrypt($request->registration_number),
            'role' => "siswa",
        ]);

        // return $user;

        // Inser to table Students

        Student::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'registration_number' => $user->username,
            'gender' => $request->gender,
            'phone_number' => $request->phoneNumber,
            'class_id' => $request->class
        ]);

        return redirect('student.index')->with('status', 'Data Siswa Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::with(['user', 'class'])->where('id', $id)->get();
        // $student = response()->json($student);
        return view('student.detail', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
