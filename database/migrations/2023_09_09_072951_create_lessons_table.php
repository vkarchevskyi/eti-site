<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->mediumInteger('order');
            $table->unsignedBigInteger('subgroup_id')->nullable();
            $table->boolean('is_numerator')->nullable();
            $table->unsignedBigInteger('type_of_lesson_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('course_id');
            $table->smallInteger('day_of_week_id');
            $table->string('time_from', 5);
            $table->string('time_to', 5);

            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('subgroup_id')
                ->references('id')
                ->on('subgroups')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('type_of_lesson_id')
                ->references('id')
                ->on('type_of_lessons')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
