<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paslon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'photo', 'kategori_id'
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function kategori()
{
    return $this->belongsTo(Kategori::class);
}
}
