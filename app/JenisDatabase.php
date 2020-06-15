<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisDatabase extends Model
{
    protected $table = 'tb_database';
    protected $primaryKey = 'id_database';
    protected $fillable = ['jenis_database'];
    public $timestamps = false;
}
