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
 * App\Models\UserTimeRecord
 *
 * @property string $id
 * @property string $user_id
 * @property bool $alteration_record
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|UserTimeRecord newModelQuery()
 * @method static Builder|UserTimeRecord newQuery()
 * @method static Builder|UserTimeRecord onlyTrashed()
 * @method static Builder|UserTimeRecord query()
 * @method static Builder|UserTimeRecord whereAlterationRecord($value)
 * @method static Builder|UserTimeRecord whereCreatedAt($value)
 * @method static Builder|UserTimeRecord whereDeletedAt($value)
 * @method static Builder|UserTimeRecord whereId($value)
 * @method static Builder|UserTimeRecord whereUpdatedAt($value)
 * @method static Builder|UserTimeRecord whereUserId($value)
 * @method static Builder|UserTimeRecord withTrashed()
 * @method static Builder|UserTimeRecord withoutTrashed()
 * @mixin Eloquent
 */
class UserTimeRecord extends Model
{
    use HasFactory, HasTimestamps, SoftDeletes, UUID;

    protected $fillable = [
        'user_id',
        'alteration_record'
    ];
}
