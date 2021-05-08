<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model 
  {
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'cnic',
        'phone',
        'email',
        'address',
        'gender_id',
        'birth_day',
        'age',
        'description'
    ];

    public function getSubject($per_page = 5, $current_page = 1, $filter = "", $sort_by = "created_at", $descending = "true") {
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