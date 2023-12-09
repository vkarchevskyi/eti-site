<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\TypeOfLesson
 *
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|TypeOfLesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeOfLesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeOfLesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeOfLesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeOfLesson whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeOfLesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeOfLesson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeOfLesson whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeOfLesson whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TypeOfLesson extends Model
{
    use HasFactory;


    public array $translatable = [
        'name',
        'short_name',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
