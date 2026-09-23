<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pilihan extends Model
{
    protected $table = 'pilihan';
    protected $guarded = [];
    protected $casts = ['skor' => 'array'];
}
