<?php

namespace App\Http\Controllers;

use App\Student;
use App\Transaction;
use App\Transaction_detail;
use App\Unit;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->whereDoesntHave('transaction_detail', function ($query) {
                $query->where('returned_at', null);
                $query->orWhere('status', 'exit');
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
    public function store(Request ...$request)
    {
        $request->validate([
            'registration_number' => 'required',
            'number_unit' => 'required'
        ]);

        try {
            DB::transaction();

            $transaction = Transaction::create([
                'unit_id' => $request->number_unit,
                'reciever' => $request->registration_number
            ]);

            throw new Exception('error');

            Transaction_detail::create([
                'transaction_id' => $transaction->id,
                'status' => 'pinjam'
            ]);
            DB::commit();

            return redirect()->route('borrow.index')->with('status', 'Data Peminjaman Berhasil di Tambah!');
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
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
        try {
            Transaction::findOrFail($id)->delete();
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Trnasactionnya gaada'], 404);

            throw $e;
        }
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
