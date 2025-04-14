<?php

namespace NietThijmen\LaravelAuditTrail\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditTrail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'action',
        'model',
        'model_id',
        'causer',
        'causer_id',
        'old_data',
        'new_data',
    ];

    protected $casts = [
        'old_data' => 'array',
        'new_data' => 'array',
    ];
}
