<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_nom',
        'description',
        'segment_id',
    ];
    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }
}
