<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembang extends Model
{
    protected $table = 'tb_pengembang';
    protected $primaryKey = 'id_pengembang';
    public $timestamps = false;
    protected $fillable = ['id_pengembang', 'nama_pengembang1', 'nama_pengembang2', 'nama_pengembang3'];


}
