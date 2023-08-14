<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTimeRecord extends Model
{
    use HasFactory, HasTimestamps, SoftDeletes, UUID;

    protected $fillable = [
        'user_id',
        'alteration_record'
    ];
}