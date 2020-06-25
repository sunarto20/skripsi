<?php

namespace App\Http\Controllers;



use App\Item;
use App\Transaction_detail;
use App\Unit;
use  Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
            $item = $item->whereBetween('recieve_date', [$start, $end]);
        }

        $item = $item->get();

        // return $item;
        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isPhpEnabled' => true])->loadView('report.item', ['item' => $item, 'start' => $start, 'end' => $end])->setPaper('A4', 'landscape');

        return $pdf->stream();

        // return $item;
        // return response()->json($item);

        // $html2pdf = new Html2Pdf('P', 'A4', 'en');
        // $html2pdf->writeHTML(view('tes', ['item' => $item]));
        // $html2pdf->output();
    }

    public function reportExitIndex()
    {
        return view('report.exitindex');
    }

    public function reportExit(Request $request)
    {

        $exits = new Transaction_detail();
        $exits = $exits->with(['transaction', 'transaction.unit', 'transaction.unit.item'])->where('status', 'exit');
        $date = $request->date;
        $start = null;
        $end = null;
        if ($date) {
            $range = explode('-', $date);
            $start = Carbon::parse($range[0]);
            $end = Carbon::parse($range[1])->endOfDay();
            // return $start;
            $exits = $exits->whereBetween('created_at', [$start, $end]);
        }

        $exits = $exits->get();

        // return $exits;
        // return view('report.exit', [
        //     'exits' => $exits, 'start' => $start, 'end' => $end
        // ]);
        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isPhpEnabled' => true])->loadView('report.exit', ['exits' => $exits, 'start' => $start, 'end' => $end])->setPaper('A4', 'landscape');

        return $pdf->stream();
    }

    public function reportBorrowIndex()
    {
        return view('report.borrowindex');
    }

    public function reportBorrow(Request $request)
    {
        $borrows = new Transaction_detail();
        $borrows = $borrows->with(['transaction', 'transaction.unit', 'transaction.unit.item', 'transaction.student', 'transaction.student.class'])->where('status', 'pinjam');
        $date = $request->date;
        $start = null;
        $end = null;
        if ($date) {
            $range = explode('-', $date);
            $start = Carbon::parse($range[0]);
            $end = Carbon::parse($range[1])->endOfDay();
            // return $start;
            $borrows = $borrows->whereBetween('created_at', [$start, $end]);
        }

        $borrows = $borrows->get();

        // return $borrows;
        // return view('report.exit', [
        //     'borrows' => $borrows, 'start' => $start, 'end' => $end
        // ]);
        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'isPhpEnabled' => true
        ])->loadView('report.borrow', [
            'borrows' => $borrows,
            'start' => $start,
            'end' => $end
        ])->setPaper('A4', 'landscape');

        return $pdf->stream();
    }
}
