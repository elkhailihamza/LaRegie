<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Attributes\Group;

class Metier extends Model
{
    use HasFactory;
    public function user() {
        return $this->hasMany(User::class);
    }
    public function groupes() {
        return $this->hasMany(Group::class);
    }
}
