<?php

namespace App\Models;

use App\Traits\UUID;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\UserCompany
 *
 * @property string $id
 * @property string $user_id
 * @property string $company_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Builder|UserCompany newModelQuery()
 * @method static Builder|UserCompany newQuery()
 * @method static Builder|UserCompany onlyTrashed()
 * @method static Builder|UserCompany query()
 * @method static Builder|UserCompany whereCompanyId($value)
 * @method static Builder|UserCompany whereCreatedAt($value)
 * @method static Builder|UserCompany whereDeletedAt($value)
 * @method static Builder|UserCompany whereId($value)
 * @method static Builder|UserCompany whereUpdatedAt($value)
 * @method static Builder|UserCompany whereUserId($value)
 * @method static Builder|UserCompany withTrashed()
 * @method static Builder|UserCompany withoutTrashed()
 * @mixin Eloquent
 */
class UserCompany extends Pivot
{
    use HasFactory, HasTimestamps, SoftDeletes, UUID;

    protected $fillable = [
        'user_id',
        'company_id'
    ];
}
