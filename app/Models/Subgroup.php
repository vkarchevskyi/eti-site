<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Subgroup
 *
 * @property int $id
 * @property int $group_id
 * @property int $subgroup_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Group $group
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup whereSubgroupValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup whereUpdatedAt($value)
 * @property-read int|null $group_count
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Subgroup withoutTrashed()
 * @mixin \Eloquent
 */
class Subgroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function group(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }
}
