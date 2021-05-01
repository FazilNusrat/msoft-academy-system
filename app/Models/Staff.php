<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incremeting = false;
    protected $fillable = [
        'name',
        'last_name',
        'father_name',
        'email',
        'cnic',
        'phone',
        'salary',
        'address',
        'start_date'
    ];
}
