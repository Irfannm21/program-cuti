<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiCuti extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function cuti() {
        return $this->hasOne("App\DataCuti");
    }
}
