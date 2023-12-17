<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
 * @method static Builder|Lesson newModelQuery()
 * @method static Builder|Lesson newQuery()
 * @method static Builder|Lesson onlyTrashed()
 * @method static Builder|Lesson query()
 * @method static Builder|Lesson whereCourseId($value)
 * @method static Builder|Lesson whereCreatedAt($value)
 * @method static Builder|Lesson whereDayOfWeekId($value)
 * @method static Builder|Lesson whereDeletedAt($value)
 * @method static Builder|Lesson whereGroupId($value)
 * @method static Builder|Lesson whereId($value)
 * @method static Builder|Lesson whereIsNumerator($value)
 * @method static Builder|Lesson whereOrder($value)
 * @method static Builder|Lesson whereSubgroupId($value)
 * @method static Builder|Lesson whereTeacherId($value)
 * @method static Builder|Lesson whereTimeFrom($value)
 * @method static Builder|Lesson whereTimeTo($value)
 * @method static Builder|Lesson whereTypeOfLessonId($value)
 * @method static Builder|Lesson whereUpdatedAt($value)
 * @method static Builder|Lesson withTrashed()
 * @method static Builder|Lesson withoutTrashed()
 * @property int|null $room_id
 * @method static Builder|Lesson whereRoomId($value)
 * @property-read \App\Models\Room|null $room
 * @mixin \Eloquent
 */
class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
