<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'film_id'];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
