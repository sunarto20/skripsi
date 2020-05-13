<?php

namespace App\Http\Controllers;

use App\Student;
use App\Transaction;
use App\Unit;
use Illuminate\Http\Request;

class BorrowController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = Transaction::where('status', 'pinjam')->with(['student', 'unit', 'unit.item', 'student.class'])->get();
        // return $borrows;
        return view('borrow.index', [
            'borrows' => $borrows
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::with(['item', 'room'])->get();
        $students = Student::with(['class'])->get();
        return view('borrow.add', [
            'units' => $units,
            'students' => $students
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
        $request->validate([
            'registration_number' => 'required',
            'number_unit' => 'required'
        ]);

        Transaction::create([
            'unit_id' => $request->number_unit,
            'status' => 'pinjam',
            'reciever' => $request->registration_number
        ]);

        return redirect()->route('borrow.index')->with('status', 'Data Peminjaman Berhasil di Tambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
