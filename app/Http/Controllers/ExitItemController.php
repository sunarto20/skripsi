<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Transaction_detail;
use App\Unit;
use Illuminate\Http\Request;

class ExitItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exits = Unit::with(['transaction', 'transaction_detail', 'item', 'room'])->whereHas('transaction_detail', function ($q) {
            $q->where('status', 'exit')->limit(1);
        })->get();
        // return $exits;
        return view('exit.index', ['exits' => $exits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::with(['item', 'room', 'transaction', 'transaction_detail'])->whereDoesntHave('transaction_detail', function ($q) {
            $q->where('returned_at', null);
        })->whereDoesntHave('transaction_detail', function ($query) {
            $query->where('status', 'exit');
        })->get();
        return view('exit.add', ['units' => $units]);
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
            'number_unit' => 'required',
            'notes' => 'required'
        ]);

        $transaction = Transaction::create([
            'unit_id' => $request->number_unit,
        ]);

        Transaction_detail::create([
            'transaction_id' => $transaction->id,
            'status' => 'exit',
            'notes' => $request->notes
        ]);

        return redirect()->route('exit.index')->with('status', 'Barang Berhasil Di Keluarkan');
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
