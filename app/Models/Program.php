<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
    protected $guarded = [];
    protected $casts = ['mulai' => 'date', 'selesai' => 'date', 'is_contoh' => 'boolean'];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
