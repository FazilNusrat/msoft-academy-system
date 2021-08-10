<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;


class Teachers extends Model 
{
  use HasFactory;
  protected $primaryKey ='id';
  public $incrementing = false;
  protected $table="teachers";
  protected $fillable=[
    'addmission_number',
    'roll_number',
    'first_name',
    'last_name',
    'father_name',
    'phone',
    'date_of_birth',
    'email',
    'photo',
    'salary',
    'section_id',
    'class_id',
    'header_photo',
    'gender',
    'current_address',
    'permenent_address',
    'education_level',
    'experience',
    'tazkera_number',
];

public function getTeacher($per_page = 5, $current_page = 1, $filter = "", $sort_by = "created_at", $descending = "true") 
{
    // $query = $this->selectRaw('*');
$query = $this->leftjoin('classes','classes.id','=','teachers.class_id' )
    ->leftjoin('departments','departments.id','teachers.section_id')
    ->selectRaw('teachers.id, teachers.first_name, teachers.phone, teachers.email, classes.name as class_name, classes.id as class_id, departments.name as section_name');
if ($descending === "true") {
  $query = $query->orderBy($sort_by, 'desc');
} else {
  $query = $query->orderBy($sort_by, 'asc');
}
    if($filter!=''){
        $query = $query->where('teachers.first_name', 'ILIKE', '%' .$filter. '%');
    }
Paginator::currentPageResolver(function () use ($current_page) {
  return $current_page;
});
return $query->paginate($per_page);
}	
public function show($id)
{
    return $this->leftjoin('classes','classes.id','teachers.class_id')
        ->leftjoin('departments','departments.id','teachers.section_id')
        ->where('teachers.id',$id)
        ->selectRaw('teachers.id , teachers.addmission_number , teachers.roll_number ,  teachers.first_name , teachers.last_name,
      teachers.father_name,teachers.phone, teachers.date_of_birth, teachers.email, teachers.salary, 
      teachers.current_address, teachers.permenent_address, teachers.education_level , teachers.experience, 
      teachers.tazkera_number,teachers.gender ,teachers.photo,
      classes.name as class_name ,classes.id as class_id,departments.name as section_name ')->first();
}
}