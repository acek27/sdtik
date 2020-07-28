<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reportnoc extends Model
{
    protected $with = ['users'];
    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
