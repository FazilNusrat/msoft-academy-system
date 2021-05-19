<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TimeController;
use App\Models\Classes;
use App\Models\time;
use App\Models\Teachers;

use Illuminate\Http\Request;

class AcademyController extends Controller
{
     protected $classes;
     protected $times;
     protected $teachers;

    function __construct(
        Classes $classes,
        time $times,
        Teachers $teachers
    ) {
        $this->classes     = $classes;
        $this->times     = $times;
        $this->teachers     = $teachers;

    }

    public function search(Request $request) {

        $type = $request->type;

        if ($type == 'classes') {
            $classes = Classes::get(['name', 'id']);
            return response()->json($classes, 200);
        }
        if ($type == 'times') {
            $times = time::get(['name', 'id']);
            return response()->json($times, 200);
        }
        if ($type == 'teachers') {
            $teachers = Teachers::get(['name', 'id']);
            return response()->json($teachers, 200);
        }
    }
}
