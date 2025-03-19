<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = ['model', 'model_id', 'action', 'changes'];
    protected $casts = [
        'changes' => 'array', //Ensure change are stores as JSON
    ];
}
