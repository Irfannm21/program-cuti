<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCuti extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function master() {
        return $this->hasOne("App\masterKaryawan");
    }

    public function transaksiCutis() {
        return $this->hasOne("App\TransaksiCuti");
    }
}
