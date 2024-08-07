<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'famille_id',
    ];
    public function famille() {
        return $this->belongsTo(Famille::class);
    }
    public function article() {
        return $this->hasOne(Article::class);
    }
}
