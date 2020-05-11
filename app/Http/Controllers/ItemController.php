<?php

namespace App\Http\Controllers;

use App\Item;
use App\Room;
use App\Unit;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Item::get();
        $items = Item::withCount('unit')->get();

        // return $items;
        return view('item.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::get();
        return view('item.add', [
            'rooms' => $rooms
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
            'number_unit' => 'required|unique:units,number_unit',
            'name' => 'required|min:3',
            'spesification' => 'required',
            'amount' => 'required',
            'room' => 'required'
        ]);

        // return $request;

        $item = Item::create([
            'name' => $request->name,
            'spesification' => $request->spesification,
            'foto' => 'ini foto'
        ]);

        //ini kenapa di looping mas?

        // itu kan buat nambahin nomor_unit, jadi walau itemnya sama tapi nomer unitnya berbeda makanya di looping
        for ($i = 0; $i < $request->amount; $i++) {
            $number = $request->number_unit + $i;

            $unit = Unit::create([
                'number_unit' => $number,
                'room_id' => $request->room,
                'item_id' => $item->id
            ]);
        };


        return Unit::with(['item', 'room'])->get();
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
