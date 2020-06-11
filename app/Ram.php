<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ram extends Model
{
    protected $table = 'tb_ram';
    protected $primaryKey = 'id_ram';
protected $fillable = array('ukuran_ram','keterangan');
	
    public $timestamps = false;
}
