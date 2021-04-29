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
    public function index()
    {
        $batch=$this->batch->all();
        return $batch;
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
        $batch=$this->batch->create([
            'name'      =>$request->name,
        ]);
        if($batch)
        {
            return 1;
        }else
        {
            return 0;
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
    public function edit(batch $batch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, batch $batch)
    {
        //
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
