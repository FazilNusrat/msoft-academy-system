<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model {
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
    'regint',
  ];
}