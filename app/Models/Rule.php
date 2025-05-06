<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = 'rules';
    protected $fillable = ['penyakit_id', 'gejala_ids'];

    // Konversi gejala_ids ke array
    protected $casts = ['gejala_ids' => 'array'];
}
