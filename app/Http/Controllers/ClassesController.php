<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    protected $class;
    public function __construct(Classes $class)
    {
        $this->class = $class;
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

        return $this->class->getClass($per_page, $current_page, $filter, $sort_by, $descending);
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
        $createClass   = $this->class->create([
            'name'  =>$request->name,
            'description'  =>$request->description,
            'time_id'  =>$request->time_id,
        ]);

       if ($createClass) {
           return ['Class Message'];
       }

   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes
     * @return \Illuminate\Http\Response
     */
    // edit function
    public function edit(Classes $class,$id) {
        return $this->class->findOrFail($id);

    }
    // update function
    public function update(Request $request) {
        $id = $request->id;
        $class = $this->class->findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        $class->update($request->all());
        return ['message' => 'Update Successfully'];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
            
    }
}
