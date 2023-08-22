<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cv extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function pendidikans() {
        return $this->hasMany('App\pendidikan');
    }

    public function pengalamans() {
        return $this->hasMany('App\Pengalaman');
    }
}
