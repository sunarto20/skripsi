<?php

namespace App\Http\Controllers;

use App\Student;
use App\Transaction;
use App\Transaction_detail;
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
        $borrows = Transaction::with(['transaction_detail', 'unit', 'student', 'student.class', 'unit.item'])->whereDoesntHave('transaction_detail', function ($q) {
            $q->where('status', 'exit');
        })->get();
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
        $units = Unit::with(['item', 'room', 'transaction', 'transaction_detail'])
            ->whereDoesntHave('transaction_detail', function ($q) {
                $q->where('returned_at', null);
            })->whereDoesntHave('transaction_detail', function ($query) {
                $query->where('status', 'exit');
            })->get();

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

        $transaction = Transaction::create([
            'unit_id' => $request->number_unit,
            'reciever' => $request->registration_number
        ]);

        Transaction_detail::create([
            'transaction_id' => $transaction->id,
            'status' => 'pinjam'
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


    public function tes()
    {
        $transaction = Transaction::create([
            'unit_id' => 8,

        ]);

        Transaction_detail::create([
            'transaction_id' => $transaction->id,
            'status' => 'exit'
        ]);
    }
}
