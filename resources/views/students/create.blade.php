<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="max-w-4xl mx-auto p-6">

        <h1 class="text-3xl font-bold mb-6">
            Student Registration
        </h1>

        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow">

            @csrf

            <div class="mb-4">
                <label class="block font-medium">
                    Student ID
                </label>

                <input type="text" name="student_id" value="{{ old('student_id') }}"
                    class="w-full border rounded-lg p-2">

                @error('student_id')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <div>
                        <label class="block font-medium">
                            First Name
                        </label>

                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                            class="w-full border rounded-lg p-2">

                        @error('first_name')
                            <p class="text-red-500 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium">
                            Middle Name
                        </label>

                        <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                            class="w-full border rounded-lg p-2">

                        @error('middle_name')
                            <p class="text-red-500 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium">
                            Last Name
                        </label>

                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                            class="w-full border rounded-lg p-2">

                        @error('last_name')
                            <p class="text-red-500 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                    <div>
                        <label class="block font-medium">
                            Email Address
                        </label>

                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border rounded-lg p-2">

                        @error('email')
                            <p class="text-red-500 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium">
                            Mobile Number
                        </label>

                        <input type="text" name="mobile_number" value="{{ old('mobile_number') }}"
                            class="w-full border rounded-lg p-2">

                        @error('mobile_number')
                            <p class="text-red-500 text-sm">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>

                <div class="mt-4">

                    <label class="block font-medium">
                        Date of Birth
                    </label>

                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                        class="w-full border rounded-lg p-2">

                    @error('date_of_birth')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mt-4">

                    <label class="block font-medium mb-2">
                        Gender
                    </label>

                    <div class="flex gap-6">

                        <label>
                            <input type="radio" name="gender" value="Male"
                                {{ old('gender') == 'Male' ? 'checked' : '' }}>

                            Male
                        </label>

                        <label>
                            <input type="radio" name="gender" value="Female"
                                {{ old('gender') == 'Female' ? 'checked' : '' }}>

                            Female
                        </label>

                    </div>

                    @error('gender')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mt-4">

                    <label class="block font-medium">
                        Program
                    </label>

                    <select name="program" class="w-full border rounded-lg p-2">

                        <option value="">
                            Select Program
                        </option>

                        <option value="BSIT">
                            BS Information Technology
                        </option>

                        <option value="BSCS">
                            BS Computer Science
                        </option>

                        <option value="BSIS">
                            BS Information Systems
                        </option>

                    </select>

                    @error('program')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mt-4">

                    <label class="block font-medium">
                        Year Level
                    </label>

                    <select name="year_level" class="w-full border rounded-lg p-2">

                        <option value="">
                            Select Year Level
                        </option>

                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>

                    </select>

                    @error('year_level')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mt-4">

                    <label class="block font-medium">
                        Address
                    </label>

                    <textarea name="address" rows="3" class="w-full border rounded-lg p-2">{{ old('address') }}</textarea>

                    @error('address')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mt-4">

                    <label class="block font-medium">
                        Profile Picture
                    </label>

                    <input type="file" name="profile_picture" accept=".jpg,.jpeg,.png"
                        class="w-full border rounded-lg p-2">

                    @error('profile_picture')
                        <p class="text-red-500 text-sm">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <div class="mt-6">

                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg">
                        Register Student
                    </button>

                </div>
            </div>

        </form>

    </div>

</body>

</html>
