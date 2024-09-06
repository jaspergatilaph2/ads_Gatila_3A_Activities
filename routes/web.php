<?php
use App\Models\student;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student/create', function(){
    $student = new student();
    $student->first_name = 'John';
    $student->last_name = 'Doe';
    $student->email = 'john.doe@example.com';
    $student->age = 22;
    $student->save();
    return 'Student Created!';       
}
);

Route::get('/student', function(){
    $student = student::all();
    return $student;
}
);

Route::get('/student/update', function(){
    $student = student::where('email', 'john.doe@example.com')->first();
    $student->email = 'john.doe@example.com';
    $student->age = 23;
    $student->save();
    return 'Students Updated!!';
}
);

Route::get('/student/delete', function(){
    $student = student::where('email', 'john.doe@example.com')->first();
    $student->delete();
    return 'Student Deleted!';
});

Route::get('/course/create', function(){
    $course = new Course();
    $course->course_name = 'introduction to Databases';
    $course->save();
    return 'Course Created';
}
);

Route::get('/course/{id}/student', function($id){
    $course = Course::find($id);
    return $course->student;
}
);

