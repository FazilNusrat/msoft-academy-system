<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {
  protected $Student;
  public function __construct(Student $Student) {
    $this->Student = $Student;
  }
  public function index(Request $request) {
    $Student = $this->Student->all();
    return $Student;
  }

  public function store(Request $request) {
    $Student = $this->Student->create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'father_name' => $request->father_name,
      'cnic' => $request->cnic,
      'phone' => $request->phone,
      'email' => $request->email,
      'address' => $request->address,
      'regint' => $request->regint,
    ]);
    if ($Student) {
      return 1;
    } else {
      return 0;
    }

  }
}