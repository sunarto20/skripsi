<?php

namespace App\Http\Controllers;

use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportItemIndex()
    {
        return view('report.itemindex');
    }

    public function reportItem(Request $request)
    {
        $item = new Item;
        $item = $item->with(['unit', 'unit.room']);
        $date = $request->date;

        if ($date) {
            $range = explode('-', $date);
            $start = Carbon::parse($range[0]);
            $end = Carbon::parse($range[1])->endOfDay();

            $item = $item->whereBetween('created_at', [$start, $end]);
        }

        $item = $item->get();
        // return $item;
        // return response()->json($item);
        return view('tes', ['item' => $item]);
    }
}
