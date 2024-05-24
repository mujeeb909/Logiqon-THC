<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiries extends Model
{
    use HasFactory;
    protected $table = 'enquiries';
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'phone_no',
        'address',
        'message',
    ];
}
