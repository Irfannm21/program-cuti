<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masterKaryawan extends Model
{
    use HasFactory;
    protected $fillable = [];

    public function cv() {
        return $this->hasOne("App\cv");
    }

    public function cutis() {
        return $this->hasMany('App\DataCuti');
    }
}
