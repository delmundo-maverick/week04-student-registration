<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Student Registration System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="max-w-6xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Student Registration System
        </h1>

        <a
            href="{{ route('students.create') }}"
            class="bg-blue-600 text-white px-5 py-3 rounded-lg"
        >
            Register Student
        </a>

    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3 text-left">
                        Student ID
                    </th>

                    <th class="p-3 text-left">
                        Name
                    </th>

                    <th class="p-3 text-left">
                        Program
                    </th>

                    <th class="p-3 text-left">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($students as $student)

                    <tr class="border-t">

                        <td class="p-3">
                            {{ $student->student_id }}
                        </td>

                        <td class="p-3">
                            {{ $student->first_name }}
                            {{ $student->last_name }}
                        </td>

                        <td class="p-3">
                            {{ $student->program }}
                        </td>

                        <td class="p-3">

                            <a
                                href="{{ route('students.show', $student) }}"
                                class="text-blue-600"
                            >
                                View
                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="4"
                            class="p-6 text-center"
                        >
                            No students registered yet.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>

</html>
