<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Timetable
 *
 * @property int $id
 * @property int $semester_id
 * @property int $lesson_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Semester $semester
 * @method static \Database\Factories\TimetableFactory factory($count = null, $state = [])
 * @method static Builder|Timetable newModelQuery()
 * @method static Builder|Timetable newQuery()
 * @method static Builder|Timetable query()
 * @method static Builder|Timetable whereCreatedAt($value)
 * @method static Builder|Timetable whereDeletedAt($value)
 * @method static Builder|Timetable whereId($value)
 * @method static Builder|Timetable whereLessonId($value)
 * @method static Builder|Timetable whereSemesterId($value)
 * @method static Builder|Timetable whereUpdatedAt($value)
 * @method static Builder|Timetable onlyTrashed()
 * @method static Builder|Timetable withTrashed()
 * @method static Builder|Timetable withoutTrashed()
 * @property string $start_at
 * @property string $end_at
 * @property int $order
 * @property int|null $is_numerator
 * @property int $day_of_week_id
 * @property int|null $room_id
 * @property int $group_id
 * @property int|null $subgroup_id
 * @property int $type_of_lesson_id
 * @property int $teacher_id
 * @property int $course_id
 * @method static Builder|Timetable whereCourseId($value)
 * @method static Builder|Timetable whereDayOfWeekId($value)
 * @method static Builder|Timetable whereEndAt($value)
 * @method static Builder|Timetable whereGroupId($value)
 * @method static Builder|Timetable whereIsNumerator($value)
 * @method static Builder|Timetable whereOrder($value)
 * @method static Builder|Timetable whereRoomId($value)
 * @method static Builder|Timetable whereStartAt($value)
 * @method static Builder|Timetable whereSubgroupId($value)
 * @method static Builder|Timetable whereTeacherId($value)
 * @method static Builder|Timetable whereTypeOfLessonId($value)
 * @property-read Course $course
 * @property-read Group $group
 * @property-read Room|null $room
 * @property-read Subgroup|null $subgroup
 * @property-read Teacher $teacher
 * @property-read TypeOfLesson $typeOfLesson
 * @mixin \Eloquent
 */
class Timetable extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

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
