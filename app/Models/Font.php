<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Font extends Model
{
    use HasFactory;
    public $table = 'fonts';
    protected $fillable = [
    'family_name',
    'slug',
    'file_path',
    'format',
    'status',
    'category_id',
    'downloads',
    'subfamily',
    'weight',
    'style',
    
];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'font_tags');
    }

    public function downloads()
    {
        return $this->hasMany(Download::class);
    }
}
