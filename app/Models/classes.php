<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $primaryKey ='id';
    public $incrementing = false;
    protected $fillable=[
        'name',
        'description'
    ];
}
