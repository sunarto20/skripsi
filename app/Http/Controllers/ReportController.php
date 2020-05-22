<?php

namespace App\Http\Controllers;



use App\Item;
use  Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;

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
        $start = null;
        $end = null;
        if ($date) {
            $range = explode('-', $date);
            $start = Carbon::parse($range[0]);
            $end = Carbon::parse($range[1])->endOfDay();
            // return $start;
            $item = $item->whereBetween('created_at', [$start, $end]);
        }

        $item = $item->get();

        // return $item;
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,])->loadView('report.item', ['item' => $item, 'start' => $start, 'end' => $end])->setPaper('A4', 'potrait');
        return $pdf->stream();

        // return $item;
        // return response()->json($item);

        // $html2pdf = new Html2Pdf('P', 'A4', 'en');
        // $html2pdf->writeHTML(view('tes', ['item' => $item]));
        // $html2pdf->output();
    }
}
