<?php

use App\Models\Course;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Room;
use App\Models\Subgroup;
use App\Models\Teacher;
use App\Models\TypeOfLesson;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('timetables', function (Blueprint $table) {
            $table->mediumInteger('order');
            $table->boolean('is_numerator')->nullable();
            $table->smallInteger('day_of_week_id');

            $table->foreignIdFor(Room::class)
                ->nullable()
                ->constrained('rooms')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignIdFor(Group::class)
                ->constrained('groups')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignIdFor(Subgroup::class)
                ->nullable()
                ->constrained('subgroups')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignIdFor(TypeOfLesson::class)
                ->nullable()
                ->constrained('type_of_lessons')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignIdFor(Teacher::class)
                ->nullable()
                ->constrained('teachers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignIdFor(Course::class)
                ->nullable()
                ->constrained('courses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->dropForeignIdFor(Lesson::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timetables', function (Blueprint $table) {
            $table->dropForeignIdFor(Room::class);
            $table->dropForeignIdFor(Group::class);
            $table->dropForeignIdFor(Subgroup::class);
            $table->dropForeignIdFor(TypeOfLesson::class);
            $table->dropForeignIdFor(Teacher::class);
            $table->dropForeignIdFor(Course::class);
            $table->dropColumn(
                [
                    'room_id',
                    'teacher_id',
                    'course_id',
                    'type_of_lesson_id',
                    'subgroup_id',
                    'group_id',
                    'order',
                    'is_numerator',
                    'day_of_week_id'
                ]
            );
        });
    }
};
