<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function indexStudent()
    {
        $students = Student::with(['user', 'class'])->get();

        return response()->json($students);
    }
}
