<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $table = 'diagnosis';
    protected $fillable = ['user_id', 'gejala_terpilih', 'penyakit_id', 'confidence_level'];

    protected $casts = ['gejala_terpilih' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}
