<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\PseudoTypes\False_;

class batch extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = False;
    protected $fillable = [
        'date'
    ];
}
