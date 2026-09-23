<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';
    protected $guarded = [];

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
