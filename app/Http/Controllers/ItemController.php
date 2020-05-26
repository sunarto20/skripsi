<?php

namespace App\Http\Controllers;

use App\Item;
use App\Room;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'room' => 'required',
            'avatar' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $fotoItem = '';
        if ($request->file('foto')) {
            $fotoItem = $request->file('foto')->store('items');
        }

        // return $request;

        $item = Item::create([
            'name' => $request->name,
            'spesification' => $request->spesification,
            'foto' => $fotoItem
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


        return redirect()->route('item.index')->with('status', 'Barang Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $item = Item::where('id', $id)->with(['unit', 'unit.room'])->first();

        // return $item;


        return view('item.detail', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::where('id', $id)->first();
        // return $item;
        return view('item.edit', ['item' => $item]);
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
        $request->validate([

            'name' => 'required|min:3',
            'spesification' => 'required',

        ]);

        // dd($request->file('foto'));

        $item = $this->getItemById($id);
        $fotoItem = $item->foto;

        if ($request->file('foto') != null) {
            Storage::delete($item->foto);
            $fotoItem = $request->file('foto')->store('items');
        }

        Item::where('id', $id)->update([
            'name' => $request->name,
            'spesification' => $request->spesification,
            'foto' => $fotoItem
        ]);
        return redirect()->route('item.index')->with('status', 'Barang Berhasil di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::findOrFail($id)->delete();
    }

    public function changeroom($id)
    {
        $unit = Unit::where('id', $id)->with(['item', 'room'])->first();
        $rooms = Room::get();
        return view('item.change', [
            'unit' => $unit,
            'rooms' => $rooms
        ]);

        // return $unit;
    }

    public function changeupdate(Request $request, $id)
    {
        $request->validate([
            'room' => 'required'
        ]);

        // $idurl = $this->changeroom($id);

        // echo  $this->changeroom($id);

        Unit::where('id', $id)->update([
            'room_id' => $request->room
        ]);

        return redirect()->route('item.index')->with('status', 'Data Berhasil di Update!');
    }

    public function getItemById($id)
    {
        return Item::where('id', $id)->first();
    }
}
