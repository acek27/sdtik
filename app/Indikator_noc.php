<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indikator_noc extends Model
{
    public function penilaianindikator()
    {
        return $this->hasMany(Penilaian_indikator::class);
    }
}
