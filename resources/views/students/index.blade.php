```blade
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-gray-50 to-indigo-50 py-10 px-4">

    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                <div class="flex items-center gap-4">

                    <div
                        class="w-12 h-12 bg-blue-600 rounded-xl shadow-md
                            flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 14l6.16-3.422A12.083 12.083 0 0118 15.5c0 1.933-2.686 3.5-6 3.5s-6-1.567-6-3.5c0-.982.317-1.876.84-2.922L12 14z" />
                        </svg>

                    </div>

                    <div>

                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
                            Student Registration System
                        </h1>

                        <p class="text-sm text-gray-500 mt-1">
                            Manage and view registered students
                        </p>

                    </div>

                </div>


                {{-- Register Button --}}
                <a href="{{ route('students.create') }}"
                    class="inline-flex items-center justify-center gap-2
                       bg-blue-600 hover:bg-blue-700
                       text-white font-semibold
                       px-5 py-3 rounded-xl
                       shadow-md hover:shadow-lg
                       transition duration-200
                       focus:outline-none focus:ring-2
                       focus:ring-blue-500 focus:ring-offset-2">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>

                    Register Student

                </a>

            </div>

        </div>


        {{-- Student List Card --}}
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

            {{-- Card Header --}}
            <div class="px-6 md:px-8 py-6 border-b border-gray-100">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div>

                        <h2 class="text-lg font-semibold text-gray-900">
                            Registered Students
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            List of students currently registered in the system.
                        </p>

                    </div>


                    {{-- Student Count --}}
                    <div
                        class="inline-flex items-center gap-2
                            bg-blue-50 text-blue-700
                            px-4 py-2 rounded-xl
                            text-sm font-semibold w-fit">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8zm6 0a3 3 0 100-6 3 3 0 000 6z" />
                        </svg>

                        {{ $students->count() }}
                        {{ $students->count() == 1 ? 'Student' : 'Students' }}

                    </div>

                </div>

            </div>


            {{-- Table --}}
            <div class="overflow-x-auto">

                <table class="w-full min-w-[700px]">

                    <thead>

                        <tr class="bg-gray-50 border-b border-gray-200">

                            <th
                                class="px-6 py-4 text-left text-xs font-semibold
                                   text-gray-500 uppercase tracking-wider">
                                Student
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs font-semibold
                                   text-gray-500 uppercase tracking-wider">
                                Student ID
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs font-semibold
                                   text-gray-500 uppercase tracking-wider">
                                Program
                            </th>

                            <th
                                class="px-6 py-4 text-right text-xs font-semibold
                                   text-gray-500 uppercase tracking-wider">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @forelse($students as $student)
                            <tr class="hover:bg-blue-50/50 transition duration-150">

                                {{-- Student --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        {{-- Avatar --}}
                                        <div
                                            class="w-11 h-11 rounded-xl
                                                bg-blue-100 text-blue-600
                                                flex items-center justify-center
                                                font-bold">

                                            {{ strtoupper(substr($student->first_name, 0, 1)) }}{{ strtoupper(substr($student->last_name, 0, 1)) }}

                                        </div>


                                        <div>

                                            <p class="font-semibold text-gray-900">

                                                {{ $student->first_name }}
                                                {{ $student->middle_name ? $student->middle_name . ' ' : '' }}
                                                {{ $student->last_name }}

                                            </p>

                                            <p class="text-sm text-gray-500">
                                                {{ $student->email }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- Student ID --}}
                                <td class="px-6 py-4">

                                    <span
                                        class="inline-flex items-center
                                             bg-gray-100 text-gray-700
                                             px-3 py-1.5 rounded-lg
                                             text-sm font-medium">

                                        {{ $student->student_id }}

                                    </span>

                                </td>


                                {{-- Program --}}
                                <td class="px-6 py-4">

                                    @if ($student->program === 'BSIT')
                                        <span
                                            class="inline-flex items-center
                                                 bg-blue-50 text-blue-700
                                                 px-3 py-1.5 rounded-lg
                                                 text-sm font-semibold">
                                            BSIT
                                        </span>
                                    @elseif($student->program === 'BSCS')
                                        <span
                                            class="inline-flex items-center
                                                 bg-indigo-50 text-indigo-700
                                                 px-3 py-1.5 rounded-lg
                                                 text-sm font-semibold">
                                            BSCS
                                        </span>
                                    @elseif($student->program === 'BSIS')
                                        <span
                                            class="inline-flex items-center
                                                 bg-purple-50 text-purple-700
                                                 px-3 py-1.5 rounded-lg
                                                 text-sm font-semibold">
                                            BSIS
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center
                                                 bg-gray-100 text-gray-700
                                                 px-3 py-1.5 rounded-lg
                                                 text-sm font-semibold">
                                            {{ $student->program }}
                                        </span>
                                    @endif

                                </td>


                                {{-- Action --}}
                                <td class="px-6 py-4 text-right">

                                    <a href="{{ route('students.show', $student) }}"
                                        class="inline-flex items-center gap-2
                                           text-blue-600 hover:text-blue-700
                                           bg-blue-50 hover:bg-blue-100
                                           font-semibold text-sm
                                           px-4 py-2 rounded-lg
                                           transition">

                                        View Details

                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>

                                    </a>

                                </td>

                            </tr>

                        @empty

                            {{-- Empty State --}}
                            <tr>

                                <td colspan="4" class="px-6 py-16 text-center">

                                    <div class="flex flex-col items-center">

                                        <div
                                            class="w-16 h-16
                                                bg-blue-50 text-blue-500
                                                rounded-2xl
                                                flex items-center justify-center
                                                mb-4">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8zm6 0a3 3 0 100-6 3 3 0 000 6z" />
                                            </svg>

                                        </div>


                                        <h3 class="text-lg font-semibold text-gray-900">
                                            No students registered
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-1 mb-5">
                                            Get started by registering your first student.
                                        </p>


                                        <a href="{{ route('students.create') }}"
                                            class="inline-flex items-center gap-2
                                               bg-blue-600 hover:bg-blue-700
                                               text-white font-semibold
                                               px-5 py-2.5 rounded-xl
                                               transition">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4v16m8-8H4" />
                                            </svg>

                                            Register Student

                                        </a>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Bottom Note --}}
            @if ($students->count() > 0)
                <div class="px-6 md:px-8 py-4 bg-gray-50 border-t border-gray-100">

                    <p class="text-sm text-gray-500">
                        Showing
                        <span class="font-semibold text-gray-700">
                            {{ $students->count() }}
                        </span>
                        registered
                        {{ $students->count() == 1 ? 'student' : 'students' }}.
                    </p>

                </div>
            @endif

        </div>


        {{-- Footer --}}
        <p class="text-center text-sm text-gray-400 mt-6">
            Student Registration System
        </p>

    </div>

</body>

</html>
```
