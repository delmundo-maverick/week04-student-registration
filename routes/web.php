```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


/*
|--------------------------------------------------------------------------
| Student Registration System Routes
|--------------------------------------------------------------------------
*/

// Student List / Home
Route::get('/', [StudentController::class, 'index'])
    ->name('students.index');

// Registration Form
Route::get('/register', [StudentController::class, 'create'])
    ->name('students.create');

// Process Registration
Route::post('/register', [StudentController::class, 'store'])
    ->name('students.store');

// Student Profile
Route::get('/students/{student}', [StudentController::class, 'show'])
    ->name('students.show');
