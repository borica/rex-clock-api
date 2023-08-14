<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTimeRecordAlterRequest extends Model
{
    use HasFactory, HasTimestamps, SoftDeletes, UUID;

    protected $fillable = [
        'user_time_record_id',
        'proposed_new_time',
        'status',
        'approved_by'
    ];
}