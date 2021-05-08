<?php

namespace App\Http\Controllers;

use App\Models\batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{   

    protected $batch;
    public function __construct(batch $batch)
    {
        $this->batch = $batch;
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

        return $this->batch->getBatch($per_page, $current_page, $filter, $sort_by, $descending);
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
        $batch   = $this->batch->create([
            'name'  =>$request->name,
            'description'  =>$request->description,
        ]);

       if ($batch) {
           return ['Batch Message'];
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(batch $batch, $id)
    {
        return $this->batch->findOrFail($id);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, batch $batch,$id)
    {
        $id = $request->id;
        $batch = $this->batch->findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        $batch->update($request->all());
        return ['message' => 'Update Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(batch $batch)
    {
        //
    }
}
