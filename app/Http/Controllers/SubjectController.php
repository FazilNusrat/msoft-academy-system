<?php

namespace App\Http\Controllers;

use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class SubjectController extends Controller
{
    protected $subject;
    public function __construct(subject $subject)
    {
        $this->subject = $subject;
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

        return $this->subject->getSubject($per_page, $current_page, $filter, $sort_by, $descending);

        // $subject = $this->subject->all();
        // return $subject;
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

        $subject   = $this->subject->create([
             'name'  =>$request->name,
             'description'  =>$request->description,
         ]);

        if ($subject) {
            return ['Subject Message'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(subject $subject, $id)
    {
        return $this->subject->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subject $subject, $id)
    {
        $id = $request->id;
        $subject = $this->subject->findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        $subject->update($request->all());
        return ['message' => 'Update Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(subject $subject)
    {
        //
    }
}