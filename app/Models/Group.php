<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;


/**
 * @property int $id
 * @property string $name
 * @property int $supervisor_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */
class Group extends Model
{
    use HasFactory;
    use HasTranslations;

    public array $translatable = [
        'name'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subgroup(): HasMany
    {
        return $this->hasMany(Subgroup::class);
    }
}
