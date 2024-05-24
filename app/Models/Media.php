<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $fillable = [
        'name',
        'image',
        'video',
        'details',
        'user_id',
        'mediatype_id',
        'created_by',
        'created_at',
        'updated_at',
    ];

}
