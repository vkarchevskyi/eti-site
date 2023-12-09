<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CourseTranslation
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseTranslation query()
 * @mixin \Eloquent
 */
class CourseTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
}
