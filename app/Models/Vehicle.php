<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name','logo'];

    function model()
    {
        return $this->belongsTo(Model::class);
    }
}