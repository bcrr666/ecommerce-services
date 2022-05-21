<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function search(Request $request)
    {
        $enrollments = Enrollment::selectRaw('courses.* , enrollments.id enrollment_id,
            concat("'.config('app.url').'", courses.img) as img')
            ->join('courses', 'courses.id', 'enrollments.course_id')
            ->where('user_id', $request->user()->id)
            ->get();
        return response()->services(true, 'Lista de cursos matriculados', $enrollments);
    }
}
