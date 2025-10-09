<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public $table = 'tags';
    protected $fillable = [
        'name',
        'slug'
    ];

    public function fonts()
    {
        return $this->belongsToMany(Font::class, 'font_tags');
    }
}
