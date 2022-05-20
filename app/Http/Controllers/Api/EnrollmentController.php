<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function search(Request $request)
    {
        $enrollments = Enrollment::selectRaw('courses.*, enrollments.id enrollment_id')
            ->join('courses', 'courses.id', 'enrollments.coruse_id')
            ->where('user_id', $request->user_id)
            ->get();
        return response()->services(true, 'Lista de cursos matriculados', $enrollments);
    }
}
