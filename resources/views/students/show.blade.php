<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Student Profile</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto p-6">

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif

    <div class="bg-white rounded-lg shadow p-6">

        <div class="flex justify-center mb-6">

            <img
                src="{{ asset('storage/' . $student->profile_picture) }}"
                alt="Student Profile Picture"
                class="w-32 h-32 rounded-full object-cover"
            >

        </div>

        <h1 class="text-3xl font-bold text-center mb-6">

            {{ $student->first_name }}
            {{ $student->middle_name }}
            {{ $student->last_name }}

        </h1>

        <div class="space-y-3">

            <p>
                <strong>Student ID:</strong>
                {{ $student->student_id }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $student->email }}
            </p>

            <p>
                <strong>Mobile:</strong>
                {{ $student->mobile_number }}
            </p>

            <p>
                <strong>Date of Birth:</strong>
                {{ $student->date_of_birth }}
            </p>

            <p>
                <strong>Gender:</strong>
                {{ $student->gender }}
            </p>

            <p>
                <strong>Program:</strong>
                {{ $student->program }}
            </p>

            <p>
                <strong>Year Level:</strong>
                {{ $student->year_level }}
            </p>

            <p>
                <strong>Address:</strong>
                {{ $student->address }}
            </p>

        </div>

    </div>

</div>

</body>
</html>
