<?php

namespace App\Http\Controllers;

use App\Models\time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    protected $time;
    public function __construct(time $time)
    {
        $this->time = $time;
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

        return $this->time->getTime($per_page, $current_page, $filter, $sort_by, $descending);
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
        
        $time   = $this->time->create([
            'name'  =>$request->name,
            'description'  =>$request->description,
        ]);

       if ($time) {
           return ['Time Message'];
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\time  $time
     * @return \Illuminate\Http\Response
     */
    public function edit(time $time,$id)
    {
        return $this->time->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, time $time)
    {
        $id = $request->id;
        $time = $this->time->findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        $time->update($request->all());
        return ['message' => 'Update Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\time  $time
     * @return \Illuminate\Http\Response
     */
    public function destroy(time $time)
    {
        //
    }
}
