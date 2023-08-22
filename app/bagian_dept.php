<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bagian_dept extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function departement() {
        return $this->hasOne('App\Departemen');
    }
}
