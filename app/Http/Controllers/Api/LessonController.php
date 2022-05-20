<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function create(Request $request)
    {
        $lesson = Lesson::create([
            'name' => $request->name,
        ]);
        return response()->services(true, 'La leccion fue registrado correctamente', $lesson);
    }

    public function search(Request $request)
    {
        $lessons = Lesson::get();
        return response()->services(true, 'Lista de lecciones', $lessons);
    }

    public function update(Request $request)
    {
        $lesson = Lesson::find($request->id);
        $lesson->name = $request->name;
        $lesson->save();

        return response()->services(true, 'La leccion fue actualizado correctamente', $lesson);
    }

    public function delete(int $id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return response()->services(true, 'La leccion fue eliminado', $lesson);
    }

    public function getLesson(int $id)
    {
        $lesson = Lesson::find($id);
        return response()->services(true, 'Información de la lección', $lesson);
    }
}
