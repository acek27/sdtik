<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class tenagateknis extends Model
{
    protected $table = 'tb_tenagateknis';
    protected $primaryKey = 'id_tenaga';
    protected $with = ['divisi', 'users'];
    public $timestamps = false;
    protected $fillable = ['nm_tenaga', 'tempat_lahir', 'tgl_lahir', 'alamat',
        'nik', 'email', 'telp', 'id_jk', 'id_pendidikan', 'prog_studi', 'npwp',
        'no_rekening', 'id_divisi', 'user_id'];
    protected $attributes = ['dev_team' => 'Team A'];

    public static $rulesCreate = [
        'tgl_lahir' => 'date|required',
        'nik' => 'numeric|digits:16|required|unique:tb_tenagateknis',
        'telp' => 'numeric|required',
    ];

    public static function rulesEdit(tenagateknis $data)
    {
        return [
            'tgl_lahir' => 'date|required',
            'nik' => 'numeric|digits:16|required',
            'telp' => 'numeric|required',
        ];
    }

    public function getNmTenagaAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function getTempatLahirAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function getProgStudiAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function jeniskelamin()
    {
        return $this->belongsTo(jeniskelamin::class, 'id_jk');
    }

    public function getUsiaAttribute()
    {
        $end = Carbon::parse($this->tgl_lahir);
        $now = Carbon::now();
        $length = $end->diffInDays($now);
        $result = $length / 365;
        return floor($result);
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
