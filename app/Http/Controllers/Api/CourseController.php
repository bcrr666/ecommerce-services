<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;

class CourseController extends Controller
{
    public function create(Request $request)
    {
        $course = Course::create([
            'name' => $request->name,
            'img' => $request->img,
            'author' => $request->author,
            'resume' => $request->name,
        ]);
        return response()->services(true, 'El curso fue registrado correctamente', $course);
    }

    public function search(Request $request)
    {
        $courses = Course::get();
        return response()->services(true, 'Lista de cursos', $courses);
    }

    public function update(Request $request)
    {
        $course = Course::find($request->id);
        $course->name = $request->name;
        $course->img = $request->img;
        $course->author = $request->author;
        $course->resume = $request->name;
        $course->save();

        return response()->services(true, 'El curso fue actualizado correctamente', $course);
    }

    public function delete(int $id)
    {
        $lessons = Lesson::where('course_id', $id)->get();
        $lessons->each(function ($item, $key) {
            $item->delete();
        });
        $course = Course::find($id);
        $course->delete();
        return response()->services(true, 'El curso fue eliminado', $course);
    }

    public function getCourse(int $id)
    {
        $Course = Course::find($id);
        return response()->services(true, 'Información deL course', $Course);
    }
}
