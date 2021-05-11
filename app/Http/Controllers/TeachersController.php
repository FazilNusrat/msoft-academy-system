<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    protected $teacher;
    public function __construct(Teachers $teacher)
    {
        $this->teacher = $teacher;
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

        return $this->teacher->getTeacher($per_page, $current_page, $filter, $sort_by, $descending);
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
        
        $teacher   = $this->teacher->create([
            'name'  =>$request->name,
            'last_name'  =>$request->last_name,
            'father_name'  =>$request->father_name,
            'education'  =>$request->education,
            'email'  =>$request->email,
            'cnic'  =>$request->cnic,
            'phone'  =>$request->phone,
            'gender_id'  =>$request->gender_id,
            'address'  =>$request->address,
            'birth_day'  =>$request->birth_day,
            'age'  =>$request->age,
            ]);
            return 1;

            if ($teacher) {
           return ['teacher Message'];
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teachers  
     * @return \Illuminate\Http\Response
     */
    public function show(Teachers $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teachers  
     * @return \Illuminate\Http\Response
     */
    public function edit(Teachers $teacher,$id)
    {
        return $this->teacher->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teachers  
     * @return \Illuminate\Http\Response
     */ 
    public function update(Request $request, Teachers $teacher)
    {
        $id = $request->id;
        $teacher = $this->teacher->findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        $teacher->update($request->all());
        return ['message' => 'Update Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teachers  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teachers $teacher)
    {
        //
    }
}
