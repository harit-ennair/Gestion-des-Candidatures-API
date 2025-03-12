<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offers_user extends Model
{
    use HasFactory;
    protected $fillable = ['cv'];
    public function offers()
    {
        return $this->belongsToMany(offers::class)->withPivot('cv');
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('cv');
    }
}
