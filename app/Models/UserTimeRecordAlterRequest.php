<?php

namespace App\Models;

use App\Traits\UUID;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserTimeRecordAlterRequest
 *
 * @property string $id
 * @property string $user_time_record_id
 * @property string $proposed_new_time
 * @property string $status
 * @property string $approved_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|UserTimeRecordAlterRequest newModelQuery()
 * @method static Builder|UserTimeRecordAlterRequest newQuery()
 * @method static Builder|UserTimeRecordAlterRequest onlyTrashed()
 * @method static Builder|UserTimeRecordAlterRequest query()
 * @method static Builder|UserTimeRecordAlterRequest whereApprovedBy($value)
 * @method static Builder|UserTimeRecordAlterRequest whereCreatedAt($value)
 * @method static Builder|UserTimeRecordAlterRequest whereDeletedAt($value)
 * @method static Builder|UserTimeRecordAlterRequest whereId($value)
 * @method static Builder|UserTimeRecordAlterRequest whereProposedNewTime($value)
 * @method static Builder|UserTimeRecordAlterRequest whereStatus($value)
 * @method static Builder|UserTimeRecordAlterRequest whereUpdatedAt($value)
 * @method static Builder|UserTimeRecordAlterRequest whereUserTimeRecordId($value)
 * @method static Builder|UserTimeRecordAlterRequest withTrashed()
 * @method static Builder|UserTimeRecordAlterRequest withoutTrashed()
 * @mixin Eloquent
 */
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
