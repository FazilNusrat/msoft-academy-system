<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model {
  use HasFactory;
  protected $primaryKey = 'id';
  public $incrementing = false;
  protected $fillable = [
    'name',
    'last_name',
    'father_name',
    'cnic',
    'phone',
    'email',
    'address',
    'salary',
    'regint',
  ];
}