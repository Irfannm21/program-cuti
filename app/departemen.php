<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function bagians() {
        return $this->hasMany('App\bagian_dept');
    }
}
