<?php

namespace App\Http\Controllers\AcademyController;
use App\Http\Controllers\Controller;
use App\Models\Classes;

use Illuminate\Http\Request;

class AcademyController extends Controller
{
     protected $classes;

    function __construct(
        Classes $classes,
    ) {
        $this->classes     = $classes;

    }

    public function search(Request $request) {

        $type = $request->type;

        if ($type == 'classes') {
            $classes = Classes::get(['name', 'id']);
            return response()->json($classes, 200);
        }
    }
}
