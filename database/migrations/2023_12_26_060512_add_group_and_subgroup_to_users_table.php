<?php

use App\Models\Group;
use App\Models\Subgroup;
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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(Group::class)
                ->nullable()
                ->constrained('groups')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignIdFor(Subgroup::class)
                ->nullable()
                ->constrained('subgroups')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeignIdFor(Group::class);
            $table->dropForeignIdFor(Subgroup::class);

            $table->dropColumn('group_id');
            $table->dropColumn('subgroup_id');
        });
    }
};
