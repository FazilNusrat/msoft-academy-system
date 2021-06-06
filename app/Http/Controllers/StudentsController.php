<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Image;


class StudentsController extends Controller
{
    protected $student;
    public function __construct(Students $student)
    {
        $this->student = $student;
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

        return $this->student->getStudent($per_page, $current_page, $filter, $sort_by, $descending);
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
        // $f = json_decode($request->form);
        // $data = [
        //     'name' => $form->name
        // ]
        // $s = $this->student->create($data);
        // if($s) {
        //     $this->info->create([
                
        //         'student_id'=>$s->id,
        //         'salary' =>$form->inof->salary
        //     ])
        // }

        $form = json_decode($request->form);
        
        //image
        $name = '';
        if ($request->hasFile('photo')) {
            $original_filename = $request->file('photo')->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $name = 'EMP-' . time() . '.' . $file_ext;
            $img = Image::make($request->file('photo'));
            $img->save(public_path('uploads/student/' . $name));
            $img->resize(100,100, function($constraint)
            {
                $constraint->aspectRatio();
            })->save(public_path('uploads/student/small/' . $name));
            // $request->merge(['photo' => $name]);
        }

        $parent_details = [
            'father_name'               => $form->parent_details->father_name,
            'father_phone_number'       => $form->parent_details->father_phone_number,
            'father_occupation'         => $form->parent_details->father_occupation,
            'mother_name'               => $form->parent_details->mother_name,
            'mother_phone_number'       => $form->parent_details->mother_phone_number,
            'mother_occupation'         => $form->parent_details->mother_occupation,
            'guardian_name'             => $form->parent_details->guardian_name,
            'guardian_occupation'       => $form->parent_details->guardian_occupation,
            'guardian_email'            => $form->parent_details->guardian_email,
            'guardian_address'          => $form->parent_details->guardian_address,
            'guardian_phone'            => $form->parent_details->guardian_phone,
            'guardian_relation'         => $form->parent_details->guardian_relation
        ];
        $student_address = [
            'current_address'           => $form->student_address->current_address,
            'Permanent_address'         => $form->student_address->Permanent_address,
        ];
        $transport_details = [
            'route_list'                => $form->transport_details->route_list,
        ];
        // $hostel_details = [

        // ];
        
         $miscellaneous_details = [
            'bank_account_number'               => $form->miscellaneous_details->bank_account_number,
            'bank_name'                         => $form->miscellaneous_details->bank_name,
            'ifsc_code'                         => $form->miscellaneous_details->ifsc_code,
            'national_identification_number'    => $form->miscellaneous_details->national_identification_number,
            'yes'                               => $form->miscellaneous_details->yes,
            'no'                                => $form->miscellaneous_details->no,
            'previou_school_details'            => $form->miscellaneous_details->previou_school_details,
            'note'                              => $form->miscellaneous_details->note,
         ];
 
        $studentData = [
            'class_id'                  => intval($form->class_id),
            'addmission_number'          =>$form->addmission_number,
            'roll_number'               =>$form->roll_number,
            'class_id'                  =>$form->class_id,
            'section_id'                =>$form->section_id,
            'first_name'                =>$form->first_name,
            'last_name'                 =>$form->last_name,
            'gender'                    =>$form->gender,
            'date_of_birth'             =>$form->date_of_birth,
            'category'                  =>$form->category?$form->category:1,
            'religion'                  =>$form->religion?$form->religion:1,
            'caste'                     =>$form->caste?$form->caste:1,
            'mobile_number'             =>$form->mobile_number?$form->mobile_number:0,
            'email'                     =>$form->email?$form->email:0,
            'addmission_Date'           =>$form->addmission_date,
            'blood_group_id'            =>$form->blood_group?$form->blood_group:1,
            'student_house'             =>$form->student_house,
            'height'                    =>$form->height,
            'weight'                    =>$form->weight,
            'as_on_date'                =>$form->as_on_date,
            'medical_history'           =>$form->medical_history,
            // 'image'                     =>$form->image,
            'student_address'           => json_encode($student_address),
            'parent_details'            => json_encode($parent_details),
            'transport_details'         => json_encode($transport_details),
            'miscellaneous_details'     => json_encode($miscellaneous_details),
        ];

        $student   = $this->student->create($studentData);
        if($student)
        {
            return ['Class Message'];
        }
        return json_encode($this->student->find($id));
        // return ['ttt'=>json_decode($request->form)];
          
    }    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Students $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student,$id)
    {
        return $this->student->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $student
     * @return \Illuminate\Http\Response
     */ 
    public function update(Request $request, Students $student)
    {
        $id = $request->id;
        $student = $this->student->findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        $student->update($request->all());
        return ['message' => 'Update Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student,$id)
    {
        $student = $this->student->find($id);
        $student->delete();
    }
}
