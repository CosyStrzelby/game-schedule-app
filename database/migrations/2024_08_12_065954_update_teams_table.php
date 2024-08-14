<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class UpdateTeamsTable extends Migration
{
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {

            if (!Schema::hasColumn('teams', 'name')) {
                $table->string('name');
            }
            if (!Schema::hasColumn('teams', 'created_at') || !Schema::hasColumn('teams', 'updated_at')) {
                $table->timestamps();
            }
        });
    }
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            // Usuń kolumny w przypadku rollback
            if (Schema::hasColumn('teams', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumns('teams', ['created_at', 'updated_at'])) {
                $table->dropTimestamps();
            }
        });
    }
};
