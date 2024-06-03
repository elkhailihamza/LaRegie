<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    public function metier() {
        return $this->hasOne(Metier::class);
    }
    public function familles() {
        return $this->hasMany(Famille::class);
    }
    protected $fillable = ['groupe_nom', 'metier_id'];
}
