<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;


class Students extends Model
{
    use HasFactory;
    // protected $primaryKey ='id';
    // protected $table = 'students';
    // public $incrementing = false;
    protected $fillable=[
        'admission_number',
        'roll_number',
        'class_id',
        'section_id',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'mobile_number',
        'email',
        'addmission_Date',
        'image',
        'parent_details',
        'student_address',
        'student_address',
        'transport_details',
        'hostel_details',
        'miscellaneous_details',
       
    ];

    public function getStudent($per_page = 5, $current_page = 1, $filter = "", $sort_by = "created_at", $descending = "true") 
    {
        // $query = $this->selectRaw('*');
		$query = $this->leftjoin('classes','classes.id','=','students.class_id' )
        ->leftjoin('departments','departments.id','students.section_id')
        ->selectRaw('students.id, students.first_name, students.mobile_number,students.email, classes.name as class_name, classes.id as class_id, departments.name as section_name');
		if ($descending === "true") {
			$query = $query->orderBy($sort_by, 'desc');
		} else {
			$query = $query->orderBy($sort_by, 'asc');
		}
        if($filter!=''){
            $query = $query->where('students.first_name', 'ILIKE', '%' .$filter. '%');
        }
		Paginator::currentPageResolver(function () use ($current_page) {
			return $current_page;
		});
		return $query->paginate($per_page);
	}	
}
