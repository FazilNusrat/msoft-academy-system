<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
class StaffController extends Controller
{
    protected $staff;
    public function __construct(Staff $staff)
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

        return $this->staff->getstaff($per_page, $current_page, $filter, $sort_by, $descending);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request 
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
            })->save(public_path('uploads/staff/small/' . $name));
            // $form->merge(['photo' => $name]);
        }
        $staffData = [
            'addmission_number'         =>$form->addmission_number,
            'roll_number'               =>$form->roll_number,
            'first_name'                =>$form->first_name,
            'last_name'                 =>$form->last_name,
            'father_name'               =>$form->father_name,
            'phone'                     =>$form->phone,
            'date_of_birth'             =>$form->date_of_birth,
            'email'                     =>$form->email,
            'salary'                    =>$form->salary,
            'address'                   =>$form->address,
            'city'                      =>$form->city,
            'job_name'                  =>$form->job_name,
            'photo'                     =>$form->photo,
            'gender'                    =>$form->gender,
        ];

        $staff   = $this->staff->create($staffData);
        if($staff)
        {
            return ['Class Message'];
        }
        return json_encode($this->staff->find($id));
        // return ['ttt'=>json_decode($request->form)];
          
    } 
    
    // {
        
    //     $staff   = $this->staff->create([
    //         'addmission_number'         =>$request->addmission_number,
    //         'First_Name'                =>$request->First_Name,
    //         'last_name'                 =>$request->last_name,
    //         'father_name'               =>$request->father_name,
    //         'phone'                     =>$request->phone,
    //         'email'                     =>$request->email,
    //         'Photo'                     =>$request->Photo,
    //         'salary'                    =>$request->salary,
    //         'address'                   =>$request->address,
    //         'city'                      =>$request->city,
    //         'job_name'                  =>$request->job_name,
    //         'start_date'                =>$request->start_date,
    //     ]);


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
    public function edit(staff $staff,$id)
    {
        return $this->staff->findOrFail($id);
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
    public function destroy(staff $staff,$id)
    {
        $staff = $this->staff->find($id);
        $staff->delete();
    }
}
