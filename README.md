# Student Registration System

**Laravel Forms, Validation, and File Upload — Mini Project 03**

---

## 1. Project Title

**Student Registration System** — A Laravel-based web application for digitally registering students, validating their information, uploading profile pictures, and securely storing their records in a MySQL database.

---

## 2. Introduction

Student registration is one of the most fundamental processes in any educational institution. Traditionally handled through paper forms, this process is prone to data entry errors, duplication, loss of records, and slow processing times. Digital registration systems solve these problems by capturing information directly from users, validating it in real time, and storing it in a structured, searchable database.

**Purpose of a Student Registration System**
This system allows the College of Information Technology to move from a paper-based registration process to a fully digital one. Students can fill out a registration form online, upload a profile picture, and have their information validated and stored automatically — eliminating manual encoding and reducing human error.

**Importance of Data Validation**
Validation ensures that only accurate, complete, and properly formatted data enters the database. Without validation, a system is vulnerable to duplicate records, missing required fields, malformed emails, invalid file types, and even malicious file uploads. Server-side validation, in particular, cannot be bypassed by disabling JavaScript or manipulating the browser, making it the last and most reliable line of defense.

**Role of Registration Systems in Enterprise Applications**
Registration systems are the entry point for nearly every enterprise platform — universities, hospitals, banks, and government agencies all rely on them to onboard users securely. They demonstrate core enterprise development skills: request handling, validation, file management, database design, and user feedback — all of which are foundational to larger systems such as Human Resource Information Systems (HRIS), Hospital Management Systems, and E-Commerce platforms.

---

## 3. Objectives

By completing this activity, the following learning objectives were accomplished:

- Developed HTML forms using Laravel Blade templates.
- Processed client requests using a Laravel controller (`StudentController`).
- Implemented server-side validation using Laravel's built-in Validation Rules.
- Displayed flash messages for both successful and failed form submissions.
- Uploaded and securely stored profile picture files using Laravel Storage.
- Designed and implemented a relational database table (`students`) using Laravel Migrations.
- Documented the software development process using Markdown.
- Applied Git version control and portfolio-building best practices through incremental, meaningful commits.

---

## 4. Laravel Request Lifecycle

When a student submits the registration form, the request travels through several layers of the Laravel framework before a response is returned to the browser:

```
Browser
   │  (User fills form and clicks "Register")
   ▼
Route (routes/web.php)
   │  POST /students → StudentController@store
   ▼
Controller (StudentController)
   │  Receives the Request object
   ▼
Validation ($request->validate([...]))
   │
   ├── Invalid → Errors bag created → Redirect back with input + errors
   │
   └── Valid ↓
   ▼
Model (Student::create([...]))
   │  Mass-assigns validated data
   ▼
Database (MySQL)
   │  INSERT INTO students (...)
   ▼
Response
   │  Redirect to students.show with flash message
   ▼
Browser
   (Displays success banner + student profile)
```

**Step-by-step explanation:**

1. **Browser** — The student opens `/students/create`, fills out the form, and submits it via `POST`.
2. **Route** — Laravel's router (`routes/web.php`) matches the incoming request to the `store` method of `StudentController`.
3. **Controller** — The `store()` method receives the `Request` object containing all form fields and the uploaded file.
4. **Validation** — Laravel's `validate()` method checks each field against defined rules. If any rule fails, Laravel automatically redirects back to the form with the old input and an `$errors` bag.
5. **Model** — If validation passes, the `Student` Eloquent model inserts a new row using mass assignment (`Student::create()`).
6. **Database** — MySQL stores the validated data, including the file path of the uploaded profile picture.
7. **Response** — The controller redirects to the student's profile page (`students.show`) with a flash success message.
8. **Browser** — The final page renders, showing the success banner and the newly registered student's details and photo.

*(Insert your own diagram version of this lifecycle — created in Draw.io, Lucidchart, Figma, or Canva — into the `documentation/` folder as `request-lifecycle.png`.)*

---

## 5. Validation Rules

The following validation rules are applied in `StudentController@store`:

```php
$request->validate([
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
```

| Rule | Purpose |
|---|---|
| **Required fields** (`required`) | Ensures essential information — such as name, email, and program — is never left blank, since incomplete records are unusable for enrollment or communication purposes. |
| **Unique constraints** (`unique:students`) | Prevents duplicate `student_id` and `email` entries, which is critical because both fields are typically used as unique identifiers for login, correspondence, and academic records. |
| **Email validation** (`email`) | Confirms the address follows a valid email format (e.g., `name@domain.com`), reducing the risk of undeliverable communication or invalid data entry. |
| **Numeric validation** (`numeric`) | Ensures the mobile number contains only digits, preventing errors when the number is later used for SMS notifications or formatted display. |
| **Image validation** (`image`) | Restricts the uploaded file to actual image formats, blocking malicious files (like `.php` or `.exe`) disguised with an image extension from being uploaded. |
| **File size restriction** (`max:2048`) | Limits the profile picture to 2MB, protecting server storage from being overwhelmed and keeping page load times fast when displaying student photos. |

Each rule works together to guarantee that only clean, safe, and complete data reaches the database — this is the core principle of **defense in depth** in enterprise application security.

---

## 6. Database Design

### Entity Relationship Diagram (ERD)

```
┌─────────────────────────────┐
│           students            │
├─────────────────────────────┤
│ PK  id              BIGINT    │
│     student_id      VARCHAR   │  (unique)
│     first_name      VARCHAR   │
│     middle_name     VARCHAR   │  (nullable)
│     last_name       VARCHAR   │
│     email           VARCHAR   │  (unique)
│     mobile_number   VARCHAR   │
│     date_of_birth   DATE      │
│     gender           VARCHAR   │
│     program          VARCHAR   │
│     year_level       VARCHAR   │
│     address           TEXT     │
│     profile_picture   VARCHAR   │
│     created_at        TIMESTAMP │
│     updated_at        TIMESTAMP │
└─────────────────────────────┘
```

### Table Structure

| Column | Data Type | Constraints |
|---|---|---|
| `id` | BIGINT | Primary Key, Auto Increment |
| `student_id` | VARCHAR(255) | Unique, Not Null |
| `first_name` | VARCHAR(100) | Not Null |
| `middle_name` | VARCHAR(100) | Nullable |
| `last_name` | VARCHAR(100) | Not Null |
| `email` | VARCHAR(255) | Unique, Not Null |
| `mobile_number` | VARCHAR(255) | Not Null |
| `date_of_birth` | DATE | Not Null |
| `gender` | VARCHAR(255) | Not Null |
| `program` | VARCHAR(255) | Not Null |
| `year_level` | VARCHAR(255) | Not Null |
| `address` | TEXT | Not Null |
| `profile_picture` | VARCHAR(255) | Not Null (stores file path) |
| `created_at` | TIMESTAMP | Auto-managed by Laravel |
| `updated_at` | TIMESTAMP | Auto-managed by Laravel |

### Primary Key
`id` — auto-incrementing surrogate key generated by Laravel's `$table->id()`.

### Constraints
- `student_id` and `email` are enforced as **unique** at the database level, matching the application-level validation rules, so duplicate records are rejected even if the validation layer were somehow bypassed.
- `profile_picture` stores only the **relative storage path** (e.g., `profile_pictures/xyz.jpg`), not the binary file itself — the actual image lives in `storage/app/public/profile_pictures` and is served through the `storage` symbolic link.

---

## 7. Flowchart

```
          ┌───────────────────────────┐
          │  User Opens Registration    │
          │           Page               │
          └──────────────┬───────────────┘
                          ▼
          ┌───────────────────────────┐
          │       Fill Out Form         │
          └──────────────┬───────────────┘
                          ▼
          ┌───────────────────────────┐
          │    Submit Registration      │
          └──────────────┬───────────────┘
                          ▼
          ┌───────────────────────────┐
          │     Laravel Validation      │
          └──────────────┬───────────────┘
                          ▼
                  ┌───────────────┐
                  │  Valid Data?   │
                  └───┬───────┬────┘
                 Yes  │       │  No
                      ▼       ▼
        ┌─────────────────┐ ┌─────────────────┐
        │ Save to Database  │ │ Display Errors    │
        └────────┬──────────┘ └─────────┬─────────┘
                 ▼                       │
        ┌─────────────────┐             │
        │ Upload Profile    │             │
        │     Picture        │             │
        └────────┬──────────┘             │
                 ▼                       │
        ┌─────────────────┐             │
        │  Success Message   │◄────────────┘
        └────────┬──────────┘   (returns to form)
                 ▼
        ┌─────────────────┐
        │ Student Profile     │
        │      Page             │
        └─────────────────┘
```

---

## 8. Screenshots

> Insert the actual screenshots below, saved inside the `screenshots/` folder.

| Screenshot | File |
|---|---|
| Registration Form | `screenshots/registration-form.png` |
| Validation Errors | `screenshots/validation-errors.png` |
| Successful Registration | `screenshots/successful-registration.png` |
| Flash Message | `screenshots/flash-message.png` |
| Uploaded Profile Picture | `screenshots/uploaded-picture.png` |
| Database Table (MySQL Workbench / phpMyAdmin) | `screenshots/database-table.png` |
| Student Profile Page | `screenshots/student-profile-page.png` |
| VS Code Project Structure | `screenshots/vscode-structure.png` |
| GitHub Repository | `screenshots/github-repository.png` |
| Terminal Output | `screenshots/terminal-output.png` |
| Browser Output | `screenshots/browser-output.png` |

---

## 9. Problems Encountered

1. **`Class "App\Http\Controllers\Student" not found`**
   The `StudentController` referenced the `Student` model without importing it, since `Student` lives in the `App\Models` namespace, not `App\Http\Controllers`.

2. **`PDOException: could not find driver`**
   Laravel could not connect to MySQL because the `pdo_mysql` PHP extension was disabled in `php.ini`, even though `.env` was correctly configured for a MySQL connection.

3. **`ViteManifestNotFoundException`**
   The Blade layout called `@vite(...)` to load compiled CSS/JS assets, but the frontend build had never been run, so `public/build/manifest.json` did not exist.

4. **Uploaded image not displaying on the profile page**
   The `storage` symbolic link had not been created yet, so files saved to `storage/app/public` were not accessible through the public `storage/` URL.

---

## 10. Solutions

1. Added `use App\Models\Student;` to the top of `StudentController.php`, resolving the missing-class error and allowing `Student::create()` and route-model binding to work correctly.

2. Opened `php --ini` to locate the active `php.ini` file, uncommented the `extension=pdo_mysql` and `extension=mysqli` lines, restarted the terminal, and verified the extensions loaded using `php -m | grep -i mysql` before re-running `php artisan migrate`.

3. Ran `npm install` followed by `npm run dev` (for local development) or `npm run build` (for a final production build) to generate the missing Vite manifest and compiled assets.

4. Ran `php artisan storage:link` to create the symbolic link between `public/storage` and `storage/app/public`, allowing uploaded profile pictures to be served correctly via `asset('storage/...')`.

---

## 11. Reflection

Working on the Student Registration System gave me a much deeper appreciation for how much invisible engineering goes into something as seemingly simple as a sign-up form. Before this activity, I thought of validation as a minor detail — a few `required` attributes on an HTML input. Building this project taught me that validation is actually one of the most important layers of an enterprise application, because it is the boundary between trustworthy data and chaos. Every rule I wrote, from `unique:students` to `mimes:jpg,jpeg,png`, existed to protect the integrity of the database and, ultimately, the people whose information it stores.

One of the biggest lessons I learned was the difference between client-side and server-side validation. Client-side validation, done through HTML attributes or JavaScript, is helpful for immediate user feedback — it tells a student instantly if they forgot to fill in a field. But it is not secure, because it runs entirely in the browser and can be disabled, bypassed, or manipulated by anyone with basic developer tools. Server-side validation, implemented through Laravel's `validate()` method, cannot be bypassed this way, because it runs on infrastructure the user does not control. This project reinforced that real security and data integrity must always be enforced on the server, with client-side validation serving only as a convenience layer on top.

Handling user input also taught me to think defensively. Every field a student submits is, in a sense, an opportunity for something to go wrong — a duplicate ID, a malformed email, a missing required value, or a file that isn't actually an image. Writing the validation rules for this project forced me to think through every possible way a form submission could fail, and to design a system that fails safely: catching bad data before it reaches the database, and clearly communicating back to the user what needs to be fixed.

File security was another area I hadn't fully considered before this project. Allowing users to upload files, even something as ordinary as a profile picture, introduces real risk if not handled carefully. Restricting uploads to specific image MIME types, capping the file size, and storing files outside of direct public execution paths (using Laravel's `storage` system and symbolic links) are all practices that prevent malicious files from being disguised as images and executed on the server. I now understand why frameworks like Laravel provide dedicated Storage APIs instead of leaving file handling entirely to raw PHP — it removes much of the room for developer error.

Finally, this project made the real-world relevance of registration systems very clear to me. Nearly every enterprise application — school portals, hospital intake systems, banking onboarding flows, government e-services — begins with some version of what I built here: a form, validation, secure storage, and a database record. The patterns I practiced in this Mini Project (routes, controllers, validation, models, and Blade views) are the same architectural patterns used in much larger, production-grade Laravel applications. Completing this activity has given me a solid foundation that I know I will build directly on top of in the upcoming Enterprise Laravel E-Commerce Project, and it has made me genuinely more confident in my ability to build secure, functional, real-world web applications.

---

## 12. References

Laravel. (n.d.). *Laravel 11.x documentation*. Laravel. https://laravel.com/docs

The PHP Group. (n.d.). *PHP manual*. PHP. https://www.php.net/manual/en/

Oracle Corporation. (n.d.). *MySQL 8.0 reference manual*. MySQL. https://dev.mysql.com/doc/

Tailwind Labs. (n.d.). *Tailwind CSS documentation*. Tailwind CSS. https://tailwindcss.com/docs

Mozilla. (n.d.). *MDN Web Docs*. Mozilla Developer Network. https://developer.mozilla.org/
