<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name'];

    function models()
    {
        return $this->hasMany(Model::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
