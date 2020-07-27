<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporHarian extends Model
{
    protected $table = 'tb_laporan_harian';
    protected $primaryKey = 'id_laporan_harian';
    protected $fillable = ['id_tenaga', 'tanggal'];
    public $timestamps = false;

}
