<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|unique:students,student_id',

            'first_name' => 'required|string|max:100',

            'middle_name' => 'nullable|string|max:100',

            'last_name' => 'required|string|max:100',

            'email' => 'required|email|unique:students,email',

            'mobile_number' => 'required|numeric',

            'date_of_birth' => 'required|date',

            'gender' => 'required',

            'program' => 'required',

            'year_level' => 'required',

            'address' => 'required|string',

            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    }
}
