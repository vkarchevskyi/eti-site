<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property int $group_id
 * @property int $order
 * @property int|null $subgroup_id
 * @property int|null $is_numerator
 * @property int $type_of_lesson_id
 * @property int $teacher_id
 * @property int $course_id
 * @property int $day_of_week_id
 * @property string $time_from
 * @property string $time_to
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\Group $group
 * @property-read \App\Models\Subgroup|null $subgroup
 * @property-read \App\Models\Teacher $teacher
 * @property-read \App\Models\TypeOfLesson $typeOfLesson
 * @method static \Database\Factories\LessonFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereDayOfWeekId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereIsNumerator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereSubgroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTimeFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTimeTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTypeOfLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson withoutTrashed()
 * @mixin \Eloquent
 */
class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function typeOfLesson(): BelongsTo
    {
        return $this->belongsTo(TypeOfLesson::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function subgroup(): BelongsTo
    {
        return $this->belongsTo(Subgroup::class);
    }
}
