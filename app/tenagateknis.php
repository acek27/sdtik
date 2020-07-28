<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tenagateknis extends Model
{
    protected $table = 'tb_tenagateknis';
    protected $primaryKey = 'id_tenaga';
    protected $with = ['divisi','users'];
    public $timestamps = false;
    protected $fillable = ['nm_tenaga', 'tempat_lahir', 'tgl_lahir', 'alamat',
        'nik', 'email', 'telp', 'id_jk', 'id_pendidikan', 'prog_studi', 'npwp',
        'no_rekening', 'id_divisi', 'user_id'];
    protected $attributes = ['dev_team' => 'Team A'];

    public function jeniskelamin()
    {
        return $this->belongsTo(jeniskelamin::class, 'id_jk');
    }

    public function divisi()
    {
        return $this->belongsTo(divisi::class, 'id_divisi');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pendidikan()
    {
        return $this->belongsTo(pendidikan::class, 'id_pendidikan');
    }
}
