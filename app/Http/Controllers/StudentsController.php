<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    protected $student;
    public function __construct(Students $student)
    {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $per_page = $request->input('per_page');
        $current_page = $request->input('current_page');
        $sort_by = $request->input('sort_by');
        $descending = $request->input('descending');

        return $this->student->getStudent($per_page, $current_page, $filter, $sort_by, $descending);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $student   = $this->student->create([
            'name'  =>$request->name,
            'last_name'  =>$request->last_name,
            'father_name'  =>$request->father_name,
            'email'  =>$request->email,
            'cnic'  =>$request->cnic,
            'phone'  =>$request->phone,
            'fees'  =>$request->fees,
            'address'  =>$request->address,
            'regint'  =>$request->regint,
        ]);

       if ($student) {
           return ['student Message'];
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Students $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student,$id)
    {
        return $this->student->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $student
     * @return \Illuminate\Http\Response
     */ 
    public function update(Request $request, Students $student)
    {
        $id = $request->id;
        $student = $this->student->findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        $student->update($request->all());
        return ['message' => 'Update Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student,$id)
    {
        $student = $this->student->find($id);
        $student->delete();
    }
}
