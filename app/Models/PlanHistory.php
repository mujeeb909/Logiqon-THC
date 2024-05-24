<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanHistory extends Model
{
    use HasFactory;
    protected $table = 'plan_history';
    protected $fillable = [
        'plan_id',
        'user_id',
        'start_date',
        'end_date',
        'subscription_status'
    ];

    public function plan()
    {
        return $this->belongsTo(Plans::class);
    }
}
