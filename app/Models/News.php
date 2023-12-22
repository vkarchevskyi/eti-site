<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property string $short_description
 * @property array $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Database\Factories\NewsFactory factory($count = null, $state = [])
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News query()
 * @method static Builder|News whereContent($value)
 * @method static Builder|News whereCreatedAt($value)
 * @method static Builder|News whereDeletedAt($value)
 * @method static Builder|News whereId($value)
 * @method static Builder|News whereShortDescription($value)
 * @method static Builder|News whereTitle($value)
 * @method static Builder|News whereUpdatedAt($value)
 * @method static Builder|News onlyTrashed()
 * @method static Builder|News withTrashed()
 * @method static Builder|News withoutTrashed()
 * @property string $slug
 * @method static Builder|News whereSlug($value)
 * @mixin \Eloquent
 */
class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'content' => 'array',
    ];
}
