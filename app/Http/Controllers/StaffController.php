<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class StaffController extends Controller
{   

    protected $staff;
    public function __construct(staff $staff)
    {
        $this->staff = $staff;
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

        return $this->staff->getStaff($per_page, $current_page, $filter, $sort_by, $descending);

        // $staff = $this->staff->all();
        // return $staff;
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

        $staff   = $this->staff->create([
             'name'  =>$request->name,
             'description'  =>$request->description,
         ]);

        if ($staff) {
            return ['staff Message'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, staff $staff)
    {
        $id = $request->id;
        $staff = $this->staff->findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        $staff->update($request->all());
        return ['message' => 'Update Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(staff $staff)
    {
        //
    }
}
