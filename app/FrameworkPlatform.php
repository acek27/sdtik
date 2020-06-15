<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrameworkPlatform extends Model
{
    protected $table = 'tb_framework_platform';
    protected $primaryKey = 'id_framework_platform';
    protected $fillable = ['jenis_platform', 'jenis_framework'];
    public $timestamps = false;
}
