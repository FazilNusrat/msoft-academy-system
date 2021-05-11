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
  protected $fillable=[
      'name',
      'last_name',
      'father_name',
      'eduaction',
      'email',
      'cnic',
      'phone',
      'gender_id',
      'address',
      'birth_day',
      'age'
  ];

  public function getTeacher($per_page = 5, $current_page = 1, $filter = "", $sort_by = "created_at", $descending = "true") {
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