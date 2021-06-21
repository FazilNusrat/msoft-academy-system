<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;


class library extends Model
{
    use HasFactory;
    protected $primaryKey ='id';
    public $incrementing=false;
    protected $table="libraries";
    protected $fillable = [
        'book_title',
        'book_number',
        'rack_number',
        'publisher',
        'author',
        'subject',
        'get_book',
        'book_price',
        'description',
        'return_book',
        'phone',
    ];
    public function getlibrary($per_page = 5, $current_page = 1, $filter = "", $sort_by = "created_at", $descending = "true")
     {
		$query = $this->selectRaw('*')
			->groupBy('id');
		if ($descending === "true") {
			$query = $query->orderBy($sort_by, 'desc');
		} else {
			$query = $query->orderBy($sort_by, 'asc');
		}
        if ($filter != "") {
			$query = $query->where('book_title','ILIKE','%'.$filter.'%')
                            ->orWhere('subject','ILIKE','%'.$filter.'%');
		}
		Paginator::currentPageResolver(function () use ($current_page) {
			return $current_page;
		});
		return $query->paginate($per_page);
	}
}
