<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TimeController;
use App\Models\Classes;
use App\Models\time;

use Illuminate\Http\Request;

class AcademyController extends Controller
{
     protected $classes;

    function __construct(
        Classes $classes,
        time $times
    ) {
        $this->classes     = $classes;
        $this->times     = $times;

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
    }
}
