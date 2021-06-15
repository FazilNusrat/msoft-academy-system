<?php

namespace App\Http\Controllers;

use App\Models\library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    protected $library;
    public function __construct(library $library)
    {
        $this->library = $library;
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
      
        $libraryData = [
            'book_title'                =>$form->book_title,
            'book_number'               =>$form->book_number,
            'rack_number'               =>$form->rack_number,
            'publisher'                 =>$form->publisher,
            'author'                    =>$form->author,
            'subject'                   =>$form->subject,
            'get_book'                  =>$form->get_book,
            'book_price'                =>$form->book_price,
            'return_book'               =>$form->return_book,
            'phone'                     =>$form->phone,

        ];

        $library   = $this->library->create($libraryData);
        if($library)
        {
            return ['library Message'];
        }
        return json_encode($this->library->find($id));
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
    public function edit(library $library,$id)
    {
        return $this->library->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,library $library, $id)
    {
        $library = $this->library->findOrFail($id);

        $form = json_decode($request->form);
        $libraryData = [
            'book_title'             =>$form->book_title,
            'book_number'            =>$form->book_number,
            'rack_number'            =>$form->rack_number,
            'publisher'              =>$form->publisher,
            'author'                 =>$form->author,
            'subject'                =>$form->subject,
            'get_book'               =>$form->get_book,
            'book_price'             =>$form->book_price,
            'return_book'            =>$form->return_book,
            'phone'                  =>$form->phone,
        ];
        $library->update($libraryData);
        return ['message' => 'Update Successfully'];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(library $library)
    {
        $library = $this->libr$librarys->find($id);
        $library->delete();
    }
}
