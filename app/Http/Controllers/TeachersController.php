<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class TeachersController extends Controller
{
    protected $teacher;
    public function __construct(Teachers $teacher)
    {
        $this->teachers = $teacher;
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

        return $this->teachers->getTeacher($per_page, $current_page, $filter, $sort_by, $descending);
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

        $teachers   = $this->teachers->create([
             'name'  =>$request->name,
             'description'  =>$request->description,
         ]);

        if ($teachers) {
            return ['teachers Message'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teachers 
     * @return \Illuminate\Http\Response
     */
    public function show(teachers $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teachers 
     * @return \Illuminate\Http\Response
     */
    public function edit(teachers $teacher, $id)
    {
        return $this->teacher->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\teachers  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teachers $teacher, $id)
    {
        $id = $request->id;
        $teachers = $this->teacher->findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        $teacher->update($request->all());
        return ['message' => 'Update Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teachers 
     * @return \Illuminate\Http\Response
     */
    public function destroy(teachers $teacher)
    {
        //
    }
}
