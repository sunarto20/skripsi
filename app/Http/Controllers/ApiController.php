<?php

namespace App\Http\Controllers;

use App\Student;
use App\Unit;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getStudent()
    {
        $students = Student::with(['user', 'class'])->get();

        return response()->json($students);
    }

    public function getUnit()
    {
        $units = Unit::with(['item', 'room'])->get();

        return response()->json($units);
    }
}
