<?php

namespace App\Http\Controllers;

use App\Student;
use App\Unit;

class ApiController extends Controller
{
    public function getStudent($nisn)
    {

        $students = Student::with(['user', 'class'])->find($nisn);

        return response()->json($students);
    }

    public function getUnit($numberUnit)
    {
        $units = Unit::with(['item', 'room'])->find($numberUnit);

        return response()->json($units);
    }
}
