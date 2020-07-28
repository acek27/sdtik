<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian_indikator extends Model
{
    protected $with = ['indikatornoc'];

    public function indikatornoc()
    {
        return $this->belongsTo(Indikator_noc::class, 'indikator_id', 'id');
    }
}
