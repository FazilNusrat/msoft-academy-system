<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;


class Students extends Model
{
    use HasFactory;
    protected $primaryKey ='id';
    public $incrementing = false;
    protected $fillable=[
        'admission_no',
        'roll_number',
        'class',
        'section',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'category',
        'religion',
        'caste',
        'mobile_number',
        'email',
        'addmission_Date',
        'blood_group',
        'student_house',
        'height',
        'weigth',
        'as_on_date',
        'medical_history',
        'image',
        'parent_details',
        'student_address',
        'student_address',
        'transport_details',
        'host_details',
        'miscellaneous_details',
       
    ];

    public function getStudent($per_page = 5, $current_page = 1, $filter = "", $sort_by = "created_at", $descending = "true") {
		$query = $this->selectRaw('*')
			->groupBy('id');
		if ($descending === "true") {
			$query = $query->orderBy($sort_by, 'desc');
		} else {
			$query = $query->orderBy($sort_by, 'asc');
		}
		Paginator::currentPageResolver(function () use ($current_page) {
			return $current_page;
		});
		return $query->paginate($per_page);
	}	
}
