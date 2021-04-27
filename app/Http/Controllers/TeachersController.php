<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller {
    protected $Teachers;
  public function __construct(Teachers $teacher) {
    $this->teacher = $teacher;
  }
  public function index(Request $request) {
    $teacher = $this->teacher->all();
    return $teacher;
  }

  public function store(Request $request) {
    $teacher = $this->teacher->create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'father_name' => $request->father_name,
      'cnic' => $request->cnic,
      'phone' => $request->phone,
      'email' => $request->email,
      'address' => $request->address,
      'gender_id' => $request->gender,
      'birth_day' => $request->birth_day,
      'age' => $request->age,
    ]);
    if ($teacher) {
      return 1;
    } else {
      return 0;
    }

  }
}