<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function paslons()
    {
        return $this->hasMany(Paslon::class, 'kategori_id');
    }
}
