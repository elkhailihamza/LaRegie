<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    use HasFactory;
    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
    public function segment()
    {
        return $this->hasOne(segment::class);
    }
    protected $fillable = [
        'famille_nom',
        'groupe_id',        
    ];
}
