```blade
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Profile</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-gray-50 to-indigo-50 py-10 px-4">

    <div class="max-w-5xl mx-auto">

        {{-- Success Message --}}
        @if (session('success'))
            <div
                class="mb-6 flex items-center gap-3
                   bg-green-50 border border-green-200
                   text-green-700 px-5 py-4 rounded-xl
                   shadow-sm">

                <div
                    class="w-9 h-9 bg-green-100 rounded-lg
                        flex items-center justify-center shrink-0">

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>

                </div>

                <div>
                    <p class="font-semibold">
                        Success
                    </p>

                    <p class="text-sm">
                        {{ session('success') }}
                    </p>
                </div>

            </div>
        @endif


        {{-- Back Button --}}
        <div class="mb-5">

            <a href="{{ route('students.index') }}"
                class="inline-flex items-center gap-2
                   text-gray-600 hover:text-blue-600
                   font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>

                Back to Students

            </a>

        </div>


        {{-- Main Profile Card --}}
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

            {{-- Profile Header --}}
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600
                    px-6 md:px-10 py-10">

                <div
                    class="flex flex-col md:flex-row
                        items-center md:items-center
                        gap-6">

                    {{-- Profile Picture --}}
                    <div class="shrink-0">

                        @if ($student->profile_picture)
                            <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="Student Profile Picture"
                                class="w-32 h-32 md:w-36 md:h-36
                                   rounded-2xl object-cover
                                   border-4 border-white/80
                                   shadow-xl">
                        @else
                            <div
                                class="w-32 h-32 md:w-36 md:h-36
                                   rounded-2xl
                                   bg-white/20
                                   border-4 border-white/60
                                   flex items-center justify-center
                                   text-white text-4xl font-bold
                                   shadow-xl">

                                {{ strtoupper(substr($student->first_name, 0, 1)) }}{{ strtoupper(substr($student->last_name, 0, 1)) }}

                            </div>
                        @endif

                    </div>


                    {{-- Student Name --}}
                    <div class="text-center md:text-left text-white">

                        <p class="text-blue-100 text-sm font-medium mb-1">
                            Student Profile
                        </p>

                        <h1 class="text-3xl md:text-4xl font-bold">

                            {{ $student->first_name }}
                            {{ $student->middle_name ? $student->middle_name . ' ' : '' }}
                            {{ $student->last_name }}

                        </h1>


                        <div
                            class="flex flex-wrap justify-center
                                md:justify-start gap-2 mt-4">

                            <span
                                class="inline-flex items-center gap-2
                                   bg-white/15 border border-white/20
                                   px-3 py-1.5 rounded-lg
                                   text-sm font-medium">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h9a2 2 0 002-2v-5m4-6l-8 8-4-4" />
                                </svg>

                                {{ $student->student_id }}

                            </span>


                            <span
                                class="inline-flex items-center
                                   bg-white/15 border border-white/20
                                   px-3 py-1.5 rounded-lg
                                   text-sm font-medium">
                                {{ $student->program }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Personal Information --}}
            <div class="p-6 md:p-10 border-b border-gray-100">

                <div class="flex items-center gap-3 mb-6">

                    <div
                        class="w-10 h-10
                           bg-blue-100 text-blue-600
                           rounded-xl
                           flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>

                    </div>

                    <div>

                        <h2 class="text-lg font-semibold text-gray-900">
                            Personal Information
                        </h2>

                        <p class="text-sm text-gray-500">
                            Basic information about the student.
                        </p>

                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    {{-- Email --}}
                    <div class="bg-gray-50 rounded-xl p-4">

                        <p
                            class="text-xs font-semibold
                              text-gray-400 uppercase tracking-wide mb-1">
                            Email Address
                        </p>

                        <p class="text-gray-900 font-medium break-all">
                            {{ $student->email }}
                        </p>

                    </div>


                    {{-- Mobile --}}
                    <div class="bg-gray-50 rounded-xl p-4">

                        <p
                            class="text-xs font-semibold
                              text-gray-400 uppercase tracking-wide mb-1">
                            Mobile Number
                        </p>

                        <p class="text-gray-900 font-medium">
                            {{ $student->mobile_number }}
                        </p>

                    </div>


                    {{-- Date of Birth --}}
                    <div class="bg-gray-50 rounded-xl p-4">

                        <p
                            class="text-xs font-semibold
                              text-gray-400 uppercase tracking-wide mb-1">
                            Date of Birth
                        </p>

                        <p class="text-gray-900 font-medium">
                            {{ \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y') }}
                        </p>

                    </div>


                    {{-- Gender --}}
                    <div class="bg-gray-50 rounded-xl p-4">

                        <p
                            class="text-xs font-semibold
                              text-gray-400 uppercase tracking-wide mb-1">
                            Gender
                        </p>

                        <p class="text-gray-900 font-medium">
                            {{ $student->gender }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Academic Information --}}
            <div class="p-6 md:p-10 border-b border-gray-100">

                <div class="flex items-center gap-3 mb-6">

                    <div
                        class="w-10 h-10
                           bg-indigo-100 text-indigo-600
                           rounded-xl
                           flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5z" />

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l6.16-3.422A12.083 12.083 0 0118 15.5c0 1.933-2.686 3.5-6 3.5s-6-1.567-6-3.5c0-.982.317-1.876.84-2.922L12 14z" />
                        </svg>

                    </div>

                    <div>

                        <h2 class="text-lg font-semibold text-gray-900">
                            Academic Information
                        </h2>

                        <p class="text-sm text-gray-500">
                            Current academic details of the student.
                        </p>

                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    {{-- Program --}}
                    <div class="bg-blue-50 rounded-xl p-5">

                        <p
                            class="text-xs font-semibold
                              text-blue-500 uppercase tracking-wide mb-2">
                            Program
                        </p>

                        <p class="text-lg font-bold text-blue-700">
                            {{ $student->program }}
                        </p>

                    </div>


                    {{-- Year Level --}}
                    <div class="bg-indigo-50 rounded-xl p-5">

                        <p
                            class="text-xs font-semibold
                              text-indigo-500 uppercase tracking-wide mb-2">
                            Year Level
                        </p>

                        <p class="text-lg font-bold text-indigo-700">
                            {{ $student->year_level }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Address --}}
            <div class="p-6 md:p-10">

                <div class="flex items-center gap-3 mb-6">

                    <div
                        class="w-10 h-10
                           bg-green-100 text-green-600
                           rounded-xl
                           flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 21a2 2 0 01-2.828 0l-4.243-4.343a8 8 0 1111.314 0z" />

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>

                    </div>

                    <div>

                        <h2 class="text-lg font-semibold text-gray-900">
                            Address
                        </h2>

                        <p class="text-sm text-gray-500">
                            Registered residential address.
                        </p>

                    </div>

                </div>


                <div class="bg-gray-50 rounded-xl p-5">

                    <p class="text-gray-700 leading-relaxed">
                        {{ $student->address }}
                    </p>

                </div>

            </div>


            {{-- Bottom Actions --}}
            <div class="bg-gray-50 border-t border-gray-100
                    px-6 md:px-10 py-5">

                <div
                    class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between gap-4">

                    <p class="text-sm text-gray-500">
                        Student ID:
                        <span class="font-semibold text-gray-700">
                            {{ $student->student_id }}
                        </span>
                    </p>


                    <a href="{{ route('students.index') }}"
                        class="inline-flex items-center justify-center gap-2
                           bg-blue-600 hover:bg-blue-700
                           text-white font-semibold
                           px-5 py-2.5 rounded-xl
                           shadow-sm hover:shadow-md
                           transition">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>

                        Back to Student List

                    </a>

                </div>

            </div>

        </div>


        {{-- Footer --}}
        <p class="text-center text-sm text-gray-400 mt-6">
            Student Registration System
        </p>

    </div>

</body>

</html>
```
