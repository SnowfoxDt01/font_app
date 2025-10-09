<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Font extends Model
{
    use HasFactory;
    public $table = 'fonts';
    protected $fillable = [
        'name',
        'slug',
        'file_path',
        'preview_text',
        'format',
        'category_id',
        'downloads',
        'status',
        'cretaed_at',
        'updated_at',
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
