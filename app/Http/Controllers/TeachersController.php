<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Image;


class TeachersController extends Controller
{
    protected $Teachers;
    public function __construct(Teachers $Teachers)
    {
        $this->Teachers = $Teachers;
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

        return $this->Teachers->getTeacher($per_page, $current_page, $filter, $sort_by, $descending);
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
            $original_filename = $request->file('photo')->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $name = 'STU-' . time() . '.' . $file_ext;
            $img = Image::make($request->file('photo'));
            $img->save(public_path('uploads/teachers/' . $name));
            $img->resize(100,100, function($constraint)
            {
                $constraint->aspectRatio();
            })->save(public_path('uploads/teachers/small/' . $name));
            // $request->merge(['photo' => $name]);
        }


        $TeacherData = [
            'addmission_number'                =>$form->addmission_number,
            'roll_number'                      =>$form->roll_number,
            'first_name'                       =>$form->first_name,
            'last_name'                        =>$form->last_name,
            'father_name'                      =>$form->father_name,
            'email'                            =>$form->email,
            'phone'                            =>$form->phone,
            'photo'                            =>$name,
            'date_of_birth'                    =>$form->date_of_birth,
            'email'                            =>$form->email,
            'salary'                           =>$form->salary,
            'gender'                           =>$form->gender,
            'current_address'                  =>$form->current_address,
            'permenent_address'                =>$form->permenent_address,
            'education_level'                  =>$form->education_level,
            'experience'                       =>$form->experience,
            'tazkera_number'                   =>$form->tazkera_number,

        ];

        $Teacher   = $this->Teachers->create($TeacherData);
        if($Teacher)
        {
            return ['Class Message'];
        }
        return json_encode($this->Teachers->find($id));
        // return ['ttt'=>json_decode($request->form)];
          
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teachers  
     * @return \Illuminate\Http\Response
     */
    public function show(Teachers $Teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teachers  
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->Teachers->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teachers  
     * @return \Illuminate\Http\Response
     */ 
    public function update(Request $request, $id)
    {
        // return 22;   
        // $id = $request->id;
        // return $id;
        $Teacher = $this->Teachers->findOrFail($id);
        // $this->validate($request, [
        //     'name' => 'required|string|max:191',
        // ]);
        $form = json_decode($request->form); 
        $TeacherData = [
            'first_name'                       =>$form->first_name,
            'last_name'                        =>$form->last_name,
            'father_name'                      =>$form->father_name,
            'email'                            =>$form->email,
            'phone'                            =>$form->phone,
            'email'                            =>$form->email,
            'salary'                           =>$form->salary,
            'current_address'                  =>$form->current_address,
            'permenent_address'                =>$form->permenent_address,
            'education_level'                  =>$form->education_level,
            'experience'                       =>$form->experience,
            'tazkera_number'                   =>$form->tazkera_number,

        ];
        
        $Teacher->update($TeacherData);
        return ['message' => 'Update Successfully'];

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teachers  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Teacher = $this->Teachers->find($id);
        $Teacher->delete();
    }
}
