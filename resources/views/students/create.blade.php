```blade
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-gray-50 to-indigo-50 py-10 px-4">

    <div class="max-w-5xl mx-auto">

        {{-- Page Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 bg-blue-600 rounded-2xl shadow-lg mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>

            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                Student Registration
            </h1>

            <p class="mt-2 text-gray-500">
                Fill in the information below to register a new student.
            </p>
        </div>


        {{-- Registration Card --}}
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

            @csrf

            {{-- Personal Information --}}
            <div class="p-6 md:p-8 border-b border-gray-100">

                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9 9 0 1118.879 6.196 9 9 0 015.121 17.804z" />
                        </svg>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">
                            Personal Information
                        </h2>

                        <p class="text-sm text-gray-500">
                            Enter the student's basic information.
                        </p>
                    </div>
                </div>


                {{-- Student ID --}}
                <div class="mb-5">
                    <label for="student_id" class="block text-sm font-semibold text-gray-700 mb-2">
                        Student ID <span class="text-red-500">*</span>
                    </label>

                    <input id="student_id" type="text" name="student_id" value="{{ old('student_id') }}"
                        placeholder="Enter student ID"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300
                               bg-gray-50 text-gray-900
                               focus:bg-white focus:ring-2 focus:ring-blue-500
                               focus:border-blue-500 outline-none transition">

                    @error('student_id')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                {{-- Name --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <div>
                        <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            First Name <span class="text-red-500">*</span>
                        </label>

                        <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}"
                            placeholder="First name"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                                   bg-gray-50 text-gray-900
                                   focus:bg-white focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500 outline-none transition">

                        @error('first_name')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label for="middle_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Middle Name
                        </label>

                        <input id="middle_name" type="text" name="middle_name" value="{{ old('middle_name') }}"
                            placeholder="Middle name"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                                   bg-gray-50 text-gray-900
                                   focus:bg-white focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500 outline-none transition">

                        @error('middle_name')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Last Name <span class="text-red-500">*</span>
                        </label>

                        <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}"
                            placeholder="Last name"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                                   bg-gray-50 text-gray-900
                                   focus:bg-white focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500 outline-none transition">

                        @error('last_name')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>


                {{-- Contact Information --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email Address <span class="text-red-500">*</span>
                        </label>

                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            placeholder="student@example.com"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                                   bg-gray-50 text-gray-900
                                   focus:bg-white focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500 outline-none transition">

                        @error('email')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label for="mobile_number" class="block text-sm font-semibold text-gray-700 mb-2">
                            Mobile Number <span class="text-red-500">*</span>
                        </label>

                        <input id="mobile_number" type="text" name="mobile_number"
                            value="{{ old('mobile_number') }}" placeholder="09XXXXXXXXX"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                                   bg-gray-50 text-gray-900
                                   focus:bg-white focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500 outline-none transition">

                        @error('mobile_number')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>


                {{-- Birth Date & Gender --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">

                    <div>
                        <label for="date_of_birth" class="block text-sm font-semibold text-gray-700 mb-2">
                            Date of Birth <span class="text-red-500">*</span>
                        </label>

                        <input id="date_of_birth" type="date" name="date_of_birth"
                            value="{{ old('date_of_birth') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                                   bg-gray-50 text-gray-900
                                   focus:bg-white focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500 outline-none transition">

                        @error('date_of_birth')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Gender <span class="text-red-500">*</span>
                        </label>

                        <div class="grid grid-cols-2 gap-3">

                            <label class="cursor-pointer">
                                <input type="radio" name="gender" value="Male" class="peer sr-only"
                                    {{ old('gender') == 'Male' ? 'checked' : '' }}>

                                <div
                                    class="flex items-center justify-center gap-2 px-4 py-3
                                            rounded-xl border border-gray-300
                                            bg-gray-50 text-gray-700
                                            peer-checked:border-blue-500
                                            peer-checked:bg-blue-50
                                            peer-checked:text-blue-600
                                            transition">
                                    <span>Male</span>
                                </div>
                            </label>


                            <label class="cursor-pointer">
                                <input type="radio" name="gender" value="Female" class="peer sr-only"
                                    {{ old('gender') == 'Female' ? 'checked' : '' }}>

                                <div
                                    class="flex items-center justify-center gap-2 px-4 py-3
                                            rounded-xl border border-gray-300
                                            bg-gray-50 text-gray-700
                                            peer-checked:border-blue-500
                                            peer-checked:bg-blue-50
                                            peer-checked:text-blue-600
                                            transition">
                                    <span>Female</span>
                                </div>
                            </label>

                        </div>

                        @error('gender')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

            </div>


            {{-- Academic Information --}}
            <div class="p-6 md:p-8 border-b border-gray-100">

                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center">
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
                            Provide the student's program and year level.
                        </p>
                    </div>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- Program --}}
                    <div>
                        <label for="program" class="block text-sm font-semibold text-gray-700 mb-2">
                            Program <span class="text-red-500">*</span>
                        </label>

                        <select id="program" name="program"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                                   bg-gray-50 text-gray-900
                                   focus:bg-white focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500 outline-none transition">
                            <option value="">Select Program</option>

                            <option value="BSIT" {{ old('program') == 'BSIT' ? 'selected' : '' }}>
                                BS Information Technology
                            </option>

                            <option value="BSCS" {{ old('program') == 'BSCS' ? 'selected' : '' }}>
                                BS Computer Science
                            </option>

                            <option value="BSIS" {{ old('program') == 'BSIS' ? 'selected' : '' }}>
                                BS Information Systems
                            </option>
                        </select>

                        @error('program')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    {{-- Year Level --}}
                    <div>
                        <label for="year_level" class="block text-sm font-semibold text-gray-700 mb-2">
                            Year Level <span class="text-red-500">*</span>
                        </label>

                        <select id="year_level" name="year_level"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300
                                   bg-gray-50 text-gray-900
                                   focus:bg-white focus:ring-2 focus:ring-blue-500
                                   focus:border-blue-500 outline-none transition">
                            <option value="">Select Year Level</option>

                            <option value="1st Year" {{ old('year_level') == '1st Year' ? 'selected' : '' }}>
                                1st Year
                            </option>

                            <option value="2nd Year" {{ old('year_level') == '2nd Year' ? 'selected' : '' }}>
                                2nd Year
                            </option>

                            <option value="3rd Year" {{ old('year_level') == '3rd Year' ? 'selected' : '' }}>
                                3rd Year
                            </option>

                            <option value="4th Year" {{ old('year_level') == '4th Year' ? 'selected' : '' }}>
                                4th Year
                            </option>
                        </select>

                        @error('year_level')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

            </div>


            {{-- Address & Profile Picture --}}
            <div class="p-6 md:p-8">

                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-green-100 text-green-600 rounded-xl flex items-center justify-center">
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
                            Additional Information
                        </h2>

                        <p class="text-sm text-gray-500">
                            Add the student's address and profile picture.
                        </p>
                    </div>
                </div>


                {{-- Address --}}
                <div class="mb-5">

                    <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
                        Address <span class="text-red-500">*</span>
                    </label>

                    <textarea id="address" name="address" rows="4" placeholder="Enter complete address"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300
                               bg-gray-50 text-gray-900 resize-none
                               focus:bg-white focus:ring-2 focus:ring-blue-500
                               focus:border-blue-500 outline-none transition">{{ old('address') }}</textarea>

                    @error('address')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Profile Picture --}}
                <div>

                    <label for="profile_picture" class="block text-sm font-semibold text-gray-700 mb-2">
                        Profile Picture
                    </label>

                    <div
                        class="border-2 border-dashed border-gray-300 rounded-xl p-6
                                bg-gray-50 hover:bg-blue-50 hover:border-blue-400
                                transition">

                        <div class="text-center">

                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto w-10 h-10 text-gray-400 mb-3"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-10v4m0 0l-2-2m2 2l2-2" />
                            </svg>

                            <label for="profile_picture"
                                class="cursor-pointer text-blue-600 font-semibold hover:text-blue-700">
                                Choose a file
                            </label>

                            <span class="text-gray-500">
                                or upload it here
                            </span>

                            <p class="text-xs text-gray-400 mt-2">
                                JPG, JPEG, or PNG
                            </p>

                            <input id="profile_picture" type="file" name="profile_picture"
                                accept=".jpg,.jpeg,.png" class="hidden">

                        </div>

                    </div>

                    @error('profile_picture')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>


            {{-- Footer / Submit --}}
            <div class="bg-gray-50 px-6 md:px-8 py-6 border-t border-gray-100">

                <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-4">

                    <p class="text-sm text-gray-500">
                        <span class="text-red-500">*</span>
                        Required fields
                    </p>

                    <button type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center
                               gap-2 bg-blue-600 hover:bg-blue-700
                               text-white font-semibold
                               px-7 py-3 rounded-xl
                               shadow-md hover:shadow-lg
                               transition duration-200
                               focus:outline-none focus:ring-2
                               focus:ring-blue-500 focus:ring-offset-2">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>

                        Register Student

                    </button>

                </div>

            </div>

        </form>

        <p class="text-center text-sm text-gray-400 mt-6">
            Student Registration System
        </p>

    </div>

</body>

</html>
```
