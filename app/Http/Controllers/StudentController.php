<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of all registered students.
     */
    public function index()
    {
        $students = Student::latest()->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Validate and store a new student registration.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id'      => 'required|unique:students,student_id',
            'first_name'      => 'required|string|max:100',
            'middle_name'     => 'nullable|string|max:100',
            'last_name'       => 'required|string|max:100',
            'email'           => 'required|email|unique:students,email',
            'mobile_number'   => 'required|numeric',
            'date_of_birth'   => 'required|date',
            'gender'          => 'required',
            'program'         => 'required',
            'year_level'      => 'required',
            'address'         => 'required|string',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profilePicturePath = $request
            ->file('profile_picture')
            ->store('profile_pictures', 'public');

        $student = Student::create([
            'student_id'      => $validated['student_id'],
            'first_name'      => $validated['first_name'],
            'middle_name'     => $validated['middle_name'] ?? null,
            'last_name'       => $validated['last_name'],
            'email'           => $validated['email'],
            'mobile_number'   => $validated['mobile_number'],
            'date_of_birth'   => $validated['date_of_birth'],
            'gender'          => $validated['gender'],
            'program'         => $validated['program'],
            'year_level'      => $validated['year_level'],
            'address'         => $validated['address'],
            'profile_picture' => $profilePicturePath,
        ]);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Student registered successfully!');
    }

    /**
     * Show a single registered student's profile.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}
