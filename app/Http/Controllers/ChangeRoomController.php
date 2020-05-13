<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ChangeRoomController extends Controller
{
    public function index()
    {
        $item = Item::with(['unit', 'unit.room'])->get();
        return $item;
    }
}
