<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Semester
 *
 * @property int $id
 * @property string $name
 * @property string $studying_start_date
 * @property string $studying_end_date
 * @property string $exam_start_date
 * @property string $exam_end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Database\Factories\SemesterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Semester newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Semester newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Semester query()
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereExamEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereExamStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereStudyingEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereStudyingStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Semester extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
