<?php

namespace App\Http\Controllers;

use App\Models\library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter = $request->input('filter');
        $per_page = $request->input('per_page');
        $current_page = $request->input('current_page');
        $sort_by = $request->input('sort_by');
        $descending = $request->input('descending');

        return $this->library->getlibrary($per_page, $current_page, $filter, $sort_by, $descending);
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
        $form = json_decode($request->form);
        
        //image
        $name = '';
        if ($request->hasFile('photo')) {
            $original_filename = $form->file('photo')->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $name = 'EMP-' . time() . '.' . $file_ext;
            $img = Image::make($form->file('photo'));
            $img->save(public_path('uploads/staff/' . $name));
            $img->resize(100,100, function($constraint)
            {
                $constraint->aspectRatio();
            })->save(public_path('uploads/library/small/' . $name));
            // $form->merge(['photo' => $name]);
        }
        $libraryData = [
            'book_title'         =>$form->book_title,
            'book_number'        =>$form->book_number,
            'publicher'          =>$form->publicher,
            'auther'             =>$form->auther,
            'subject'            =>$form->subject,
            'rack_number'        =>$form->rack_number,
            'qty'                =>$form->qty,
            'book_price'         =>$form->book_price,
            'post_date'          =>$form->post_date,
            'description'        =>$form->description,
        ];

        $staff   = $this->staff->create($staffData);
        if($staff)
        {
            return ['Class Message'];
        }
        return json_encode($this->staff->find($id));
        // return ['ttt'=>json_decode($request->form)];
          
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(library $library)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(library $library)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, library $library)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(library $library)
    {
        //
    }
}
