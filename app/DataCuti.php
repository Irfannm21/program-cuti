<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCuti extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function master() {
        return $this->belongsTo("App\masterKaryawan","master_karyawan_id");
    }

    public function transaksiCutis() {
        return $this->hasMany("App\TransaksiCuti","transaksi_cuti_id");
    }
}
