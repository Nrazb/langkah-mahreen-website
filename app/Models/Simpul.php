<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simpul extends Model
{
    protected $table = 'simpul';
    protected $guarded = [];
    protected $casts = ['is_start' => 'boolean'];

    public function pilihan()
    {
        return $this->hasMany(Pilihan::class);
    }
}
