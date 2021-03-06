<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    protected $table = 'tb_perangkat';
    protected $primaryKey = 'id_perangkat';
    protected $fillable = ['nama_perangkat', 'tipe_perangkat', 'status_kepemilikan', 'ip_server', 'id_divisi', 'status_server', 'id_hdd', 'id_ram', 'id_rak', 'id_core'];
    public $timestamps = false;

    //public function divisi()
    //{
    //  return $this->belongsTo(divisi::class,'id_divisi');
    //}
}
