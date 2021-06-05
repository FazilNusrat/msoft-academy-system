<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TimeController;
use App\Models\Classes;
use App\Models\time;
use App\Models\Teachers;
use App\Models\department;

use Illuminate\Http\Request;

class AcademyController extends Controller
{
     protected $classes;
     protected $times;
     protected $teachers;
     protected $department;

    function __construct(
        Classes $classes,
        time $times,
        Teachers $teachers,
        department $department
    ) {
        $this->classes     = $classes;
        $this->times     = $times;
        $this->teachers     = $teachers;
        $this->department     = $department;

    }

    public function search(Request $request) {

        $type = $request->type;

        if ($type == 'class') {
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
        if($type=='department')
            return response()->json($this->department->get(['id','name']),200);
    }
}
