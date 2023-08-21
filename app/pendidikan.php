<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendidikan extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function cv() {
        return $this->belongsTo('App\cv');
    }
}
