<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    public $table = 'downloads';
    protected $fillable = [
        'user_id',
        'font_id',
        'ip_address'
    ];

    public function font()
    {
        return $this->belongsTo(Font::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
